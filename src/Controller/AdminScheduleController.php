<?php

namespace App\Controller;

use App\Controller\AdminController;
use App\Model\ScheduleManager;

class AdminScheduleController extends AdminController
{
    public function indexAdmin(): string
    {
        $this->authorisedUser();
        $openingTime = new ScheduleManager();
        $openingTimes = $openingTime->selectOpeningTime();
        return $this->twig->render('Admin/admin-schedule.html.twig', ['openingTime' => $openingTimes]);
    }
}
