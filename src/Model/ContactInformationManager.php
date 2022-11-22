<?php

namespace App\Model;

use PDO;

class ContactInformationManager extends AbstractManager
{
    public const TABLE = "contactInformation";

    public function selectContactInformation(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM ' . self::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }

    public function update(array $contactInformations): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET title = :title, info = :info WHERE id=:id");
        $statement->bindValue('id', $contactInformations['id'], PDO::PARAM_INT);
        $statement->bindValue('title', $contactInformations['title'], PDO::PARAM_STR);
        $statement->bindValue('info', $contactInformations['info'], PDO::PARAM_STR);


        return $statement->execute();
    }
}
