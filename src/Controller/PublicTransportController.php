<?php

namespace App\Controller;

class PublicTransportController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Home/municipalService.html.twig');
    }
}
