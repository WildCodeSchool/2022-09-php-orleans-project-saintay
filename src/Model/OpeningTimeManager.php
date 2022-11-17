<?php

namespace App\Model;

use PDO;

class OpeningTimeManager extends AbstractManager
{
    public const TABLE = "openingTime";

    public function selectOpeningTime(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM ' . self::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }
        return $this->pdo->query($query)->fetchAll();
    }
}
