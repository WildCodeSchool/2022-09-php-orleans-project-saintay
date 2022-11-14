<?php

namespace App\Controller;

use DateTime;
use App\Model\ReportManager;
use App\Controller\AbstractController;

class AdminReportController extends AbstractController
{
    public function index()
    {
        $reportManager = new ReportManager();
        $allReports = $reportManager->selectReports();
        return $this->twig->render('Admin/admin-report.html.twig', ['reports' => $allReports]);
    }
}
