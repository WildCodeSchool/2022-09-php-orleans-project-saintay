<?php

namespace App\Controller;

use App\Model\AssociationManager;
use App\Controller\AbstractController;
use Exception;

class AdminAssociationController extends AdminController
{
    public const INPUT_MAX_LENGTH = 120;

    public function index(): string
    {
        $associationManager = new AssociationManager();
        $associations = $associationManager->selectAllAssociation();
        return $this->twig->render('Admin/admin-association.html.twig', ['associations' => $associations]);
    }
    public function add(): string
    {
        $errors = $association = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $association = array_map('trim', $_POST);
            $errors = $this->validate($association);
            if (empty($errors)) {
                $associationManager = new AssociationManager();
                $associationManager->insert($association);

                header('Location: /admin/association');
                return '';
            }
        }
        return $this->twig->render('Admin/admin-add-association.html.twig', [
            'errors' => $errors,
            'association' => $association,
        ]);
    }
    private function validate(array $association): array
    {
        $errors = [];
        if (empty($association['image'])) {
            $errors[] = 'L\'image d\'association est obligatoire';
        }
        if (empty($association['title'])) {
            $errors[] = 'Le title d\'association est obligatoire';
        }
        if (empty($association['category'])) {
            $errors[] = 'La categorie d\'association est obligatoire';
        }
        if (empty($association['description'])) {
            $errors[] = 'La description d\'association est obligatoire';
        }
        if (empty($association['phone_number'])) {
            $errors[] = 'Le numero d\'association est obligatoire';
        }
        if (strlen($association['name']) > self::INPUT_MAX_LENGTH) {
            $errors[] = 'Le titre doit faire moins de ' . self::INPUT_MAX_LENGTH . ' caractères';
        }
        return $errors;
    }
}
