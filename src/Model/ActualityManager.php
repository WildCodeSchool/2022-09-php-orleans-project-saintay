<?php

namespace App\Model;

use PDO;

class ActualityManager extends AbstractManager
{
    public const TABLE = "actualities";

    public function selectActualities(int $limit): array
    {
        $query = "SELECT title, description, link, date, image FROM " . static::TABLE . " ORDER BY date DESC LIMIT " . $limit;

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
