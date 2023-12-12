<?php
//Configuration du site
$_CONFIG 								= array();
$_CONFIG["site"] 						= array();
$_CONFIG["site"]["nom"] 				= "api.appmain";
$_CONFIG["site"]["url_nom"] 			= $_CONFIG["site"]["nom"] . ".com";
$_CONFIG["site"]["url"] 				= "https://www.".$_CONFIG["site"]["url_nom"]."/";
$_CONFIG["site"]["logo"] 				= "logo.webp";
$_CONFIG["site"]["hebergeur"] 			= "ovh.fr";
$_CONFIG["site"]["debug"]               = true; // Mettre à "false" en production

// Configuration des relatives paths
define('RELATIVE_PATH_PUBLIC',          'public');
define('DS',                            DIRECTORY_SEPARATOR);
define('RELATIVE_PATH_APP',             'app');

// Configuration des relatives paths "app"
define('RELATIVE_PATH_MODELS',          RELATIVE_PATH_APP . DS . 'models');
define('RELATIVE_PATH_ControllerS',     RELATIVE_PATH_APP . DS . 'Controllers');
define('RELATIVE_PATH_ROUTER',          RELATIVE_PATH_APP . DS . 'router');


// Configuration de la connexion à la base de données
if ($_SERVER['SERVER_NAME'] == "192.168.1.250" || $_SERVER['SERVER_NAME'] == "127.0.0.1" || $_SERVER['SERVER_NAME'] == "localhost") {
    return $_CONFIG['db'] =        array(
        'host' =>       'mysql',
        'name' =>       'ressourcerie',
        'user' =>       'root',
        'pass' =>       'password'
    );
} else {
    return $_CONFIG['db'] =        array(
        'host' =>       'mysql',
        'name' =>       'ressourcerie',
        'user' =>       'root',
        'pass' =>       'password'
    );
}