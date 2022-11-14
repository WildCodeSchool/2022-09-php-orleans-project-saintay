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

    public function validate($report)
    {
        $errors = [];
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $authorizedExtensions = ['pdf', 'PDF'];
        $maxFileSize = 20000000;

        if (DateTime::createFromFormat('Y-m-d', $report['date']) === false) {
            $errors[] = "Le format de la date est incorrect";
        }

        if (empty($report['title'])) {
            $errors[] = 'Erreur, le champ titre est requis';
        }

        if (empty($report['date'])) {
            $errors[] = 'Erreur, le champ date est requis';
        }

        if (empty($report['description'])) {
            $errors[] = 'Erreur, le champ description est requis';
        }

        if (empty($report['link'])) {
            $errors[] = 'Erreur, le lien de l\'actualité est requis';
        }

        if ((!in_array($extension, $authorizedExtensions))) {
            $errors[] = 'Veuillez sélectionner un fichier de type ' . implode(', ', $authorizedExtensions);
        }

        if (file_exists($_FILES['file']['tmp_name']) && filesize($_FILES['file']['tmp_name']) > $maxFileSize) {
            $errors[] = 'Votre fichier doit faire moins de ' . $maxFileSize / 20000000;
        }

            header('Location: /admin/report');
            return $errors;
    }

    public function add()
    {
        $reportManager = new ReportManager();
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $report = array_map('trim', $_POST);
            $errors = self::validate($report);
            $uploadDir = './assets/report_uploads/';
            $uploadFile = $uploadDir . basename($_FILES['file']['tmp_name']);
            $reportManager['file'] = $uploadFile;

            if (empty($errors)) {
                $reportManager = new reportManager();
                $reportManager->add($report);
                move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);

                header('Location: /admin/report');
                return '';
            }
        }
        return $this->twig->render('Admin/admin-add-report.html.twig');
    }
}
