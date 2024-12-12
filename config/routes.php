<?php 

const ROUTES = [
    '/' => [
        'controller' => App\Controller\PagesController::class,
        'method' => 'home'        
    ],

    'flats/new' => [
        'controller' => App\Controller\FlatController::class,
        'method' => 'new'
    ],

    'flats/create' => [
        'controller' => App\Controller\FlatController::class,
        'method' => 'create'
    ],

];

?>