<?php

namespace App\Controller;

use App\Model\ActualiteManager;

class HomeController extends AbstractController
{
    public function index(): string
    {
        $actuManager = new ActualiteManager();
        $homeActu = $actuManager->selectHomeActu();
        return $this->twig->render('Home/index.html.twig', ['actualit' => $homeActu]);
    }
}
