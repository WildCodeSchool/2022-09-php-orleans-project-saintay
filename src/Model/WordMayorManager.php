<?php

namespace App\Model;

use PDO;

class WordMayorManager extends AbstractManager
{
    public const TABLE = 'wordMayor';

    public function selectFirst()
    {
        $query = "SELECT id, title, description, image, signature
    FROM " . self::TABLE . "
    ORDER BY DESC LIMIT ";

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
