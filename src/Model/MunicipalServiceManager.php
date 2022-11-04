<?php

namespace App\Model;

use PDO;

class MunicipalServiceManager extends AbstractManager
{
    public const TABLE = "municipalService";
    public function selectMunicipalService(int $limit): array
    {
        $query = "SELECT title, description, link, date, image 
        FROM " . self::TABLE . " 
        ORDER BY date DESC LIMIT " . $limit;
        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
