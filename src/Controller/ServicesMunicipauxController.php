<?php

namespace App\Controller;

class ServicesMunicipauxController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Home/servicesMunicipaux.html.twig');
    }
}
