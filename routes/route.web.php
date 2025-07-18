<?php
namespace App\core;
use App\controller\CompteController;
use App\controller\SecurityController;
return $routes=[ 
    '/' =>['controller'=>SecurityController::class,
           'action'=>"create",
           'middlewares'=>[]
        ],
    '/login' =>['controller'=>SecurityController::class,
    'action'=>"login",
    'middlewares'=>[]
    ],
    '/inscription' =>['controller'=>SecurityController::class,
    'action'=>"show",
    'middlewares'=>[]
     ],
    '/compte' =>['controller'=>CompteController::class,
    'action'=>"create",
    'middlewares'=>[]
    ],
    '/deconnexion' =>['controller'=>SecurityController::class,
    'action'=>"destroy",
    'middlewares'=>[]
    ]

];
