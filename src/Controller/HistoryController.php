<?php

namespace App\Controller;

class HistoryController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('History/history.html.twig');
    }
}
