<?php

namespace App\Model;

use PDO;

class ReportManager extends AbstractManager
{
    public const TABLE = "report";

    public function selectReports()
    {
        $query = "SELECT image, title, description, link, date, image
        FROM " . self::TABLE . " INNER JOIN report_category ON report.category_id =report_category.id
        ORDER BY date DESC ";

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add(array $report)
    {

        $query = "INSERT INTO " . self::TABLE . "(image, title, description, link, date, file, report_category)
        VALUES (:image, :title, :description, :link, :date, :file, :report_category)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('title', $report['title'], PDO::PARAM_STR);
        $statement->bindValue('description', $report['description'], PDO::PARAM_STR);
        $statement->bindValue('date', $report['date'], PDO::PARAM_STR);
        $statement->bindValue('file', $report['file'], PDO::PARAM_STR);
    }
}
