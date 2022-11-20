<?php

namespace App\Controller;

use App\Model\UserManager;

class LoginController extends AbstractController
{
    public function login(): string
    {
        $errors = $credentials = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $credentials = array_map('trim', $_POST);
            if (empty($credentials['email'])) {
                $errors[] = "L'email est obligatoire.";
            }
            if (empty($credentials['password'])) {
                $errors[] = "Le mot de passe est obligatoire.";
            }
            if (!filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'email est incorrect.";
            }

            if (empty($errors)) {
                $userManager = new UserManager();
                $user = $userManager->selectOneByEmail($credentials['email']);
                if ($user) {
                    if (password_verify($credentials['password'], $user['password'])) {
                        $_SESSION['user_id'] = $user['id'];
                        header('Location: /admin');
                    } else {
                        $errors[] = 'Le nom d\'utilsateur où le mot de passe est incorrect.';
                    }
                } else {
                    $errors[] = 'Le nom d\'utilsateur où le mot de passe est incorrect.';
                }
            }
        }

        return $this->twig->render('Login/login.html.twig', [
            'errors' => $errors,
            'credentials' => $credentials,
        ]);
    }

    public function logout(): void
    {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
        }
        header('Location: /');
    }
}
