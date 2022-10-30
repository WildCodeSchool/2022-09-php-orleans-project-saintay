<?php

namespace App\Controller;

use App\Model\UserManager;

class LoginController extends AbstractController
{
    public function login(): string
    {
        $errors = [];
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
                        $_SESSION['user'] = $user['id'];
                        header('Location: admin/users');
                    } else {
                        $errors[] = 'Le mot de passe est incorrect.';
                    }
                }
            }
        }

        return $this->twig->render('Login/login.html.twig', ['errors' => $errors]);
    }

    public function logout()
    {
        if (!empty($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        header('Location: /');
    }
}
