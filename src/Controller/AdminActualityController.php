<?php

namespace App\Controller;

use DateTime;
use App\Model\ActualityManager;
use App\Controller\AbstractController;

class AdminActualityController extends AbstractController
{
    public function index()
    {
        $actuManager = new ActualityManager();
        $actualities = $actuManager->selectActualities(60);
        return $this->twig->render('Admin/admin-actuality.html.twig', ['actualities' => $actualities]);
    }
    public function validate(array $actuality, array $errors): array
    {
        if (DateTime::createFromFormat('Y-m-d', $actuality['date']) === false) {
            $errors[] = 'Le format de la date est incorrect';
        }
        if (empty($actuality['title'])) {
            $errors[] = 'Erreur, le champ titre est requis';
        }
        if (strlen($actuality['title']) > 255) {
            $errors[] = "Erreur, le nom du titre est trop long";
        }
        if (empty($actuality['date'])) {
            $errors[] = 'Erreur, le champ date est requis';
        }
        if (empty($actuality['description'])) {
            $errors[] = 'Erreur, le champ description est requis';
        }
        if (empty($actuality['link'])) {
            $errors[] = 'Erreur, le lien de l\'actualité est requis';
        }
        if (empty($actuality['image'])) {
            $errors[] = 'Erreur, le lien de l\'image est requis';
        }

        return $errors;
    }

    public function add(): ?string
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $actuality = array_map('trim', $_POST);

            $errors = self::validate($actuality, $errors);

            if (empty($errors)) {
                $actualityManager = new ActualityManager();
                $actualityManager->insert($actuality);

                header('Location: /admin/actualite');
                return '';
            }
        }

        return $this->twig->render('Admin/admin-add-actuality.html.twig', [
            'errors' => $errors,
            'actuality' => $actuality ?? ''
        ]);
    }
}
