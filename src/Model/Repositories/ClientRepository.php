<?php

namespace App\Model\Repository;

use App\Core\Database;
use App\Model\Entity\Client;
use PDO;

class ClientRepository
{
    public static function getAllClient(): array
    {
        $pdo = Database::getInstance()->getConnection();

        $sql = "SELECT id,nom,prenom,email,tel,limite_credit
                FROM clients
                ORDER BY id DESC
                ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $clients = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clients[] = new Client(
                $row['id'],
                $row['nom'],
                $row['prenom'],
                $row['email'] ?? '',
                $row['tel'] ?? '',
                (float) $row['limite_credit']
            );
        }

        return $clients;
    }
}