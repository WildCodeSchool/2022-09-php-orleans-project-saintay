<?php

namespace App\Controller;

use App\Model\ReportManager;

class ReportController extends AbstractController
{
    public function displayAllReports(): string
    {
        $reportManager = new ReportManager();
        $allReports = $reportManager->selectReports(20);
        return $this->twig->render('Report/reports.html.twig', ['reports' => $allReports]);
    }
}
