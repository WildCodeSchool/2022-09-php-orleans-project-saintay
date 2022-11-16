<?php

namespace App\Model;

use PDO;

class AssociationManager extends AbstractManager
{
    public const TABLE = "association";

    public function selectByCategory(int $categoryId = null): array
    {
        if ($categoryId === null) {
            $query = "SELECT " . self::TABLE . ".name as associationName, 
            category.name as categoryName, description, phone_number, image 
            FROM " . self::TABLE . " 
            INNER JOIN category
            ON category.id = " . self::TABLE . ".category_id
            ORDER BY category.id DESC ";
        } else {
            $query = "SELECT " . self::TABLE . ".name as associationName, 
            category.name as categoryName, description, phone_number, image 
            FROM " . self::TABLE . " 
            INNER JOIN category
            ON category.id = " . self::TABLE . ".category_id
            WHERE " . self::TABLE . ".category_id=" . $categoryId . "
            ORDER BY category.id DESC ";
        }

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
