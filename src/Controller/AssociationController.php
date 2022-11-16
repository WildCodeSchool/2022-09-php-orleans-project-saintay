<?php

namespace App\Controller;

use App\Model\AssoCategoryManager;
use App\Model\AssociationManager;

class AssociationController extends AbstractController
{
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
}
