<?php

namespace App\Model;

class MunicipaliteTeamManager extends AbstractManager
{
    public const TABLE = 'municipalityTeam';

    public function selectIsEmployee(string $orderBy = '', string $direction = 'ASC'): array
    {

        $query = 'SELECT * FROM ' .  self::TABLE . ' WHERE communal IS TRUE';
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
