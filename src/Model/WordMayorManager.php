<?php

namespace App\Model;

use PDO;

class WordMayorManager extends AbstractManager
{
    public const TABLE = 'wordsMayor';

    public function selectFirst()
    {
        $query = "SELECT id, title, description, image, signature
        FROM " . self::TABLE . " LIMIT 1 ";

        return $this->pdo->query($query)->fetch(PDO::FETCH_ASSOC);
    }
    public function update(int $id, array $wordMayor)
    {
        $query = "UPDATE " . self::TABLE . "
        SET 
        title = :title, 
        description = :description, 
        image = :image,
        signature = :signature,
        WHERE id= :id";

        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, PDO::PARAM_INT);
        $statement->bindValue('title', $wordMayor['title'], PDO::PARAM_STR);
        $statement->bindValue('description', $wordMayor['description'], PDO::PARAM_STR);
        $statement->bindValue('signature', $wordMayor['signature'], PDO::PARAM_STR);
        $statement->bindValue('image', $wordMayor['image'], PDO::PARAM_STR);
    }
}
