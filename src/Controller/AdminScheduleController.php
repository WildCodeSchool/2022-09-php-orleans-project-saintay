<?php

namespace App\Controller;

use App\Model\ScheduleManager;
use App\Controller\AdminController;
use App\Model\ContactInformationManager;

class AdminScheduleController extends AdminController
{
    public function indexAdmin(): string
    {
        $this->authorisedUser();
        $contactInformation = new ContactInformationManager();
        $contactInformations = $contactInformation->selectAll();
 
        $openingTime = new ScheduleManager();
        $openingTimes = $openingTime->selectOpeningTime();
        return $this->twig->render('Admin/admin-schedule.html.twig', ['openingTimes' => $openingTimes,
        'contactInformations' => $contactInformations]);
    }

    public function edit(int $id): string
    {
        $errors = [];
        $openingTime = new ScheduleManager();
        $openingTimes = $openingTime->selectOneById($id);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $openingTimes = array_map('trim', $_POST);
            $openingTimes['id'] = $id;
            $errors = $this->validate($openingTimes);

            if (empty($errors)) {
                $openingTime = new ScheduleManager();
                $openingTime->update($openingTimes);
                header('Location: /admin/horaires');
            }
        }

        return $this->twig->render(
            'Admin/_form-admin-schedule.html.twig',
            [

                'openingTimes' => $openingTimes,
                'errors' => $errors,
            ],
        );
    }

    private function validate(array $openingTimes): array
    {
        $errors = [];
        $maxLenghtCaracteres = 254;

        if (empty($openingTimes["day"])) {
            $errors[] = "La date est obligatoire";
        }
        if (empty($openingTimes["hour"])) {
            $errors[] = "L'heure est obligatoire";
        }

        if (strlen($openingTimes["day"]) >= $maxLenghtCaracteres) {
            $errors[] = "La date doit faire moins de $maxLenghtCaracteres caracteres";
        }

        if (strlen($openingTimes["hour"]) >= $maxLenghtCaracteres) {
            $errors[] = "L'heure doit faire moins de $maxLenghtCaracteres caracteres";
        }

        return $errors;
    }
}
