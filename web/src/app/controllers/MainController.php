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

    public function render_home()
    {
        // Récupérer les données du header
        $header_informations = $this->get_header_informations();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'home/home',
            [
                'title' => 'Accueil',
                'title_in_page' => 'Accueil',
                'header_informations' => $header_informations
            ]
        );
    }

    public function render_error()
    {
        // Récupérer les données du header
        $header_informations = $this->get_header_informations();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'error/error',
            [
                'title' => 'Page introuvable',
                'title_in_page' => '404',
                'message' => 'Oops, une erreur s\'est produite.',
                'submessage' => 'Désolé, nous ne parvenons pas à trouver votre page.',
                'header_informations' => $header_informations
            ]
        );
    }

    public function render_login()
    {
        // Récupérer les données du header
        $header_informations = $this->get_header_informations();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'account/login',
            [
                'title' => 'Connexion',
                'title_in_page' => 'Connexion',
                'header_informations' => $header_informations
            ]
        );
    }

    public function login()
    {
        
        // Logique de connexion
    }

    public function render_register()
    {
        // Récupérer les données du header
        $header_informations = $this->get_header_informations();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'account/register',
            [
                'title' => 'Inscription',
                'title_in_page' => 'Inscription',
                'header_informations' => $header_informations
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
        // Récupérer les données du header
        $header_informations = $this->get_header_informations();

        // Récupérer les données de l'utilisateur
        $user = $this->apiModel->get_user($user_id);

        // Inclure la vue correspondante
        echo $this->pages->render(
            'user/user',
            [
                'title' => 'Page de profil',
                'title_in_page' => 'Page de profil',
                'header_informations' => $header_informations,
                'user' => $user
            ]
        );
    }

    public function render_products()
    {
        // Récupérer les données du header
        $header_informations = $this->get_header_informations();

        // Récupérer les données produits
        $products = $this->apiModel->get_products();

        // Transformer la chaîne de caractere en tableau
        foreach($products as $key => $product) {
            if(isset($product['photos'])) {
                $products[$key]['photos'] = json_decode($product['photos'], true);
            } else {
                $products[$key]['photos'] = [];
            }
        }

        // Inclure la vue correspondante
        echo $this->pages->render(
            'product/products',
            [
                'title' => 'Nos produits',
                'title_in_page' => 'Nos produits',
                'header_informations' => $header_informations,
                'products' => $products,
            ]
        );
    }

    public function render_products_by_category($slug)
    {
        // Récupérer les données du header
        $header_informations = $this->get_header_informations();

        // Récupérer la catégorie courante
        $current_category = $this->apiModel->get_categorie_by_slug($slug);
        
        // Récupérer les données produits
        $products = $this->apiModel->get_products_by_category($current_category['id']);

        // Inclure la vue correspondante
        echo $this->pages->render(
            'product/product_category',
            [
                'title' => 'Nos produits',
                'title_in_page' => 'Nos produits',
                'header_informations' => $header_informations,
                'products' => $products,
            ]
        );
    }

    public function render_product($slug)
    {
        // Récupérer les données du header
        $header_informations = $this->get_header_informations();

        // Récupérer les données produits
        $product = $this->apiModel->get_product_by_slug($slug);

        // Si le produit n'existe plus ou qu'il n'est pas activé, on redirige vers la page d'article introuvable
        if(empty($product)) {
            echo $this->pages->render(
                'product/error',
                [
                    'title' => 'Article introuvable',
                    'title_in_page' => 'Article introuvable',
                    'message' => 'Il semblerait que cet article n\'existe plus.',
                    'submessage' => 'Désolé, nous ne parvenons pas à trouver votre article.',
                    'header_informations' => $header_informations
                ]
            );
            exit;
        } else {
            if (isset($product[0]['photos'])) {
            	$product = $product[0];
                $product['photos'] = json_decode($product['photos'], true);
            } else {
                $product['photos'] = [];
            }
        };


        // Traduire les données
        $translates = [
            "id" => "id",
            "title" => "titre",
            "height" => "hauteur",
            "width" => "largeur",
            "depth" => "profondeur",
            "brand" => "marque",
            "reference" => "référence",
            "material" => "matière",
            "assembly" => "montage",
            "code_article" => "code article",
            "trust" => "indice de confiance",
            "quantity" => "quantité",
            "description" => "description",
            "caption" => "légende",
            "price_new" => "prix neuf",
            "price_unite" => "prix unitaire",
            "unite" => "unité",
            "packaging" => "conditionnement",
            "state" => "état",
            "slug" => "slug",
            "photos" => "photos",
            "category_id" => "id catégorie",
            "storage_location" => "emplacement de stockage",
            "location_id" => "id emplacement",
            "available" => "disponible",
            "availability_date" => "date de disponibilité",
            "active" => "actif",
            "booked" => "réservé",
            "created_at" => "créé le",
            "sold" => "vendu",
            "sold_at" => "vendu le",
        ];

        // Récupérer les données des catégories
        $categorie = $this->apiModel->get_categorie_by_id($product['category_id']);

        // Récupérer les informations du chantier
        if ($product['storage_location'] == "chantier") {
            $location = $this->apiModel->get_chantier_by_id($product['location_id']);
        } else {
            $location = $this->apiModel->get_company_address();
        }

        // Inclure la vue correspondante
        echo $this->pages->render(
            'product/product',
            [
                'title' => 'Nos produits',
                'title_in_page' => 'Nos produits',
                'header_informations' => $header_informations,
                'product' => $product,
                'translates' => $translates,
                'categorie' => $categorie,
                'location' => $location
            ]
        );
    }
}
