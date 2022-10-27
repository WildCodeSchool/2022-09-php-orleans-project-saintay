<?php

namespace App\Controller;

use App\Model\MunicipaliteManager;
use PDO;

class MunicipaliteController extends AbstractController
{

   // public MunicipaliteManager $municipaliteManager = new MunicipaliteManager();

    public function index(): string

    {
        $municipaliteManager = new MunicipaliteManager();
        return $this->twig->render(
            'Municipalite/index.html.twig',
            [
                'personne' => $municipaliteManager->selectAll(),
            ],
        );
    }
}
