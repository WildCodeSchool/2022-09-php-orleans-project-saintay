<?php

namespace App\Model;

use PDO;

class AssociationManager extends AbstractManager
{
    public const TABLE = " Association ";

    public function selectAllAssociation(): array
    {
        $query = "SELECT Association.name as associationName, Category.name as categoryName, description, phone_number, image 
        FROM " . static::TABLE . " 
        INNER JOIN Category
        ON Category.id = Association.category_id
        ORDER BY Association.name DESC ";

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
