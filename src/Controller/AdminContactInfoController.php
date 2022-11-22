<?php

namespace App\Controller;

use App\Controller\AdminController;
use App\Model\ContactInformationManager;

class AdminContactInfoController extends AdminController
{
    public function edit(int $id): string
    {
        $errors = [];
        $contactInformation = new ContactInformationManager();
        $contactInformations = $contactInformation->selectOneById($id);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $contactInformations = array_map('trim', $_POST);
            $contactInformations['id'] = $id;
            $errors = $this->validate($contactInformations);

            if (empty($errors)) {
                $contactInformation = new ContactInformationManager();
                $contactInformation->update($contactInformations);
                header('Location: /admin/horaires');
            }
        }

        return $this->twig->render(
            'Admin/_form-admin-contactInfo.html.twig',
            [

                'contactInformations' => $contactInformations,
                'errors' => $errors,
            ],
        );
    }

    private function validate(array $contactInformations): array
    {
        $errors = [];
        $maxLenghtCaracteres = 254;

        if (empty($contactInformations["title"])) {
            $errors[] = "L'adresse est obligatoire";
        }
        if (empty($contactInformations["info"])) {
            $errors[] = "Les infos s'ont obligatoire";
        }

        if (strlen($contactInformations["title"]) >= $maxLenghtCaracteres) {
            $errors[] = "La date doit faire moins de $maxLenghtCaracteres caracteres";
        }

        if (strlen($contactInformations["info"]) >= $maxLenghtCaracteres) {
            $errors[] = "L'heure doit faire moins de $maxLenghtCaracteres caracteres";
        }

        return $errors;
    }
}
