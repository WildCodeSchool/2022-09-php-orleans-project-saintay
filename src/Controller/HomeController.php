<?php

namespace App\Controller;

use App\Model\ActualityManager;
use App\Model\WordsMayorManager;

class HomeController extends AbstractController
{
    public function index(): string
    {
        $wordManager = new WordsMayorManager();
        $wordsMayor = $wordManager->selectAll();

        $actuManager = new ActualityManager();
        $homeActualities = $actuManager->selectActualities(2);
        return $this->twig->render(
            'Home/index.html.twig',
            ['actualities' => $homeActualities, 'wordsMayor' => $wordsMayor]
        );
    }
    public function displayAllActualities(): string
    {
        $actuManager = new ActualityManager();
        $allActualities = $actuManager->selectActualities(40);
        return $this->twig->render('Home/all-actualities.html.twig', ['actualities' => $allActualities]);
    }
}
