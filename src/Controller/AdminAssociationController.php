<?php

namespace App\Controller;

use App\Model\AssociationManager;
use App\Model\AssoCategoryManager;
use App\Controller\AbstractController;
use Exception;

class AdminAssociationController extends AdminController
{
    public const INPUT_MAX_LENGTH = 120;
    public const PHONE_NUMBER_LENGTH = 10;

    public function index(): string
    {
        $associationManager = new AssociationManager();
        $associations = $associationManager->selectAllAssociation();
        return $this->twig->render('Admin/admin-association.html.twig', ['associations' => $associations]);
    }
    public function add(): string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $association = array_map('trim', $_POST);

            $errors = $this->validate($association);


            $assoCategoryId = $this->toCategorie($association['category']);

            if (empty($errors)) {
                $associationManager = new AssociationManager();
                $associationManager->insert($association, $assoCategoryId);

                header('Location: /admin/association');
                return '';
            }
        }
        return $this->twig->render('Admin/admin-add-association.html.twig', [
            'errors' => $errors,
            'association' => $association ?? ''

        ]);
    }
    private function validate(array $association): array
    {

        $errors = [];
        if (empty($association['name'])) {
            $errors[] = 'Le title d\'association est obligatoire';
        }
        if (empty($association['category'])) {
            $errors[] = 'La categorie d\'association est obligatoire';
        }
        if (empty($association['description'])) {
            $errors[] = 'La description d\'association est obligatoire';
        }
        if (empty($association['phone_number'])) {
            $errors[] = 'Le numero de téléphone de l\'association est obligatoire';
        }
        if (
            strlen($association['phone_number']) < self::PHONE_NUMBER_LENGTH
            || strlen($association['phone_number']) > self::PHONE_NUMBER_LENGTH
        ) {
            $errors[] = 'Le  numero de téléphone doit contenir '
                . self::PHONE_NUMBER_LENGTH . ' chiffres, et sans espaces';
        }
        if (strlen($association['name']) > self::INPUT_MAX_LENGTH) {
            $errors[] = 'Le titre doit faire moins de ' . self::INPUT_MAX_LENGTH . ' caractères';
        }
        return $errors;
    }
    private function toCategorie(string $categoryInput)
    {
        $categoryManager = new AssoCategoryManager();
        $categories = $categoryManager->selectAll();
        foreach ($categories as $category) {
            if ($categoryInput === $category['name']) {
                return $category['id'];
            }
        }
    }
}
