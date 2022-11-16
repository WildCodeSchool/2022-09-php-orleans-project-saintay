<?php

namespace App\Model;

use PDO;

class WordMayorManager extends AbstractManager
{
    public const TABLE = 'wordMayor';

    public function selectFirst()
    {
        $query = "SELECT id, title, description, image, signature
        FROM " . self::TABLE . " LIMIT 1 ";

        return $this->pdo->query($query)->fetch(PDO::FETCH_ASSOC);
    }
}
