<?php

namespace App\Controller;

class UrbanismController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Urbanism/urbanism.html.twig');
    }
}
