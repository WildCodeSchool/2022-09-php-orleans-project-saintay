<?php

namespace App\Model;

use PDO;

class ContactInformationManager extends AbstractManager
{
    public const TABLE = "contactInformation";

    public function selectContactInformation(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM ' . self::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
