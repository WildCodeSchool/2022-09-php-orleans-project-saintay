<?php

namespace App\Controller;

class CityMapController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('CityMap/city_map.html.twig');
    }
}
