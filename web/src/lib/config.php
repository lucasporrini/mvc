<?php
//Configuration du site
$_CONFIG 								= array();
$_CONFIG["site"] 						= array();
$_CONFIG["site"]["nom"] 				= "localhost:8080";
$_CONFIG["site"]["url_nom"] 			= "localhost:8080";
$_CONFIG["site"]["url"] 				= "https://www.".$_CONFIG["site"]["url_nom"]."/";
$_CONFIG["site"]["logo"] 				= "logo.webp";
$_CONFIG["site"]["hebergeur"] 			= "ovh.fr";
$_CONFIG["site"]["debug"]               = true; // Mettre à "false" en production
define('BASE_URL',                      "http://localhost:8080/");

// Configuration des relatives paths
define('RELATIVE_PATH_PUBLIC',          'public');
define('DS',                            DIRECTORY_SEPARATOR);
define('RELATIVE_PATH_APP',             'app');

// Configuration des relatives paths "app"
define('RELATIVE_PATH_VIEWS',           RELATIVE_PATH_APP . DS . 'views');
define('RELATIVE_PATH_MODELS',          RELATIVE_PATH_APP . DS . 'models');
define('RELATIVE_PATH_ControllerS',     RELATIVE_PATH_APP . DS . 'Controllers');
define('RELATIVE_PATH_ROUTER',          RELATIVE_PATH_APP . DS . 'router');
define('RELATIVE_PATH_TEMPLATE',        RELATIVE_PATH_APP . DS . 'template');

// Configuration des relatives paths "assets"
define('RELATIVE_PATH_ASSETS',          RELATIVE_PATH_PUBLIC . DS . 'assets');
define('RELATIVE_PATH_CSS',             RELATIVE_PATH_ASSETS . DS . 'css');
define('RELATIVE_PATH_JS',              RELATIVE_PATH_ASSETS . DS . 'js');
define('RELATIVE_PATH_IMG',             RELATIVE_PATH_ASSETS . DS . 'img');
define('RELATIVE_PATH_FONTS',           RELATIVE_PATH_ASSETS . DS . 'fonts');
define('RELATIVE_PATH_UPLOADS',         RELATIVE_PATH_ASSETS . DS . 'uploads');

// Configuration des relatives paths "partials"
define('RELATIVE_PATH_PARTIALS',        RELATIVE_PATH_PUBLIC . DS . 'partials');

// Configuration des relatives paths "functions"
define('RELATIVE_PATH_FUNCTIONS',       RELATIVE_PATH_PUBLIC . DS . 'functions');

// Importer valeurs du .env
if(!file_exists('.env')) {
    return;
}

$lines = file('.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line) {
    if(strpos(trim($line), '#') === 0) {
        continue;
    }

    list($name, $value) = explode('=', $line, 2);
    $name = trim($name);
    $value = trim($value);

    if(!array_key_exists($name, $_ENV)) {
        putenv(sprintf('%s=%s', $name, $value));
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
};