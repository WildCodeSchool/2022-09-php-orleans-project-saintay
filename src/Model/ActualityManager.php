<?php

namespace App\Model;

use PDO;

class ActualityManager extends AbstractManager
{
    public const TABLE = "actuality";

    public function selectActualities(int $limit): array
    {
        $query = "SELECT id, title, description, link, date, image 
        FROM " . self::TABLE . " 
        ORDER BY date DESC LIMIT " . $limit;

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert(array $actuality)
    {

        $query = "INSERT INTO " . self::TABLE . "(title, description, link, date, image) 
        VALUES (:title, :description, :link, :date, :image)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('title', $actuality['title'], PDO::PARAM_STR);
        $statement->bindValue('description', $actuality['description'], PDO::PARAM_STR);
        $statement->bindValue('link', $actuality['link'], PDO::PARAM_STR);
        $statement->bindValue('date', $actuality['date'], PDO::PARAM_STR);
        $statement->bindValue('image', $actuality['image'], PDO::PARAM_STR);

        $statement->execute();

    }
}
