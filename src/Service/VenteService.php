<?php

namespace App\Service;

use App\Core\Database;
use PDO;
use Exception;

class VenteService
{
    public static function effectuerVente(
        int $clientId,
        int $utilisateurId,
        int $modePaiementId,
        array $panier,
        float $avance = 0
    ): int {

        $pdo = Database::getInstance()->getConnection();

        if (empty($panier)) {
            throw new Exception("Le panier est vide.");
        }

        if ($avance < 0) {
            throw new Exception("L'avance ne peut pas être négative.");
        }

        $pdo->beginTransaction();

        try {

            $produits = [];
            $montantInitial = 0;

            $sqlProduit = "SELECT id, libelle, prix_vente, stock_initial FROM produits WHERE id = :id FOR UPDATE";

            $stmtProduit = $pdo->prepare($sqlProduit);

            foreach ($panier as $ligne) {

                $produitId = (int) $ligne['produit_id'];
                $quantite = (int) $ligne['qte_commande'];

                if ($quantite <= 0) {
                    throw new Exception(
                        "La quantité du produit $produitId est invalide."
                    );
                }

                $stmtProduit->execute([
                    'id' => $produitId
                ]);

                $produit = $stmtProduit->fetch(PDO::FETCH_ASSOC);

                if (!$produit) {
                    throw new Exception(
                        "Le produit $produitId n'existe pas."
                    );
                }

                if ((int) $produit['stock_initial'] < $quantite) {
                    throw new Exception(
                        "Stock insuffisant pour ce produit."
                    );
                }

                $prix = (float) $produit['prix_vente'];
                $totalLigne = $prix * $quantite;

                $montantInitial += $totalLigne;

                $produits[] = [
                    'id' => $produit['id'],
                    'quantite' => $quantite,
                    'prix' => $prix
                ];
            }

            $sqlClient = "SELECT id, limite_credit FROM clients WHERE id = :id FOR UPDATE";

            $stmtClient = $pdo->prepare($sqlClient);

            $stmtClient->execute([
                'id' => $clientId
            ]);

            $client = $stmtClient->fetch(PDO::FETCH_ASSOC);

            if (!$client) {
                throw new Exception("Le client n'existe pas.");
            }

            $sqlUtilisateur = "SELECT id FROM utilisateurs WHERE id = :id";

            $stmtUtilisateur = $pdo->prepare($sqlUtilisateur);

            $stmtUtilisateur->execute([
                'id' => $utilisateurId
            ]);

            if (!$stmtUtilisateur->fetch()) {
                throw new Exception("L'utilisateur n'existe pas.");
            }

            $sqlMode = "SELECT id FROM mode_paiementWHERE id = :id";

            $stmtMode = $pdo->prepare($sqlMode);

            $stmtMode->execute([
                'id' => $modePaiementId
            ]);

            if (!$stmtMode->fetch()) {
                throw new Exception(
                    "Le mode de paiement n'existe pas."
                );
            }

            if ($avance > $montantInitial) {
                throw new Exception(
                    "L'avance dépasse le montant de la commande."
                );
            }

            $reste = $montantInitial - $avance;

            $limiteCredit = (float) $client['limite_credit'];

            if ($reste > $limiteCredit) {
                throw new Exception(
                    "La limite de crédit du client est dépassée."
                );
            }

            $sqlCommande = "INSERT INTO commandes (date_commande, montant_initial,avance,client_id,utilisateur_id,mode_paiement_id)
                            VALUES (CURRENT_DATE,:montant_initial,:avance,:client_id,:utilisateur_id,:mode_paiement_id)
                            RETURNING id
                            ";

            $stmtCommande = $pdo->prepare($sqlCommande);

            $stmtCommande->execute([
                'montant_initial' => $montantInitial,
                'avance' => $avance,
                'client_id' => $clientId,
                'utilisateur_id' => $utilisateurId,
                'mode_paiement_id' => $modePaiementId
            ]);

            $commandeId = (int) $stmtCommande->fetchColumn();

            $sqlLigne = "INSERT INTO ligne_commandes (commande_id,produit_id,qte_commande,prix_reel)
                        VALUES (:commande_id,:produit_id,:qte_commande,:prix_reel)
                        ";

            $stmtLigne = $pdo->prepare($sqlLigne);

            foreach ($produits as $produit) {

                $stmtLigne->execute([
                    'commande_id' => $commandeId,
                    'produit_id' => $produit['id'],
                    'qte_commande' => $produit['quantite'],
                    'prix_reel' => $produit['prix']
                ]);
            }

            $sqlStock = " UPDATE produits
                         SET stock_initial = stock_initial - :quantite
                         WHERE id = :id
                         AND stock_initial >= :quantite
                        ";

            $stmtStock = $pdo->prepare($sqlStock);

            foreach ($produits as $produit) {

                $stmtStock->execute([
                    'quantite' => $produit['quantite'],
                    'id' => $produit['id']
                ]);

                if ($stmtStock->rowCount() === 0) {
                    throw new Exception(
                        "Impossible de décrémenter le stock."
                    );
                }
            }

            if ($avance > 0) {

                $sqlReglement = "INSERT INTO reglements (date,montant,commande_id)
                                VALUES (CURRENT_DATE,:montant,:commande_id)
                                ";

                $stmtReglement = $pdo->prepare($sqlReglement);

                $stmtReglement->execute([
                    'montant' => $avance,
                    'commande_id' => $commandeId
                ]);
            }

            $pdo->commit();

            return $commandeId;

        } catch (Exception $e) {

            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }

            throw $e;
        }
    }
}