<?php

namespace App\Model\Repository;

use App\Core\Database;
use PDO;

class ModePaiementRepository
{
    public static function getAllModePaiement(): array
    {
        $pdo = Database::getInstance()->getConnection();

        $sql = "SELECT id, mode FROM mode_paiement ORDER BY id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $modes = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $modes[] = new \ModePaiement(
                $row['id'],
                $row['mode']
            );
        }

        return $modes;
    }
}