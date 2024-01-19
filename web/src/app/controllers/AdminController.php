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

    public function get_header_admin()
    {
        // Récupérer les données
        $menu = $this->apiModel->get_header_admin();

        // Retourner les données
        return $menu;
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
        $menu = $this->get_header_admin();
        $company = $this->get_company();

        // Retourner les données
        return [
            'menu' => $menu,
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

    public function render_admin_products()
    {
        // Récupérer les données du header
        $header_informations = $this->get_header_informations();

        // Récupérer les données du get
        if(count($_GET) > 2 && isset($_GET['slug'])) {
            $slug = strval($_GET['slug']);
            
            $item = $this->apiModel->get_product_by_slug($slug);
        } else {
            $item = null;
        };

        // Récupérer la structure de la base de données
        $structure = $this->apiModel->get_structure("products");

        // Récupérer les enums
        $enum = [];

        foreach ($structure['structure'] as $field) {
            if (strpos($field['Type'], 'enum(') === 0) {
                $enum[$field['Field']] = explode(',', str_replace("'", '', substr($field['Type'], 5, (strlen($field['Type'])-6))));
                
                foreach ($enum[$field['Field']] as $key => $value) {
                    $enum[$field['Field']][$key] = trim($value);
                }
            }
        }

        // Récupérer les 50 derniers produits
        $products = $this->apiModel->get_last_fiveteen_products();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'admin/products',
            [
                'title' => 'Page d\'administration',
                'title_in_page' => 'Bienvenue sur votre dashboard',
                'header_informations' => $header_informations,
                'products' => $products,
                'item' => $item,
                'enum' => $enum
            ]
        );
    }

    public function delete_product($slug)
    {
        // Récupérer les données
        $deletedProduct = $this->apiModel->delete_product($slug);
        
        if($deletedProduct['success']) {
            header('Location: /admin-products?page=delete&success=1');
            exit;
        } else {
            header('Location: /admin-products?page=delete&error=1');
            exit;
        }
    }

    public function enable_product($slug)
    {
        // Récupérer les données
        $enabledProduct = $this->apiModel->enable_product($slug);
        
        if($enabledProduct['success']) {
            header('Location: /admin-products?page=delete&success=1');
            exit;
        } else {
            header('Location: /admin-products?page=delete&error=1');
            exit;
        }
    }

    public function edit_product($slug)
    {
        // Récupérer les données
        print_r($_POST);
        print_r($_FILES);
        // $editedProduct = $this->apiModel->edit_product($slug, $_POST);
        
    }
}
