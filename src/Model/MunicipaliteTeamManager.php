<?php

namespace App\Model;

use PDO;

class MunicipaliteTeamManager extends AbstractManager
{
    public const TABLE = 'municipalityTeam';

    public function insert(array $municipaliteManager): void
    {
        $query = "INSERT INTO " . self::TABLE . " (firstname, lastname, role, image) 
        VALUES (:firstname, :lastname, :role, :avatar)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('firstname', $municipaliteManager['firstname'], PDO::PARAM_STR);
        $statement->bindValue('lastname', $municipaliteManager['lastname'], PDO::PARAM_STR);
        $statement->bindValue('role', $municipaliteManager['role'], PDO::PARAM_STR);
        $statement->bindValue('avatar', $municipaliteManager['avatar'], PDO::PARAM_STR);

        $statement->execute();
    }
}
