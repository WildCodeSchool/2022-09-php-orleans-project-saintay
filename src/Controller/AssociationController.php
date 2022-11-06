<?php

namespace App\Controller;

class AssociationController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Association/association.html.twig');
    }
}
