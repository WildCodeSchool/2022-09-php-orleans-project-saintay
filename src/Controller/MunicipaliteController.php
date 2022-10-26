<?php

namespace App\Controller;

class MunicipaliteController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Municipalite/index.html.twig');
    }
}
