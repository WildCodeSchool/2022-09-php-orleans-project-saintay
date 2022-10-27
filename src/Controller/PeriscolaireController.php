<?php

namespace App\Controller;

class PeriscolaireController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Services_municipaux/periscolaire.html.twig');
    }
}
