<?php

namespace App\Controller;

use App\Model\MunicipaliteTeamManager;
use PDO;

class AdminMunicipaliteTeamController extends AdminController
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
            $uploadDir = ' /../uploads/';
            $uploadFile =  $uploadDir . basename($_FILES['avatar']['tmp_name']);
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
        $maxFileSize = 200000;
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
            $errors[] = "Le prenom doit faire moins de $maxLenghtCaracteres caracteres";
        }

        if (strlen($municipaliteManager["lastname"]) >= $maxLenghtCaracteres) {
            $errors[] = "Le nom doit faire moins de $maxLenghtCaracteres caracteres";
        }

        if ((!in_array($extension, $authorizedExtensions))) {
            $errors[] = 'Veuillez sélectionner une image de type ' . implode(', ', $authorizedExtensions);
        }

        if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
            $errors[] = 'Votre fichier doit faire moins de ' . $maxFileSize / 1000000;
        }
        return $errors;
    }


    public function edit(int $id): string
    {

        $errors = [];
        $municipaliteManager = new MunicipaliteTeamManager();
        $municipaliteManagers = $municipaliteManager->selectOneById($id);

        if ($municipaliteManagers && $_SERVER["REQUEST_METHOD"] === "POST") {
            $municipaliteManager = array_map('trim', $_POST);
            $municipaliteManager['id'] = $id;
            $errors = $this->validate($municipaliteManager);
            $fileName = uniqid() . $_FILES['avatar']['name'];
            $uploadDir = ' /../uploads/';
            $uploadFile =  $uploadDir . $fileName;
            $municipaliteManager['avatar'] = $fileName;

            if (empty($errors)) {
                $municipalite = new MunicipaliteTeamManager();
                $municipalite->update($municipaliteManager);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);

                header('Location: /admin/municipalite');
            }
        }
        return $this->twig->render(
            'Municipalite/edit.html.twig',
            [
                'municipaliteManager' => $municipaliteManagers,
                'errors' => $errors,
            ],
        );
    }
}
