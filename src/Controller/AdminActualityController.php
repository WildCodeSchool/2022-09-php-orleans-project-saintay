<?php

namespace App\Controller;

use DateTime;
use App\Model\ActualityManager;
use App\Controller\AbstractController;

class AdminActualityController extends AdminController
{
    public function index()
    {
        $actuManager = new ActualityManager();
        $actualities = $actuManager->selectActualities(30);
        return $this->twig->render('Admin/admin-actuality.html.twig', ['actualities' => $actualities]);
    }

    public function add(): ?string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $actuality = array_map('trim', $_POST);

            if (DateTime::createFromFormat('Y-m-d', $actuality['date']) === false) {
                $errors[] = 'Le format de la date est incorrect';
            }
            if (empty($actuality['title'])) {
                $errors[] = 'Erreur, le champ titre est requis';
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
