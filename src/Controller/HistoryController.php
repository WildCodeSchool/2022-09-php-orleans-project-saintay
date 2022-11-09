<?php

namespace App\Controller;

use App\Controller\AbstractController;

class HistoryController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('History/history.html.twig');
    }
}
