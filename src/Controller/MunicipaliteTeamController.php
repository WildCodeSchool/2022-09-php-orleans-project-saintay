<?php

namespace App\Controller;

use App\Model\MunicipaliteTeamManager;
use PDO;

class MunicipaliteTeamController extends AbstractController
{
    public function index(): string
    {
        $municipaliteManager = new MunicipaliteTeamManager();
        return $this->twig->render(
            'Municipalite/index.html.twig',
            [
                'employees' => $municipaliteManager->selectAll('lastname'),
            ],
        );
    }

    public function showCommunal(): string
    {
        $municipaliteManager = new MunicipaliteTeamManager();
        $isEmployees = $municipaliteManager->selectIsEmployee('lastname');

        return $this->twig->render(
            'Home/municipalService.html.twig',
            [
                'isEmployees' => $isEmployees,
            ],
        );
    }
}
