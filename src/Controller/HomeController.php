<?php

namespace App\Controller;

use App\Model\ActualityManager;

class HomeController extends AbstractController
{
    public function index(): string
    {
        $actuManager = new ActualityManager();
        $homeActualities = $actuManager->selectActualities(2);
        return $this->twig->render('Home/index.html.twig', ['actualities' => $homeActualities]);
    }
    public function displayAllActualities(): string
    {
        $actuManager = new ActualityManager();
        $allActualities = $actuManager->selectActualities(30);
        return $this->twig->render('Home/all-actualities.html.twig', ['actualities' => $allActualities]);
    }
}
