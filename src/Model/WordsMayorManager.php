<?php

namespace App\Model;

use PDO;

class WordsMayorManager extends AbstractManager
{
    public const TABLE = 'wordsMayor';

    public function selectWords()
    {
        $query = "SELECT id, title, description, image, signature
    FROM " . self::TABLE . "
    ORDER BY DESC LIMIT ";

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
