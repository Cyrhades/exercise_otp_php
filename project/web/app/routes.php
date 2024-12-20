<?php

return function(\FastRoute\RouteCollector $router) {
  
    // Page d'accueil
    $router->get('/', 'App\Controller\HomeController::get');
 
    $router->get('/signup', 'App\Controller\SignUpController::get');
    $router->post('/signup', 'App\Controller\SignUpController::post');

    $router->get('/signin', 'App\Controller\SignInController::get');
    $router->post('/signin', 'App\Controller\SignInController::post');

    $router->get('/profile', 'App\Controller\ProfileController::get');

    $router->get('/disconnect', 'App\Controller\DisconnectController::get');
    
};
