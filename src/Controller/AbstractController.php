<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

/**
 * Initialized some Controller common features (Twig...)
 */
abstract class AbstractController
{
    protected Environment $twig;
    protected array $sideMenuIndex = [
        [
            'title' => 'retour à l\'acceuil',
            'link' => '/home'
        ],
        [
            'title' => 'retour à l\'acceuil',
            'link' => '#'
        ],
    ];
    protected $sideMenuAssociation = [
        [
            'title' => 'test',
            'link' => '#'
        ],
        [
            'title' => 'test',
            'link' => '#'
        ],
    ];
    protected $sideMenuMunicipalité = [
        [
            'title' => 'test',
            'link' => '#'
        ],
        [
            'title' => 'test',
            'link' => '#'
        ],
    ];
    protected $sideMenuServicesMunicipaux = [
        [
            'title' => 'test',
            'link' => '#'
        ],
        [
            'title' => 'test',
            'link' => '#'
        ],
    ];


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
    }
}
