<?php

namespace App\Model;

use PDO;

class ScheduleManager extends AbstractManager
{
    public const TABLE = "schedule";

    public function selectOpeningTime(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM ' . self::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }
        return $this->pdo->query($query)->fetchAll();
    }
}
