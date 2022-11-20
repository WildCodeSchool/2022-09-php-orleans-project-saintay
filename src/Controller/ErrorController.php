<?php

namespace App\Controller;

class ErrorController extends AbstractController
{
    public function error(int $error)
    {
        return $this->twig->render('Error/error.html.twig', [
            'error' => $error,
        ]);
    }
}
