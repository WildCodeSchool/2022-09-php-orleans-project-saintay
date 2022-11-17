<?php

namespace App\Controller;

use App\Model\ActualityManager;
use App\Model\ContactInformationManager;
use App\Model\OpeningTimeManager;

class HomeController extends AbstractController
{
    public function index(): string
    {

        $contactInformation = new ContactInformationManager();
        $contact = $contactInformation->selectContactInformation();
        $openingTime = new OpeningTimeManager();
        $openingTimes = $openingTime->selectOpeningTime();
        $actuManager = new ActualityManager();
        $homeActualities = $actuManager->selectActualities(2);
        return $this->twig->render('Home/index.html.twig', ['actualities' => $homeActualities,
        'openingTimes' => $openingTimes, 'contacts' => $contact]);
    }
    public function displayAllActualities(): string
    {
        $actuManager = new ActualityManager();
        $allActualities = $actuManager->selectActualities(40);
        return $this->twig->render('Home/all-actualities.html.twig', ['actualities' => $allActualities]);
    }
}
