<?php

// Inclure les modèles
require_once RELATIVE_PATH_MODELS . '/ApiModel.php';

class ApiController
{
    private $apiModel;

    public function __construct() {
        $this->apiModel = new ApiModel();
    }

    public function get_header()
    {
        // Récupérer les données
        $menu = $this->apiModel->get_menu();

        // Tri des données
        usort($menu, function ($a, $b) {
            return $a['priority'] <=> $b['priority'];
        });

        // Retourner les données en json
        header('Content-Type: application/json');
        echo json_encode($menu, JSON_UNESCAPED_UNICODE);
    }

    public function login()
    {
        // On récupère le token dans le header
        $headers = apache_request_headers();
        $token = $headers['Authorization'];

        if($this->apiModel->middleware_auth($token)) {
            // Récupérer les données
            $data = json_decode(file_get_contents('php://input'), true);

            $email = $data['email'];
            $password = $data['password'];

            if(!$email || !$password) {
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Veuillez renseigner tous les champs']);
                exit;
            }

            $user = $this->apiModel->authenticate_user($email, $password);
            
            if($user) {
                echo json_encode(['success' => 'Vous êtes connecté', 'user' => $user]);
            } else {
                echo json_encode(['error' => 'L\'authentification a échoué']);
            }
        }
    }

    public function get_user($user_id)
    {
        // On récupère le token dans le header
        $headers = apache_request_headers();
        $token = $headers['Authorization'];

        if($this->apiModel->middleware_auth($token)) {
            // Récupérer les données
            $user = $this->apiModel->get_user($user_id);

            // Retourner les données en json
            header('Content-Type: application/json');
            echo json_encode($user, JSON_UNESCAPED_UNICODE);
        }
    }

    public function get_products()
    {
        // On récupère le token dans le header
        $headers = apache_request_headers();
        $token = $headers['Authorization'];

        if($this->apiModel->middleware_auth($token)) {
            // Récupérer les données
            $products = $this->apiModel->get_products_with_conditions(['available' => 1, 'active' => 1, 'booked' => 0, 'sold' => 0]);

            // Si la liste des produits est inférieur à 36
            if(count($products) < 36) {
                // On change les conditions
                $products = $this->apiModel->get_products_with_conditions(['available' => 1, 'active' => 1, 'booked' => 1, 'sold' => 0]);

                if(count($products) < 36) {
                    $products = $this->apiModel->get_products();
                }
            }

            // Retourner les données en json
            header('Content-Type: application/json');
            echo json_encode($products, JSON_UNESCAPED_UNICODE);
        }
    }

    public function get_product($slug)
    {
        // On récupère le token dans le header
        $headers = apache_request_headers();
        $token = $headers['Authorization'];

        if($this->apiModel->middleware_auth($token)) {
            // Récupérer les données
            $product = $this->apiModel->get_products_with_conditions(['slug' => $slug]);

            // Retourner les données en json
            header('Content-Type: application/json');
            echo json_encode($product, JSON_UNESCAPED_UNICODE);
        }
    }

    public function get_products_by_category($cat_id)
    {
        // On récupère le token dans le header
        $headers = apache_request_headers();
        $token = $headers['Authorization'];
        
        if($this->apiModel->middleware_auth($token)) {
            // Récupérer les données
            $products = $this->apiModel->get_products_by_category($cat_id);

            // Retourner les données en json
            header('Content-Type: application/json');
            echo json_encode($products, JSON_UNESCAPED_UNICODE);
        }
    }

    public function get_company()
    {
        // On récupère le token dans le header
        $headers = apache_request_headers();
        $token = $headers['Authorization'];

        if($this->apiModel->middleware_auth($token)) {
            // Récupérer les données
            $company = $this->apiModel->get_company();

            // Retourner les données en json
            header('Content-Type: application/json');
            echo json_encode($company, JSON_UNESCAPED_UNICODE);
        }
    }

    public function get_categories()
    {
        // On récupère le token dans le header
        $headers = apache_request_headers();
        $token = $headers['Authorization'];

        if($this->apiModel->middleware_auth($token)) {
            // Récupérer les données
            $categories = $this->apiModel->get_categories();

            // Retourner les données en json
            header('Content-Type: application/json');
            echo json_encode($categories, JSON_UNESCAPED_UNICODE);
        }
    }

    public function get_categorie_by_id($id)
    {
        // On récupère le token dans le header
        $headers = apache_request_headers();
        $token = $headers['Authorization'];

        if($this->apiModel->middleware_auth($token)) {
            // Récupérer les données
            $categories = $this->apiModel->get_categorie_by_id($id);

            // Retourner les données en json
            header('Content-Type: application/json');
            echo json_encode($categories, JSON_UNESCAPED_UNICODE);
        }
    }

    public function get_categorie_by_slug($slug)
    {
        // On récupère le token dans le header
        $headers = apache_request_headers();
        $token = $headers['Authorization'];

        if($this->apiModel->middleware_auth($token)) {
            // Récupérer les données
            $categories = $this->apiModel->get_categorie_by_slug($slug);

            // Retourner les données en json
            header('Content-Type: application/json');
            echo json_encode($categories, JSON_UNESCAPED_UNICODE);
        }
    }

    public function get_subcategories()
    {
        // On récupère le token dans le header
        $headers = apache_request_headers();
        $token = $headers['Authorization'];

        if($this->apiModel->middleware_auth($token)) {
            // Récupérer les données
            $categories = $this->apiModel->get_subcategories();

            // Retourner les données en json
            header('Content-Type: application/json');
            echo json_encode($categories, JSON_UNESCAPED_UNICODE);
        }
    }

    public function get_location_by_id($id)
    {
        // On récupère le token dans le header
        $headers = apache_request_headers();
        $token = $headers['Authorization'];

        if($this->apiModel->middleware_auth($token)) {
            // Récupérer les données
            $location = $this->apiModel->get_location_by_id($id);

            // Retourner les données en json
            header('Content-Type: application/json');
            echo json_encode($location, JSON_UNESCAPED_UNICODE);
        }
    }

    public function get_company_address()
    {
        // On récupère le token dans le header
        $headers = apache_request_headers();
        $token = $headers['Authorization'];

        if($this->apiModel->middleware_auth($token)) {
            // Récupérer les données
            $company = $this->apiModel->get_company();

            // Récupérer l'adresse de la société
            foreach($company as $object) {
                if($object['parameter'] === 'address') {
                    $company_address = $object['value'];
                }
            };

            // Retourner les données en json
            header('Content-Type: application/json');
            echo json_encode($company_address, JSON_UNESCAPED_UNICODE);
        }
    }
}
