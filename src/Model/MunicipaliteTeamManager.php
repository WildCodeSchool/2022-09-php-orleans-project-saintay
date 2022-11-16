<?php

namespace App\Model;

use PDO;

class MunicipaliteTeamManager extends AbstractManager
{
    public const TABLE = 'municipalityTeam';

    public function selectIsEmployee(string $orderBy = '', string $direction = 'ASC'): array
    {

        $query = 'SELECT * FROM ' . self::TABLE . ' WHERE communal IS TRUE';
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }

    public function selectIsTeam(string $orderBy = '', string $direction = 'ASC'): array
    {

        $query = 'SELECT * FROM ' . self::TABLE . ' WHERE communal IS FALSE';
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }

    public function insert(array $municipaliteMember): void
    {
        $query = "INSERT INTO " . self::TABLE . " (firstname, lastname, role, image, communal) 
        VALUES (:firstname, :lastname, :role, :avatar, :communal)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('firstname', $municipaliteMember['firstname'], PDO::PARAM_STR);
        $statement->bindValue('lastname', $municipaliteMember['lastname'], PDO::PARAM_STR);
        $statement->bindValue('role', $municipaliteMember['role'], PDO::PARAM_STR);
        $statement->bindValue('avatar', $municipaliteMember['avatar'], PDO::PARAM_STR);
        $statement->bindValue('communal', $municipaliteMember['communal'], PDO::PARAM_STR);

        $statement->execute();
    }
}
