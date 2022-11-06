<?php

namespace App\Controller;

class ContactController extends AbstractController
{
    public const SUBJECTS = [
        '' => 'Votre sujet',
        'maire' => 'M. Le Maire',
        'accueil' => 'Accueil',
        'secretariat' => 'Secretariat',
        'webmaster' => 'Webmaster',
    ];
    public function index(): string
    {
        $contact = [];
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact = array_map('trim', $_POST);

            $errors = $this->validate($contact);
            if (empty($errors)) {
                header('');
            }
        }
        return $this->twig->render(
            'Contact/contact.html.twig',
            ['errors' => $errors, 'contact' => $contact, 'subjects' => self::SUBJECTS]
        );
    }

    private function validate(array $contact): array
    {
        $errors = [];

        if (empty($contact['firstName'])) {
            $errors[] = 'Le prénom est obligatoire';
        }
        if (empty($contact['lastName'])) {
            $errors[] = 'Le nom est obligatoire';
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

        if (!key_exists($contact['subject'], self::SUBJECTS)) {
            $errors[] = 'Le sujet est incorrect';
        }

        if (empty($contact['message'])) {
            $errors[] = 'Le message est obligatoire';
        }

        return $errors;
    }
}
