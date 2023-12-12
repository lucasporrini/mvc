<?php

// Inclure les modèles
require_once RELATIVE_PATH_MODELS . '/ApiModel.php';

class MainController
{
    private $pages;
    private $apiModel;

    public function __construct() {
        $this->pages = new League\Plates\Engine(RELATIVE_PATH_VIEWS);
        $this->apiModel = new ApiModel();
    }

    public function get_header()
    {
        // Récupérer les données
        $menu = $this->apiModel->get_header();

        // Retourner les données
        return $menu;
    }
    
    public function render_home()
    {
        // Récupérer les données du menu dans le header
        $menu = $this->get_header();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'home/home',
            [
                'title' => 'Accueil',
                'title_in_page' => 'Accueil',
                'menu' => $menu
            ]
        );
    }

    public function render_error()
    {
        // Récupérer les données du menu dans le header
        $menu = $this->get_header();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'error/error',
            [
                'title' => 'Page introuvable',
                'title_in_page' => '404',
                'message' => 'Oops, une erreur s\'est produite.',
                'submessage' => 'Désolé, nous ne parvenons pas à trouver votre page.',
                'menu' => $menu
            ]
        );
    }

    public function render_login()
    {
        // Récupérer les données du menu dans le header
        $menu = $this->get_header();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'account/login',
            [
                'title' => 'Connexion',
                'title_in_page' => 'Connexion',
                'menu' => $menu
            ]
        );
    }

    public function login()
    {
        
        // Logique de connexion
    }

    public function render_register()
    {
        // Récupérer les données du menu dans le header
        $menu = $this->get_header();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'account/register',
            [
                'title' => 'Inscription',
                'title_in_page' => 'Inscription',
                'menu' => $menu
            ]
        );
    }

    public function render_cookies_policy()
    {
        // Récupérer les données du menu dans le header
        $menu = $this->get_header();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'legal/cookies_policy',
            [
                'title' => 'Politique de cookies',
                'title_in_page' => 'Politique de cookies',
                'menu' => $menu
            ]
        );
    }

    public function render_user($user_id)
    {
        // Récupérer les données du menu dans le header
        $menu = $this->get_header();

        // Récupérer les données de l'utilisateur
        $user = $this->apiModel->get_user($user_id);

        // Inclure la vue correspondante
        echo $this->pages->render(
            'user/user',
            [
                'title' => 'Page de profil',
                'title_in_page' => 'Page de profil',
                'menu' => $menu,
                'user' => $user
            ]
        );
    }

    public function render_products()
    {
        // Récupérer les données du menu dans le header
        $menu = $this->get_header();

        // Récupérer les données produits
        $products = $this->apiModel->get_products();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'product/products',
            [
                'title' => 'Nos produits',
                'title_in_page' => 'Nos produits',
                'menu' => $menu
            ]
        );
    }

    public function render_product()
    {

    }
}
