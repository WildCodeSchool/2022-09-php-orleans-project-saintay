<?php

namespace App\Controller;

use App\Model\ActualityManager;
use App\Model\WordMayorManager;

class HomeController extends AbstractController
{
    public function index(): string
    {
        $wordManager = new WordMayorManager();
        $wordMayor = $wordManager->selectFirst();

        $actuManager = new ActualityManager();
        $homeActualities = $actuManager->selectActualities(2);
        return $this->twig->render(
            'Home/index.html.twig',
            ['actualities' => $homeActualities, 'wordMayor' => $wordMayor]
        );
    }
    public function displayAllActualities(): string
    {
        $actuManager = new ActualityManager();
        $allActualities = $actuManager->selectActualities(40);
        return $this->twig->render('Home/all-actualities.html.twig', ['actualities' => $allActualities]);
    }
}
