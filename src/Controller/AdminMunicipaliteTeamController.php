<?php

namespace App\Controller;

use App\Model\MunicipaliteTeamManager;
use PDO;

class AdminMunicipaliteTeamController extends AbstractController
{
    public function index(): string
    {
        $municipaliteManager = new MunicipaliteTeamManager();
        return $this->twig->render(
            'Municipalite/admin.html.twig',
            [
                'employees' => $municipaliteManager->selectAll('lastname'),
            ],
        );
    }

    public function add(): string
    {


        $errors = $municipaliteManager = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $municipaliteManager = array_map('trim', $_POST);
            $errors = $this->validate($municipaliteManager);
            $uploadDir = 'upload/';
            $uploadFile = " /../" . $uploadDir . basename($_FILES['avatar']['name']);
            $municipaliteManager['avatar'] = $uploadFile;

            if (empty($errors)) {
                $municipalite = new MunicipaliteTeamManager();
                $municipalite->insert($municipaliteManager);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);

                header('Location: /admin/municipalite');
            }
        }

        return $this->twig->render(
            'Municipalite/add.html.twig',
            [
                'addMunicipaliteManager' => $municipaliteManager,
                'errors' => $errors,
            ],
        );
    }

    private function validate(array $municipaliteManager): array
    {

        $errors = [];

        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

        $authorizedExtensions = ['jpg', 'jpeg', 'png'];

        $maxFileSize = 2000000;

        $maxLenghtCaracteres = 79;


        if (empty($municipaliteManager["firstname"])) {
            $errors[] = "Le prenom est obligatoire";
        }
        if (empty($municipaliteManager["lastname"])) {
            $errors[] = "Le nom est obligatoire";
        }

        if (empty($municipaliteManager["role"])) {
            $errors[] = "Le rôle est obligatoire";
        }

        if (strlen($municipaliteManager["firstname"]) >= $maxLenghtCaracteres) {
            $errors[] = "Le prenom doit faire moin de 80 caracteres";
        }

        if (strlen($municipaliteManager["lastname"]) >= $maxLenghtCaracteres) {
            $errors[] = "Le nom doit faire moin de 80caracteres";
        }

        if ((!in_array($extension, $authorizedExtensions))) {
            $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png !';
        }

        if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
            $errors[] = "Votre fichier doit faire moins de 2M !";
        }

        return $errors;
    }
}