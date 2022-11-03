<?php

namespace App\Controller;

use App\Model\MunicipaliteManager;
use PDO;

class MunicipaliteController extends AbstractController
{
    public function index(): string
    {
        $municipaliteManager = new MunicipaliteManager();
        return $this->twig->render(
            'Municipalite/index.html.twig',
            [
                'employees' => $municipaliteManager->selectAll('lastname'),
            ],
        );
    }
}
