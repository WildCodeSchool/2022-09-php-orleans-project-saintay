<?php

namespace App\Controller;

use App\Model\AssoCategoryManager;
use App\Model\AssociationManager;

class AssociationController extends AbstractController
{
    public const INPUT_MAX_LENGTH = 120;
    public const PHONE_NUMBER_LENGTH = 10;

    public function index(): string
    {
        $this->authorisedUser();
        $associationManager = new AssociationManager();
        $associations = $associationManager->selectByCategory();
        return $this->twig->render('Admin/admin-association.html.twig', [
            'associations' => $associations
        ]);
    }
    public function home(): string
    {
        return $this->twig->render('Association/home-association.html.twig');
    }
    public function filterByCategory(int $category = null)
    {
        $associationManager = new AssociationManager();
        $assoCategoryManager = new AssoCategoryManager();

        if ($category !== null) {
            $associations = $associationManager->selectByCategory($category);
        } else {
            $associations = $associationManager->selectByCategory();
        }

        $categories = $assoCategoryManager->selectAll();

        return $this->twig->render('Association/association.html.twig', [
            'associations' => $associations,
            'categories' => $categories
        ]);
    }
    public function add(): string
    {
        $this->authorisedUser();
        $errors = [];
        $assoCategoryManager = new AssoCategoryManager();
        $categories = $assoCategoryManager->selectAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $association = array_map('trim', $_POST);

            $errors = $this->validate($association, $categories);
            $phoneError = $this->validatePhone($association['phone_number']);
            $errors = array_merge($errors, $phoneError);

            if (empty($errors)) {
                $associationManager = new AssociationManager();
                $associationManager->insert($association);

                header('Location: /admin/association');
                return '';
            }
        }
        return $this->twig->render('Admin/admin-add-association.html.twig', [
            'errors' => $errors,
            'association' => $association ?? '',
            'categories' => $categories

        ]);
    }
    public function edit($id)
    {
        $this->authorisedUser();
        $errors = [];
        $categories = [];
        $associationManager = new AssociationManager();
        $association = $associationManager->SelectOneById((int)$id);
        $assoCategoryManager = new AssoCategoryManager();
        $categories = $assoCategoryManager->selectAll('name');

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $association = array_map('trim', $_POST);
            $errors = $this->validate($association, $categories);
            $phoneError = $this->validatePhone($association['phone_number']);
            $errors = array_merge($errors, $phoneError);

            if (empty($errors)) {
                $associationManager->update($id, $association);

                header('Location: /admin/association');
                return '';
            }
        }
        return $this->twig->render('Admin/admin-edit-association.html.twig', [
            'errors' => $errors,
            'association' => $association,
            'categories' => $categories
        ]);
    }

    private function validate(array $association, array $categories): array
    {
        $categoriesID = [];
        foreach ($categories as $category) {
            $categoriesID[] = $category['id'];
        }
        $errors = [];
        if (empty($association['name'])) {
            $errors[] = 'Le title d\'association est obligatoire.';
        }
        if (empty($association['category'])) {
            $errors[] = 'La categorie d\'association est obligatoire.';
        }
        if (!in_array((int)$association['category'], $categoriesID)) {
            $errors[] = 'La catégorie n\'exite pas';
        }
        if (empty($association['description'])) {
            $errors[] = 'La description d\'association est obligatoire.';
        }
        if (strlen($association['name']) > self::INPUT_MAX_LENGTH) {
            $errors[] = 'Le titre doit faire moins de ' . self::INPUT_MAX_LENGTH . ' caractères';
        }
        return $errors;
    }
    public function validatePhone($phoneNumber)
    {
        $errors = [];
        if (empty($phoneNumber)) {
            $errors[] = 'Le numero de téléphone de l\'association est obligatoire.';
        }
        if (!is_numeric($phoneNumber)) {
            $errors[] =
                'Le numero de téléphone de l\'association dois être numerique, sans espaces et 
                sans caractères spéciaux.';
        }
        if (
            strlen($phoneNumber) < self::PHONE_NUMBER_LENGTH
            || strlen($phoneNumber) > self::PHONE_NUMBER_LENGTH
        ) {
            $errors[] = 'Le  numero de téléphone doit contenir '
                . self::PHONE_NUMBER_LENGTH . ' chiffres.';
        }
        return $errors;
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);

            $associationManager = new AssociationManager();
            $associationManager->deleteAssociation((int)$id);

            header('Location: /admin/association');
        }
    }
}
