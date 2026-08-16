<?php

namespace App\Controller;

use App\Service\VenteService;
use App\Model\Repository\ProduitRepository;
use App\Model\Repository\ClientRepository;
use App\Model\Repository\ModePaiementRepository;
use Exception;

class POSController
{
    private VenteService $venteService;
    private ProduitRepository $produitRepository;
    private ClientRepository $clientRepository;
    private ModePaiementRepository $modePaiementRepository;

    public function __construct()
    {
        $this->venteService = new VenteService();
        $this->produitRepository = new ProduitRepository();
        $this->clientRepository = new ClientRepository();
        $this->modePaiementRepository = new ModePaiementRepository();
    }

    public function index(): void
    {
        $produits = $this->produitRepository->getAllProduit();
        $clients = $this->clientRepository->getAllClient();
        $modePaiements = $this->modePaiementRepository->getAllModePaiement();
        $error = null;

        require dirname(__DIR__).'/views/pos/StoreManager.html.php';
    }

    public function vendre(): void
    {
        try {

            $clientId = (int) $_POST['client_id'];

            $produitId = $_POST['product_ids'] ?? [];
            $produitQts = $_POST['product_qtys'] ?? [];

            $montantVerse = (float) ($_POST['montant_verse'] ?? 0);

            $modeReglement = (int) ($_POST['mode_reglement'] ?? 0);

            $panier = [];

            foreach ($produitId as $index => $productId) {
                $panier[] = [
                    'produit_id' => (int) $productId,
                    'qte_commande' => (int) $produitQts[$index]
                ];
            }

            $utilisateurId = $_SESSION['utilisateur']['id'];

            $commandeId = $this->venteService->effectuerVente($clientId, $utilisateurId, $modeReglement, $panier, $montantVerse);

            header("Location: /pos?success=1&commande=$commandeId");
            exit;

        } catch (Exception $e) {

            $error = $e->getMessage();

            $produits = $this->produitRepository->getAllProduit();
            $clients = $this->clientRepository->getAllClient();
            $modePaiements = $this->modePaiementRepository->getAllModePaiement();

            require dirname(__DIR__). '/views/pos/StoreManager.html.php';
        }
    }
}