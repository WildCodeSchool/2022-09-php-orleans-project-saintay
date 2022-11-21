<?php

namespace App\Controller;

use App\Model\WordMayorManager;

class AdminWordMayorController extends AdminController
{
    public function index(): string
    {
        $wordManager = new WordMayorManager();
        $wordMayor = $wordManager->selectFirst();
        return $this->twig->render(
            'Admin/adminWordsMayor.html.twig',
            ['wordMayor' => $wordMayor]
        );
    }
    private function validate(array $wordMayor): array
    {
        $errors = [];
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $authorizedExtensions = ['jpg', 'jpeg', 'png'];
        $maxFileSize = 200000;

        if (empty($wordMayor["title"])) {
            $errors[] = "Le titre est obligatoire";
        }
        if (empty($wordMayor["description"])) {
            $errors[] = "La description est obligatoire";
        }

        if (empty($wordMayor["signature"])) {
            $errors[] = "La signature est obligatoire";
        }

        if ((!in_array($extension, $authorizedExtensions))) {
            $errors[] = 'Veuillez sélectionner une image de type ' . implode(', ', $authorizedExtensions);
        }

        if (file_exists($_FILES['image']['tmp_name']) && filesize($_FILES['image']['tmp_name']) > $maxFileSize) {
            $errors[] = 'Votre fichier doit faire moins de ' . $maxFileSize / 1000000;
        }
        return $errors;
    }
    public function add(): ?string
    {
        $errors = [];
        $wordManager = new WordMayorManager();
        $wordMayor = $wordManager->selectFirst();

        if ($wordMayor && $_SERVER["REQUEST_METHOD"] === "POST") {
            $wordManager = array_map('trim', $_POST);

            $errors = $this->validate($wordManager);
            $fileName = uniqid() . $_FILES['image']['name'];
            $uploadDir = ' /../uploads/';
            $uploadFile =  $uploadDir . $fileName;
            $wordManager['image'] = $fileName;

            if (empty($errors)) {
                $word = new WordMayorManager();
                $word->update($wordManager);
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);

                header('Location: ../mot-du-maire');
            }
        }

        return $this->twig->render('Admin/admin-add-wordMayor.html.twig', [
            'errors' => $errors,
            'wordMayor' => $wordMayor ?? ''
        ]);
    }
    public function edit()
    {

        $errors = [];
        $wordManager = new WordMayorManager();
        $wordMayor = $wordManager->selectFirst();

        if ($wordMayor && $_SERVER["REQUEST_METHOD"] === "POST") {
            $wordManager = array_map('trim', $_POST);

            $errors = $this->validate($wordManager);
            $fileName = uniqid() . $_FILES['image']['name'];
            $uploadDir = ' /../uploads/';
            $uploadFile =  $uploadDir . $fileName;
            $wordManager['image'] = $fileName;

            if (empty($errors)) {
                $word = new WordMayorManager();
                $word->update($wordManager);
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);

                header('Location: ../mot-du-maire');
            }
        }


        return $this->twig->render(
            'Admin/editWordMayor.html.twig',
            [
                'errors' => $errors,
                'wordMayor' => $wordMayor
            ]
        );
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $wordManager = new WordMayorManager();
            $wordManager->deleteWord((int)$id);

            header('Location: /admin/mot-du-maire');
        }
    }
}
