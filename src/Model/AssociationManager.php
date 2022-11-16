<?php

namespace App\Model;

use PDO;

class AssociationManager extends AbstractManager
{
    public const TABLE = "association";

    public function selectAllAssociation(): array
    {
        $query = "SELECT association.name as associationName, 
        category.name as categoryName, description, phone_number, image 
        FROM " . self::TABLE . " 
        INNER JOIN category
        ON category.id = association.category_id
        ORDER BY category.id DESC ";

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(array $association)
    {
        $query = "INSERT INTO " . self::TABLE . "(image, title, category, description, phone_number) 
        VALUES (:image, :title, :category, :description, :phone_number)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('image', $association['image'], PDO::PARAM_STR);
        $statement->bindValue('title', $association['title'], PDO::PARAM_STR);
        $statement->bindValue('category', $association['category'], PDO::PARAM_STR);
        $statement->bindValue('description', $association['description'], PDO::PARAM_STR);
        $statement->bindValue('phone_number', $association['phone_number']);

        $statement->execute();
    }
}
