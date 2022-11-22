<?php

namespace App\Model;

use PDO;

class ScheduleManager extends AbstractManager
{
    public const TABLE = "schedule";

    public function selectOpeningTime(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM ' . self::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }
        return $this->pdo->query($query)->fetchAll();
    }

    public function update(array $openingTimes): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE .
            " SET day = :day, hour = :hour WHERE id=:id");
        $statement->bindValue('id', $openingTimes['id'], PDO::PARAM_INT);
        $statement->bindValue('day', $openingTimes['day'], PDO::PARAM_STR);
        $statement->bindValue('hour', $openingTimes['hour'], PDO::PARAM_STR);


        return $statement->execute();
    }
}
