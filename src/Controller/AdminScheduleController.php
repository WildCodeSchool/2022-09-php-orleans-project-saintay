<?php

namespace App\Controller;

use App\Controller\AdminController;
use App\Model\ScheduleManager;

class AdminScheduleController extends AdminController
{
    public function indexAdmin(): string
    {
        $openingTime = new ScheduleManager();
        $openingTimes = $openingTime->selectOpeningTime();
        return $this->twig->render('Admin/admin-openingTime.html.twig', ['openingTime' => $openingTimes]);
    }
}
