<?php

namespace App\Controller;

class MunicipalServicesController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Municipal_services/periscolaire.html.twig');
    }
}
