<?php

namespace App\Controller;

use App\Model\MunicipaliteTeamManager;

class MunicipaliteTeamController extends AbstractController
{
    public function index(): string
    {
        $municipaliteManager = new MunicipaliteTeamManager();
        $employees = $municipaliteManager->selectAll('lastname');


        return $this->twig->render(
            'Municipalite/index.html.twig',
            [
                'employees' => $employees,
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
