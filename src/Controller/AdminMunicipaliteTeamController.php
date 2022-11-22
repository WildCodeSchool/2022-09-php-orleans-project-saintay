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
            $fileError = $this->validateFile($_FILES);
            $errors = array_merge($errors, $fileError);
            $uploadDir = ' /../uploads/';
            $fileName = uniqid() . $_FILES['avatar']['name'];
            $uploadFile =  $uploadDir . $fileName;

            if (empty($errors)) {
                $iscommunal = false;
                $municipaliteManager = new MunicipaliteTeamManager();
                $municipaliteManager->insert($municipaliteMember, (int)$iscommunal, $uploadFile);
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

    public function validate(array $municipaliteMember): array
    {
        $errors = [];
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

        return $errors;
    }
    public function validateFile($file)
    {
        $errors = [];
        $extension = pathinfo($file['avatar']['name'], PATHINFO_EXTENSION);
        $authorizedExtensions = ['jpg', 'jpeg', 'png'];
        $maxFileSize = 200000;

        if ((!in_array($extension, $authorizedExtensions))) {
            $errors[] = 'Veuillez sélectionner une image de type ' . implode(', ', $authorizedExtensions);
        }
        if (file_exists($file['avatar']['tmp_name']) && filesize($file['avatar']['tmp_name']) > $maxFileSize) {
            $errors[] = 'Votre fichier doit faire moins de ' . $maxFileSize / 1000000 . ' Mo';
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

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $municipaliteMembers = array_map('trim', $_POST);
            $municipaliteMembers['id'] = $id;
            $errors = $this->validate($municipaliteMembers);
            $fileName = uniqid() . $_FILES['avatar']['name'];
            $uploadDir = ' /../uploads/';
            $uploadFile =  $uploadDir . $fileName;
            $municipaliteMembers['avatar'] = $fileName;

            if (empty($errors)) {
                $municipalite = new MunicipaliteTeamManager();
                $municipalite->update($id, $municipaliteMembers);
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
        $this->authorisedUser();
        $municipaliteManager = new MunicipaliteTeamManager();
        $communalTeam = $municipaliteManager->selectIsEmployee('lastname');
        return $this->twig->render(
            'Admin/admin-communal-team.html.twig',
            [
                'communalTeam' => $communalTeam
            ],
        );
    }

    public function editCommunalAgent(int $agentID): string
    {
        $this->authorisedUser();
        $errors = [];
        $municipaliteManager = new MunicipaliteTeamManager();
        $communalAgent = $municipaliteManager->selectOneById($agentID);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $communalAgent = array_map('trim', $_POST);
            $errors = $this->validate($communalAgent);


            $municipaliteManager = new MunicipaliteTeamManager();

            if (empty($errors)) {
                if (!empty($_FILES['avatar']['name'])) {
                    $errorsFile = $this->validateFile($_FILES);
                    if (empty($errorsFile)) {
                        $fileName = uniqid() . $_FILES['avatar']['name'];
                        $uploadDir = ' /../uploads/';
                        $uploadFile =  $uploadDir . $fileName;

                        $municipaliteManager->update($agentID, $communalAgent, $uploadFile);
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);

                        header('Location: /admin/equipe-communale');
                    } else {
                        $errors = array_merge($errors, $errorsFile);
                    }
                } else {
                    $municipaliteManager->update($agentID, $communalAgent);

                    header('Location: /admin/equipe-communale');
                }
            }
        }

        return $this->twig->render(
            'Admin/admin-edit-communal-team.html.twig',
            [
                'agent' => $communalAgent,
                'errors' => $errors
            ]
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

    public function addCommunalAdgent()
    {
        $errors = [];
        $isCommunal = true;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $communalAdgent  = array_map('trim', $_POST);
            $errors = $this->validate($communalAdgent);

            if (empty($errors)) {
                $municipaliteManager = new MunicipaliteTeamManager();

                if (!empty($_FILES['avatar']['name'])) {
                    $errorsFile = $this->validateFile($_FILES);
                    if (empty($errorsFile)) {
                        $uploadDir = ' /../uploads/';
                        $fileName = uniqid() . $_FILES['avatar']['name'];
                        $uploadFile =  $uploadDir . $fileName;
                        $municipaliteManager->insert($communalAdgent, (int)$isCommunal, $uploadFile);

                        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
                        header('Location: /admin/equipe-communale');
                    }
                } else {
                    $municipaliteManager->insert($communalAdgent, (int)$isCommunal);
                    header('Location: /admin/equipe-communale');
                }
            }
        }
        return $this->twig->render('Admin/admin-communal-team-add.html.twig', [
            'errors' => $errors,
            'adgent' => $communalAdgent ?? ''
        ]);
    }
}
