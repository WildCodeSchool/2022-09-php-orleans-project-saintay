<?php

namespace App\Controller;

class UrbanismController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Urbanism/urbanism.html.twig');
    }
}
