<?php

namespace App\Controller;

class HistoryController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Home/history.html.twig');
    }
}
