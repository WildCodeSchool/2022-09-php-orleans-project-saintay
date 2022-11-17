<?php

namespace App\Controller;

use App\Model\WordMayorManager;
use App\Controller\AdminController;

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

        if (empty($wordMayor['title'])) {
            $errors[] = 'Erreur, le champ titre est requis';
        }
        if (empty($wordMayor['description'])) {
            $errors[] = 'Erreur, le champ description est requis';
        }
        if (empty($wordMayor['image'])) {
            $errors[] = 'Erreur, le lien de l\'image est requis';
        }
        if (empty($wordMayor['signature'])) {
            $errors[] = 'Erreur, la signature est requis';
        }

        return $errors;
    }
    private function validateUpload(array $file)
    {
        $errors = [];

        if ($file['error'] != 0) {
            $errors[] = 'l\'image est trop grande';
            return $errors;
        }

        $maxFileSize = 1000000;
        if ($file['size'] > $maxFileSize) {
            $errors[] = 'Le fichier doit faire moins de ' . $maxFileSize / 1000000 . 'Mo';
        }

        $authorizedMimes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $mime = mime_content_type($file['tmp_name']);
        if (in_array($mime, $authorizedMimes)) {
            $errors[] = "Le fichier doit être de type " . implode(',', $authorizedMimes);
        }
        return $errors;
    }

    public function edit(): string
    {
        $errors = [];
        $wordManager = new WordMayorManager();
        $wordMayor = $wordManager->selectFirst();

        if ($wordMayor && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $wordMayor = array_map('trim', $_POST);
            $wordErrors = $this->validate($wordMayor);
            $uploadErrors = $this->validateUpload($_FILES['image']);

            $errors = array_merge($wordErrors, $uploadErrors);

            if (empty($errors)) {
                $wordManager = new WordMayorManager();
                $wordManager->update($wordMayor);

                header('Location: Admin/adminWordsMayor.html.twig');
            }
        };


        return $this->twig->render(
            'Admin/editWordMayor.html.twig',
            [
                'errors' => $errors,
                'wordMayor' => $wordMayor
            ]
        );
    }
}
