<?php

namespace App\Model;

use PDO;

class ActualiteManager extends AbstractManager
{
    public const TABLE = "actualite";

    public function selectHomeActu()
    {
        $query = "SELECT title, description, link, date, image FROM " . static::TABLE . " ORDER BY date LIMIT 2";

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
