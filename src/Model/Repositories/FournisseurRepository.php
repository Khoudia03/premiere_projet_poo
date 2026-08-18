<?php

namespace App\Model\Repository;

use App\Core\Database;
use App\Model\Entity\Fournisseur;
use PDO;

class FournisseurRepository
{
    public static function getAllFournisseur(): array
    {
        $pdo = Database::getInstance()->getConnection();

        $sql = "SELECT id,nom,email,tel,adresse
                FROM fournisseurs
                ORDER BY id DESC
                ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $fournisseurs = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $fournisseurs[] = new Fournisseur(
                $row['id'],
                $row['nom'],
                $row['email'] ?? '',
                $row['tel'] ?? '',
                $row['adresse'] ?? ''
            );
        }

        return $fournisseurs;
    }
}