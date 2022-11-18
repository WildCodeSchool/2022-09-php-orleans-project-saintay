<?php

namespace App\Controller;

use App\Model\MunicipaliteTeamManager;
use PDO;

class MunicipaliteTeamController extends AbstractController
{
    public function index(): string
    {
        $municipaliteManager = new MunicipaliteTeamManager();
        return $this->twig->render('Municipalite/index.html.twig');
    }
    public function municipalTeam(): string
    {
        $municipaliteManager = new MunicipaliteTeamManager();
        return $this->twig->render(
            'Municipalite/municipalTeam.html.twig',
            [
                'employees' => $municipaliteManager->selectIsTeam('lastname'),
            ],
        );
    }
}
