<?php
// Inclure l'autoloader
require_once 'vendor/autoload.php';

// Inclure les fichiers nécessaires
require_once 'lib/config.php';
require_once 'bin/preprocess.php';

// charger le router
require_once 'app/router/Router.php';

// charger les routes
$routes = require 'app/router/Route.php';

// charger les Controllers
require_once 'app/Controllers/MainController.php';
require_once 'app/Controllers/AdminController.php';

// charger les models
$router = new Router($_GET['url']);
$MainController = new MainController();
$AdminController = new AdminController();

// Tester le mode debug
if ($_CONFIG["site"]["debug"] === true) {
    // On active les erreurs PHP
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Importation des routes
require_once 'app/router/routes.php';
?>