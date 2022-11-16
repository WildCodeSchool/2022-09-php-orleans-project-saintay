<?php

namespace App\Controller;

use DateTime;
use App\Model\ReportManager;
use App\Model\CategoryManager;
use App\Controller\AbstractController;

class AdminReportController extends AbstractController
{
    public const UPLOAD_DIR = './uploads/report_uploads/';
    public const AUTH_EXTENSION = ['pdf', 'PDF'];
    public const MAX_FILE_SIZE = 20000000;
    public const CATEGORY = [
        'Les réunions du conseil', 'Les bulletins municipaux', 'Les arrêtés municipaux'
    ];

    public function index()
    {
        $reportManager = new ReportManager();
        $allReports = $reportManager->selectReports();

        return $this->twig->render('Admin/admin-report.html.twig', [
            'reports' => $allReports,
        ]);
    }

    public function validate($report)
    {
        $errors = [];
        if (DateTime::createFromFormat('Y-m-d', $report['date']) === false) {
            $errors[] = "Le format de la date est incorrect";
        }

        if (empty($report['title'])) {
            $errors[] = 'Erreur, le champ titre est requis';
        }

        if (empty($report['title']) > 255) {
            $errors[] = 'Erreur, le nom du titre est trop long';
        }

        if (empty($report['date'])) {
            $errors[] = 'Erreur, le champ date est requis';
        }

        if (empty($report['description'])) {
            $errors[] = 'Erreur, le champ description est requis';
        }
        if (in_array($report['category'], self::CATEGORY)) {
            $errors[] = "Erreur, la catégorie n\'est pas valide.";
        }

        return $errors;
    }

    private function upload($files)
    {
        $errors = [];
        $uniqName = '';

        if (!empty($files['file']['name'])) {
            $extension = pathinfo($files['file']['name'], PATHINFO_EXTENSION);
            $uniqName = uniqid('', true) . $files['file']['name'] . $extension;
            $uploadFile = self::UPLOAD_DIR . $uniqName;
            $errors = $this->validateUpload($files, $errors);

            if (!empty($errors) || !move_uploaded_file($files['file']['tmp_name'], $uploadFile)) {
                $errors[] = $files['file']['name'] . ' n\'a pu être chargé. Veuillez réessayer.';
            }
        } else {
            $errors[] = 'Erreur';
        }
        return [$errors, $uniqName];
    }

    public function validateUpload($files, $errors)
    {
        if (
            file_exists($files['file']['tmp_name']) &&
            filesize($files['file']['tmp_name']) > self::MAX_FILE_SIZE
        ) {
            $errors[] = 'Votre fichier doit être inférieur à ' . self::MAX_FILE_SIZE / 20000000 . 'Mo.';
        }
        if ((!in_array(pathinfo($files['file']['name'], PATHINFO_EXTENSION), self::AUTH_EXTENSION))) {
            $extString = implode(', ', self::AUTH_EXTENSION);
            $errors[] = 'Veuillez sélectionner un fichier de type ' . $extString . '.';
        }

        if (!empty($files['error'])) {
            $errors[] = 'Erreur d \'upload : ' . $files['error'] . '.';
        }

        return $errors;
    }


    public function add()
    {
        $errors = [];
        $filesErrors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $files = $_FILES;
            $report = array_map('trim', $_POST);

            $errors = $this->validate($report);
            $filesMethod = $this->upload($files);
            $filesErrors = $filesMethod[0];
            $uniqName = $filesMethod[1];

            $errors = array_merge($errors, $filesErrors);


            if (empty($errors)) {
                $reportManager = new ReportManager();
                $reportManager->add($report, $uniqName);

                header('Location: /admin/documents');

                return '';
            }
        }

        $reportCatManager = new CategoryManager();
        $reportCat = $reportCatManager->selectAll();

        return $this->twig->render('Admin/admin-add-report.html.twig', [
            'categories' => $reportCat
        ]);
    }
}
