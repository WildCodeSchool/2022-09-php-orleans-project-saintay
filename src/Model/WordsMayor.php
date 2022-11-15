<?php

namespace App\Controller;

use App\Model\MunicipaliteTeamManager;

class WordsMayorController extends AbstractController
{
    public function index(): string
    {
        $wordsMayor = new WordsMayorController();
        return $this->twig->render(
            'Home/index.html.twig',
            [
                'words' => $$wordsMayor->selectAll('lastname'),
            ],
        );
    }
}
