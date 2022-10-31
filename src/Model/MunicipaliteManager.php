<?php

namespace App\Model;

use PDO;

class MunicipaliteManager extends AbstractManager
{
    public const TABLE = 'MunicipalityTeam';

    public function selectAll(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT firstname, lastname, role, image FROM ' . self::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
