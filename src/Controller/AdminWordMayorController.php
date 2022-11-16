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

    public function edit(int $id): string
    {
        $errors = [];
        $wordManager = new WordMayorManager();
        $wordMayor = $wordManager->selectOneById($id);



        return $this->twig->render(
            'Admin/editWordMayor.html.twig',
            [
                'errors' => $errors,
                'wordMayor' => $wordMayor
            ]
        );
    }
}
