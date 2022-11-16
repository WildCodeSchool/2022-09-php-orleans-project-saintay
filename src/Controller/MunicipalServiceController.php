<?php

namespace App\Controller;

use App\Model\MunicipaliteTeamManager;
use App\Model\MunicipalServiceManager;

class MunicipalServiceController extends AbstractController
{
    public function index(): string
    {
        $municipaliteManager = new MunicipaliteTeamManager();
        $isEmployees = $municipaliteManager->selectIsEmployee('lastname');
        return $this->twig->render(
            'Municipal-services/municipalService.html.twig',
            [
                'isEmployees' => $isEmployees,
            ]
        );
    }
}
