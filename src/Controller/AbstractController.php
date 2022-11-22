<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use Twig\Extra\String\StringExtension;
use App\Model\UserManager;

/**
 * Initialized some Controller common features (Twig...)
 */
abstract class AbstractController
{
    protected Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(APP_VIEW_PATH);
        $this->twig = new Environment(
            $loader,
            [
                'cache' => false,
                'debug' => true,
            ]
        );
        $this->twig->addExtension(new DebugExtension());
        $this->twig->addExtension(new StringExtension());
        $user = null;
        if (isset($_SESSION['user_id'])) {
            $userManager = new UserManager();
            $user = $userManager->selectOneById($_SESSION['user_id']);
        }
        $this->twig->addGlobal('user', $user);
    }
    public function authorisedUser()
    {
        if (!isset($_SESSION['user_id'])) {
            header('HTTP/1.1 404 The requested URL was not found in this server');
            header('Location: /error?error=404');
        }
    }
}
