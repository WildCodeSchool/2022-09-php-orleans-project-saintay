<?php

namespace App\Model;

use PDO;

class AssociationManager extends AbstractManager
{
    public const TABLE = " Association ";

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
}
