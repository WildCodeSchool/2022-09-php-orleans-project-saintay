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
        $municipaliteManager = new MunicipaliteTeamManager();
        return $this->twig->render(
            'Municipalite/add.html.twig',
            [
                'employees' => $municipaliteManager->selectAll('lastname'),
            ],
        );
    }
}
