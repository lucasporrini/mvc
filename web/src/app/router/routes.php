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
$router->get('/categorie/:name', [$MainController, 'render_products_by_category'])->with('name', '[a-z\-0-9]+');

$router->get('/a-propos', [$MainController, 'render_about']);

$router->get('/user/:id', [$MainController, 'render_user'])->with('id', '[0-9]+');

// Politique de confidentialité
$router->get('/politique-de-confidentialite', [$MainController, 'render_privacy_policy']);
$router->get('/cookies-policy', [$MainController, 'render_cookies_policy']);

// Route pour l'administration
$router->get('/admin', [$AdminController, 'render_admin'], $requireAuth=true);
$router->get('/admin-products', [$AdminController, 'render_admin_products'], $requireAuth=true);

// Route pour l'administration des produits
$router->get('/delete-product/:slug', [$AdminController, 'delete_product'], $requireAuth=true);
$router->get('/enable-product/:slug', [$AdminController, 'enable_product'], $requireAuth=true);

// Route pour l'administration (ajax)
$router->post('/edit-product/:slug', [$AdminController, 'edit_product'], $requireAuth=true);

// Gestion de la 404
$router->get('/404', [$MainController, 'render_error']);

$router->run();