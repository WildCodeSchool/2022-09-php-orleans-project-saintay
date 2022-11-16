<?php

namespace App\Controller;

use App\Model\WordMayorManager;
use App\Controller\AdminController;

class AdminWordMayorController extends AdminController
{
    public function index()
    {
        $wordManager = new WordMayorManager();
        $wordMayor = $wordManager->selectFirst();
        return $this->twig->render(
            'Admin/adminWordsMayor.html.twig',
            ['wordMayor' => $wordMayor]
        );
    }
    public function validate(array $wordMayor, array $errors): array
    {
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
    public function edit(): string
    {
        $errors = [];
        $wordManager = new WordMayorManager();
        $wordMayor = $wordManager->selectFirst();



        return $this->twig->render(
            'Admin/editWordMayor.html.twig',
            [
                'errors' => $errors,
                'wordMayor' => $wordMayor
            ]
        );
    }
    public function deleteWord()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $wordManager = new WordMayorManager();
            $wordManager->delete((int)$id);

            header('Location: Admin/adminWordsMayor.html.twig');
        }
    }
}
