<?php

namespace App\Model;

use PDO;

class ReportManager extends AbstractManager
{
    public const TABLE = "report";

    public function selectReports(int $limit): array
    {
        $query = "SELECT id, title, description, link, date, image
        FROM " . self::TABLE . "
        ORDER BY date DESC LIMIT " . $limit;

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert(array $report)
    {
        $query = "INSERT INTO " . self::TABLE . "(title, description, link, date, image)
        VALUES (:title, :description, :link, :date, :image)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('title', $report['title'], PDO::PARAM_STR);
        $statement->bindValue('description', $report['description'], PDO::PARAM_STR);
        $statement->bindValue('link', $report['link'], PDO::PARAM_STR);
        $statement->bindValue('date', $report['date'], PDO::PARAM_STR);
        $statement->bindValue('image', $report['image'], PDO::PARAM_STR);

        $statement->execute();
    }
}
