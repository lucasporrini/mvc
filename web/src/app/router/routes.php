<?php
// Routes de l'application

// Route pour afficher les pages du site
//$router->method('url', [$MainController, 'method_name'], $requireAuth=false, $composedUrl = false);
$router->get('/', [$MainController, 'render_home']);

$router->get('/login', [$MainController, 'render_login']);
$router->post('/login', [$MainController, 'login']);

$router->get('/register', [$MainController, 'render_register']);
$router->post('/register', [$MainController, 'register']);

$router->get('/logout', [$MainController, 'logout']);

// Route pour afficher les pages du site
$router->get('/products', [$MainController, 'render_products']);
$router->get('/product/:slug', [$MainController, 'render_product'])->with('slug', '[a-z\-0-9]+');
$router->get('/user/:id', [$MainController, 'render_user'])->with('id', '[0-9]+');

// Politique de confidentialité
$router->get('/politique-de-confidentialite', [$MainController, 'render_privacy_policy']);
$router->get('/cookies-policy', [$MainController, 'render_cookies_policy']);

// Gestion de la 404
$router->get('/404', [$MainController, 'render_error']);

$router->run();