<?php
// Routes de l'application

// Route pour afficher les pages du site
//$router->method('url', [$MainController, 'method_name'], $requireAuth=false, $composedUrl = false);
$router->get('/get_header', [$ApiController, 'get_header']);

$router->get('/user/:id', [$ApiController, 'get_user'])->with('id', '[0-9]+');
$router->get('/products', [$ApiController, 'get_products']);
$router->get('/product/:slug', [$ApiController, 'get_product'])->with('slug', '[a-z\-0-9]+');

$router->run();