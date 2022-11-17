<?php

namespace App\Controller;

use App\Controller\AdminController;
use App\Model\OpeningTimeManager;

class AdminTimeController extends AdminController
{
    public function indexAdmin(): string
    {
        $openingTime = new OpeningTimeManager();
        $openingTimes = $openingTime->selectOpeningTime();
        return $this->twig->render('Admin/admin-openingTime.html.twig', ['openingTime' => $openingTimes]);
    }
}
