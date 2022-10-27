<?php

namespace App\Controller;

class ContactController extends AbstractController
{
    public function validator(): string
    {
        $contact = [];
        $errors = [];
        $subjects = [
            '' => 'Votre sujet',
            'maire' => 'M. Le Maire',
            'accueil' => 'Accueil',
            'secretariat' => 'Secretariat',
            'webmaster' => 'Webmaster',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact = array_map('trim', $_POST);

            if (empty($contact['firstName']) || empty($contact(['lastName']))) {
                $errors[] = 'Le nom et le prénom sont obligatoires';
            }

            if (empty($contact['emailInfo'])) {
                $errors[] = 'L\'email est obligatoire';
            }

            if (!filter_var($contact['emailInfo'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Le format d\'email est incorrect';
            }

            if (empty($contact['phoneNumber'])) {
                $errors[] = 'Le téléphone est obligatoire';
            }

            if (empty($contact['message'])) {
                $errors[] = 'Le message est obligatoire';
            }

            if (empty($errors)) {
                header('');
            }
        }
        return $this->twig->render(
            'Contact/contact.html.twig',
            ['errors' => $errors, 'contact' => $contact, 'subjects' => $subjects]
        );
    }
}
