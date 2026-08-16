<?php

namespace App\Model\Repository;

use App\Core\Database;
use PDO;

class ModePaiementRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAllModePaiement(): array
    {
        $sql = "SELECT id, mode FROM mode_paiement ORDER BY id";

        $stmt = $this->pdo->prepare($sql);
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