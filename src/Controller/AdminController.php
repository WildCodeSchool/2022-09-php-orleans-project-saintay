<?php

namespace App\Controller;

class AdminController extends AbstractController
{
    /**
     * Display home admin page
     */
    public function index(): string
    {
        if (!isset($_SESSION['user_id'])) {
            header('HTTP/1.1 404 The requested URL was not found in this server');
            return $this->twig->render('Error404/error404.html.twig', [
                'error' => '404',
            ]);
        }
        return $this->twig->render('Admin/admin.html.twig');
    }
}
