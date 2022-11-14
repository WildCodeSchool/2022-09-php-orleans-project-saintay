<?php

namespace App\Controller;

use DateTime;
use App\Model\ReportManager;
use App\Controller\AbstractController;

class AdminReportController extends AbstractController
{
    public const UPLOAD_DIR = './public/report_uploads';
    public const AUTH_EXTENSION = ['pdf', 'PDF'];
    public const MAX_FILE_SIZE = "20000000";

    public function index()
    {
        $reportManager = new ReportManager();
        $allReports = $reportManager->selectReports();
        return $this->twig->render('Admin/admin-report.html.twig', ['reports' => $allReports]);
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

        if (empty($report['date'])) {
            $errors[] = 'Erreur, le champ date est requis';
        }

        if (empty($report['description'])) {
            $errors[] = 'Erreur, le champ description est requis';
        }

        if (empty($report['link'])) {
            $errors[] = 'Erreur, le lien de l\'actualité est requis';
        }
    }

    private function upload(): array
    {
        $errors = [];
        $files = $_FILES;
        $uploadFile = '';
        $uniqName = '';
        $fileName = '';

        if (!empty($files['file']['name'])) {
            $errorsUpload = $this->validateUpload($files);

            if (empty($errorsUpload)) {
                $extension = pathinfo($files['file']['name'], PATHINFO_EXTENSION);
                $uniqName = uniqid('', true) . '.' . $extension;
                $uploadFile = self::UPLOAD_DIR . $uniqName;
            }

            if (!empty($errorsUpload) || !move_uploaded_file($files['file']['tmp_name'], $uploadFile)) {
                $errors[] = $files['file']['name'] . ' n\'a pu être chargé. Veuillez réessayer.';
            } else {
                $fileName = $uniqName;
            }

            $errors = array_merge($errorsUpload, $errors);
        }

        return [$errors, $fileName];
    }

    private function validateUpload($files)
    {
        $errors = [];

        if (
            file_exists($files['photo']['tmp_name']) &&
            filesize($files['photo']['tmp_name']) > self::MAX_FILE_SIZE
        ) {
            $errors[] = 'Votre fichier doit être inférieur à ' . self::MAX_FILE_SIZE / 1000000 . 'Mo.';
        }

        if ((!in_array(pathinfo($files['photo']['name'], PATHINFO_EXTENSION), self::AUTH_EXTENSION))) {
            $extString = implode(', ', self::AUTH_EXTENSION);
            $errors[] = 'Veuillez sélectionner une image de type ' . $extString . '.';
        }

        if (!empty($files['error'])) {
            $errors[] = 'Erreur d \'upload : ' . $files['error'] . '.';
        }

        return $errors;
    }

    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $report = array_map('trim', $_POST);
            $uploadResult = $this->upload();
            $errors = array_merge($uploadResult[0], $errors);

            if (empty($errors)) {
                $reportManager = new ReportManager();
                $reportManager->add($report);
                header('Location: /admin/report');

                return '';
            }
        }

        return $this->twig->render('Admin/admin-add-report.html.twig', ['errors' => $errors]);
    }
}
