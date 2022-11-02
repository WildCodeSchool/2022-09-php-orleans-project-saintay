<?php

namespace App\Controller;

class MunicipalServiceController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Home/municipalService.html.twig');
    }
}
