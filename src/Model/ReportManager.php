<?php

namespace App\Model;

use PDO;

class ReportManager extends AbstractManager
{
    public const TABLE = "report";

    public function selectReports(): array
    {
        $query = "SELECT image, title, description, link, date, image
        FROM " . self::TABLE . " INNER JOIN report_category ON report.category_id =report_category.id
        ORDER BY date DESC ";

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
