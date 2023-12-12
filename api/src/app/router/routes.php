<?php
// Routes de l'application

// Route pour afficher les pages du site
//$router->method('url', [$MainController, 'method_name'], $requireAuth=false, $composedUrl = false);
$router->get('/get_header', [$ApiController, 'get_header']);

$router->get('/user/:id', [$ApiController, 'get_user'])->with('id', '[0-9]+');

$router->run();