<?php

namespace App\Controller;

use App\Model\AssociationManager;

class AssociationController extends AbstractController
{
    public function index(): string
    {
        $associationManager = new AssociationManager();
        $associations = $associationManager->selectAllAssociation();
        return $this->twig->render('Association/association.html.twig', ['associations' => $associations]);
    }
    public function home(): string
    {
        return $this->twig->render('Association/home-association.html.twig');
    }
}
