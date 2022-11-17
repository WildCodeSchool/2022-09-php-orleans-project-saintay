<?php

namespace App\Model;

use PDO;

class ReportManager extends AbstractManager
{
    public const TABLE = "report";

    public function selectReports()
    {
        $query = "SELECT report.id, report_category.id as category_id, link, date,
        report_category.image, name, title
        FROM " . self::TABLE . " INNER JOIN report_category ON report.category_id =report_category.id
        ORDER BY date DESC ";

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add(array $report, string $uniqName)
    {
        $query = "INSERT INTO " . self::TABLE . "(title, description, date, link, category_id)
        VALUES (:title, :description, :date, :link, :report_category)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('title', $report['title'], PDO::PARAM_STR);
        $statement->bindValue('description', $report['description'], PDO::PARAM_STR);
        $statement->bindValue('date', $report['date'], PDO::PARAM_STR);
        $statement->bindValue('link', $uniqName, PDO::PARAM_STR);
        $statement->bindValue('report_category', $report['category'], PDO::PARAM_INT);

        $statement->execute();
    }

    public function selectOneById(int $id): array|false
    {
        $query = "SELECT
        report.id, category_id, report_category.image, title, description, link, date, image
        FROM " . self::TABLE . " INNER JOIN report_category ON report.category_id =report_category.id
        WHERE report.id=" . $id;

        return $this->pdo->query($query)->fetch();
    }
    public function update(int $id, array $report, string $uniqName)
    {
        $query = "UPDATE " . self::TABLE . "
        SET
        title= :title,
        description= :description,
        date= :date,
        link= :link,
        category_id= :report_category
        WHERE id= :id";

        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id', $id, PDO::PARAM_INT);
        $statement->bindValue('title', $report['title'], PDO::PARAM_STR);
        $statement->bindValue('description', $report['description'], PDO::PARAM_STR);
        $statement->bindValue('date', $report['date'], PDO::PARAM_STR);
        $statement->bindValue('link', $uniqName, PDO::PARAM_STR);
        $statement->bindValue('report_category', $report['category'], PDO::PARAM_INT);

        $statement->execute();
    }
}
