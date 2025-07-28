<?php
namespace App\core;
use App\controller\CompteController;
use App\controller\SecurityController;
use App\controller\TransactionController;

return $routes = [ 
    '/' => [
        'controller' => SecurityController::class,
        'action' => "create",
        'middlewares' => []
    ],
    '/login' => [
        'controller' => SecurityController::class,
        'action' => "login",
        'middlewares' => []
    ],
    '/inscription' => [
        'controller' => SecurityController::class,
        'action' => "inscription",
        'middlewares' => []
    ],
    '/compte' => [
        'controller' => CompteController::class,
        'action' => "create",
        'middlewares' => []
    ],
    '/deconnexion' => [
        'controller' => SecurityController::class,
        'action' => "destroy",
        'middlewares' => []
    ],
    '/transaction' => [
        'controller' => CompteController::class,
        'action' => "show",
        'middlewares' => []
    ],
    '/paiement' => [
        'controller' => TransactionController::class,
        'action' => "create",
        'middlewares' => []
    ],
    '/paiement/woyofal' => [
        'controller' => TransactionController::class,
        'action' => "show",
        'middlewares' => []
    ],
    '/paiement/woyofal/achat' => [
        'controller' => TransactionController::class,
        'action' => "achatWoyofal",
        'middlewares' => []
    ]
];
