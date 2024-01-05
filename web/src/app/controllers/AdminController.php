<?php

// Inclure les modèles
require_once RELATIVE_PATH_MODELS . '/ApiModel.php';

class AdminController
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

    public function get_categories()
    {
        // Récupérer les données
        $categories = $this->apiModel->get_categories();

        // Retourner les données
        return $categories;
    }

    public function get_subcategories()
    {
        // Récupérer les données
        $subcategories = $this->apiModel->get_subcategories();

        // Retourner les données
        return $subcategories;
    }

    public function get_company()
    {
        // Récupérer les données
        $company = $this->apiModel->get_company();

        // Retourner les données
        return $company;
    }

    public function get_header_informations()
    {
        //Récupérer les données
        $menu = $this->get_header();
        $categories_in_menu = $this->get_categories();
        $subcategories_in_menu = $this->get_subcategories();
        $company = $this->get_company();

        // Retourner les données
        return [
            'menu' => $menu,
            'categories_in_menu' => $categories_in_menu,
            'subcategories_in_menu' => $subcategories_in_menu,
            'company' => $company
        ];
    }

    public function render_admin()
    {
        // Récupérer les données du header
        $header_informations = $this->get_header_informations();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'admin/main',
            [
                'title' => 'Page d\'administration',
                'title_in_page' => 'Bienvenue sur votre dashboard',
                'header_informations' => $header_informations
            ]
        );
    }
}
