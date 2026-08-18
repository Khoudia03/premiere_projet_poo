<?php

namespace App\Model\Repository;

use App\Core\Database;
use App\Model\Entity\Produit;
use PDO;

class ProduitRepository
{
    public static function getAllProduit(): array
    {
        $pdo = Database::getInstance()->getConnection();

        $sql = "SELECT id,libelle,prix_vente,stock_initial
                FROM produits
                ORDER BY id DESC
                ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $produits = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produits[] = new Produit(
                $row['id'],
                $row['libelle'],
                (float) $row['prix_vente'],
                (int) $row['stock_initial']
            );
        }

        return $produits;
    }
}