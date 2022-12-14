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
    'municipalite/equipe-communale' => ['MunicipaliteTeamController', 'showCommunalTeam',],
    'contact' => ['ContactController', 'index'],
    'mentions-legales' => ['HomeController', 'LegalNotice'],
    'histoire' => ['HistoryController', 'index'],
    'reunions-et-arretes' => ['ReportController', 'displayAllReports'],
    'connexion' => ['LoginController', 'login'],
    'plan-ville' => ['CityMapController', 'index'],
    'deconnexion' => ['LoginController', 'logout'],
    'admin' => ['AdminController', 'index'],
    'admin/mot-du-maire' => ['AdminWordMayorController', 'index'],
    'admin/mot-du-maire/edition' => ['AdminWordMayorController', 'edit', ['id']],
    'admin/horaires' => ['AdminScheduleController', 'indexAdmin'],
    'admin/horaires/modifier' => ['AdminScheduleController', 'edit', ['id']],
    'admin/contact-information-modifier' => ['AdminContactInfoController', 'edit', ['id']],
    'admin/actualite' => ['AdminActualityController', 'index'],
    'admin/actualite/ajouter' => ['AdminActualityController', 'add'],
    'admin/actualite/modifier' => ['AdminActualityController', 'edit', ['id']],
    'admin/actualite/supprimer' => ['AdminActualityController', 'delete'],
    'admin/documents' => ['AdminReportController', 'index'],
    'admin/documents/ajouter' => ['AdminReportController', 'add'],
    'admin/documents/modifier' => ['AdminReportController', 'edit', ['id']],
    'admin/documents/supprimer' => ['AdminReportController', 'delete'],
    'urbanisme' => ['UrbanismController', 'index'],
    'municipalite' => ['MunicipaliteTeamController', 'home',],
    'municipalite/equipe-municipale' => ['MunicipaliteTeamController', 'index',],
    'admin/municipalite' => ['AdminMunicipaliteTeamController', 'index',],
    'admin/municipalite/ajouter' => ['AdminMunicipaliteTeamController', 'add'],
    'admin/municipalite/delete' => ['AdminMunicipaliteTeamController', 'delete'],
    'admin/municipalite/modifier' => ['AdminMunicipaliteTeamController', 'edit', ['id']],
    'admin/equipe-communale' => ['AdminMunicipaliteTeamController', 'showAllCommunalTeam'],
    'admin/equipe-communale/ajouter' => ['AdminMunicipaliteTeamController', 'addCommunalAdgent'],
    'admin/equipe-communale/modifer' => ['AdminMunicipaliteTeamController', 'editCommunalAgent', ['agent']],
    'admin/equipe-communale/delete' => ['AdminMunicipaliteTeamController', 'deleteAgent'],
    'vie-associative' => ['AssociationController', 'home'],
    'admin/association/modifier' => ['AssociationController', 'edit', ['id']],
    'admin/association/ajouter' => ['AssociationController', 'add'],
    'admin/association' => ['AssociationController', 'index'],
    'admin/association/supprimer' => ['AssociationController', 'delete'],
    'vie-associative/annuaire-association' => ['AssociationController', 'filterByCategory'],
    'vie-associative/annuaire-association/filtre' => ['AssociationController', 'filterByCategory', ['categorie']],
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    'error' => ['LoginController', 'error', ['error']]
];
