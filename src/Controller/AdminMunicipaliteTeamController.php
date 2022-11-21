<?php

namespace App\Controller;

use App\Model\MunicipaliteTeamManager;
use PDO;

class AdminMunicipaliteTeamController extends AdminController
{
    public function index(): string
    {
        $this->authorisedUser();
        $municipaliteManager = new MunicipaliteTeamManager();
        return $this->twig->render(
            'Municipalite/admin.html.twig',
            [
                'employees' => $municipaliteManager->selectIsTeam('lastname'),
            ],
        );
    }

    public function add(): string
    {
        $this->authorisedUser();
        $errors = $municipaliteMember = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $municipaliteMember  = array_map('trim', $_POST);

            $errors = $this->validate($municipaliteMember);
            $uploadDir = ' /../uploads/';
            $uploadFile =  $uploadDir . basename($_FILES['avatar']['tmp_name']);
            $municipaliteMember['avatar'] = $uploadFile;

            if (empty($errors)) {
                $municipaliteMember['communal'] = 0;
                $municipalite = new MunicipaliteTeamManager();
                $municipalite->insert($municipaliteMember);

                move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
                header('Location: /admin/municipalite');
            }
        }

        return $this->twig->render(
            'Municipalite/add.html.twig',
            [
                'municipaliteMember' => $municipaliteMember,
                'errors' => $errors,
            ],
        );
    }

    private function validate(array $municipaliteMember): array
    {
        $errors = [];
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $authorizedExtensions = ['jpg', 'jpeg', 'png'];
        $maxFileSize = 200000;
        $maxLenghtCaracteres = 79;

        if (empty($municipaliteMember["firstname"])) {
            $errors[] = "Le prenom est obligatoire";
        }
        if (empty($municipaliteMember["lastname"])) {
            $errors[] = "Le nom est obligatoire";
        }

        if (empty($municipaliteMember["role"])) {
            $errors[] = "Le rôle est obligatoire";
        }

        if (strlen($municipaliteMember["firstname"]) >= $maxLenghtCaracteres) {
            $errors[] = "Le prenom doit faire moins de $maxLenghtCaracteres caracteres";
        }

        if (strlen($municipaliteMember["lastname"]) >= $maxLenghtCaracteres) {
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

    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = (int) trim($_POST['id']);


            $municipalite = new MunicipaliteTeamManager();
            $municipalite->delete($id);
            header('Location: /admin/municipalite');
        }
    }

    public function edit(int $id): string
    {
        $this->authorisedUser();

        $errors = [];
        $municipaliteMembers = new MunicipaliteTeamManager();
        $municipaliteMember = $municipaliteMembers->selectOneById($id);

        if ($municipaliteMember && $_SERVER["REQUEST_METHOD"] === "POST") {
            $municipaliteMembers = array_map('trim', $_POST);
            $municipaliteMembers['id'] = $id;
            $errors = $this->validate($municipaliteMembers);
            $fileName = uniqid() . $_FILES['avatar']['name'];
            $uploadDir = ' /../uploads/';
            $uploadFile =  $uploadDir . $fileName;
            $municipaliteMembers['avatar'] = $fileName;

            if (empty($errors)) {
                $municipalite = new MunicipaliteTeamManager();
                $municipalite->update($municipaliteMembers);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);

                header('Location: /admin/municipalite');
            }
        }

        return $this->twig->render(
            'Municipalite/edit.html.twig',
            [

                'municipaliteMember' => $municipaliteMember,
                'errors' => $errors,
            ],
        );
    }
    public function showAllCommunalTeam()
    {
        $municipaliteManager = new MunicipaliteTeamManager();
        $communalTeam = $municipaliteManager->selectIsEmployee('lastname');
        return $this->twig->render(
            'Admin/admin-communal-team.html.twig',
            [
                'communalTeam' => $communalTeam
            ],
        );
    }
    public function deleteAgent()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = (int) trim($_POST['id']);


            $municipalite = new MunicipaliteTeamManager();
            $municipalite->delete($id);
            header('Location: /admin/equipe-communale');
        }
    }
}
