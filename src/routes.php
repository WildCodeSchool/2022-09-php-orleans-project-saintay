<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'toutes-les-actus' => ['HomeController', 'displayAllActualities'],
    'services-municipaux' => ['MunicipalServiceController', 'index',],
    'municipalService' => ['MunicipaliteTeamController', 'showCommunal',],
    'contact' => ['ContactController', 'index'],
    'histoire' => ['HistoryController', 'index'],
    'reunions-et-arretes' => ['ReportController', 'displayAllReports'],
    'connexion' => ['LoginController', 'login'],
    'plan-ville' => ['CityMapController','index'],
    'deconnexion' => ['LoginController', 'logout'],
    'admin' => ['AdminController', 'index'],
    'admin/mot-du-maire' => ['AdminWordMayorController', 'index'],
    'admin/mot-du-maire/edition' => ['AdminWordMayorController', 'edit', ['id']],
    'admin/mot-du-maire/supprimer' => ['AdminWordMayorController', 'deleteWord'],
    'admin/actualite' => ['AdminActualityController', 'index'],
    'admin/actualite/ajouter' => ['AdminActualityController', 'add'],
    'admin/actualite/modifier' => ['AdminActualityController', 'edit', ['id']],
    'admin/actualite/supprimer' => ['AdminActualityController', 'delete'],
    'admin/documents' => ['AdminReportController', 'index'],
    'urbanisme' => ['UrbanismController', 'index'],
    'municipalite' => ['MunicipaliteTeamController', 'index',],
    'admin/municipalite' => ['AdminMunicipaliteTeamController', 'index',],
    'admin/municipalite/ajouter' => ['AdminMunicipaliteTeamController', 'add'],
    'vie-associative' => ['AssociationController', 'home'],
    'vie-associative/annuaire-association' => ['AssociationController', 'filterByCategory'],
    'vie-associative/annuaire-association/filtre' => ['AssociationController', 'filterByCategory', ['categorie']],
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
];
