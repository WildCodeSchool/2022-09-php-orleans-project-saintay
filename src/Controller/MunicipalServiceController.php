<?php

namespace App\Controller;

use App\Model\MunicipalServiceManager;

class MunicipalServiceController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Home/municipalService.html.twig');
    }
}
