<?php
class ApiModel
{
    private $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = "http://api:80/";
    }

    public function api_call($url_slug, $token)
    {
        // Construction de l'url d'appel
        $url = $this->apiBaseUrl . $url_slug;

        // Initialisation de la session
        $curl = curl_init($url);

        // Configuration des options de transfert
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,[
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ]);

        // Exécuter la requête
        $response = curl_exec($curl);

        // Fermer la session
        curl_close($curl);

        // Retourner les données
        return $response;
    }

    public function get_header()
    {
        // Récupérer les données
        $menu = $this->api_call('/get_header', '');

        $json = json_decode($menu, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur interne']);
            exit;
        }

        // Retourner les données
        return $json;
    }

    public function login($email, $password)
    {
        // Construction de l'url d'appel
        $url = $this->apiBaseUrl . 'login';

        // Initialisation des données
        $data = json_encode([
            'email' => $email,
            'password' => $password
        ]);

        // Initialisation de la session
        $curl = curl_init($url);

        // Configuration des options de transfert
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER,[
            'Content-Type: application/json',
            'Authorization: Bearer ' . getenv('token')
        ]);

        // Exécuter la requête
        $response = curl_exec($curl);

        // Fermer la session
        curl_close($curl);

        // Retourner les données
        return $response;

        // Vérifier si l'utilisateur existe
        $json = json_decode($user, JSON_UNESCAPED_UNICODE);
    }

    public function get_user($user_id)
    {
        // Récupérer les données
        $user = $this->api_call('/user/' . $user_id, getenv('token'));

        // Vérifier si l'utilisateur existe
        $json = json_decode($user, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur interne']);
            exit;
        }

        // Retourner les données
        return $json;
    }

    public function get_products()
    {
        // Récupérer les données
        $products = $this->api_call('/products', getenv('token'));

        // Vérifier si les produits existent
        $json = json_decode($products, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur interne']);
            exit;
        }

        // Retourner les données
        return $json;
    }

    public function get_product_by_slug($slug)
    {
        // Récupérer les données
        $product = $this->api_call('/product/' . $slug, getenv('token'));

        // Vérifier si le produit existe
        $json = json_decode($product, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur interne']);
            exit;
        }

        // Retourner les données
        return $json;
    }

    public function get_products_by_category($cat_id)
    {
        // Récupérer les données
        $products = $this->api_call('/products/' . $cat_id, getenv('token'));

        // Vérifier si les produits existent
        $json = json_decode($products, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur interne']);
        }

        // Retourner les données
        return $json;
    }

    public function get_company()
    {
        // Récupérer les données
        $company = $this->api_call('/company', getenv('token'));

        // Vérifier si la société existe
        $json = json_decode($company, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur interne']);
            exit;
        }

        // Retourner les données
        return $json;
    }

    public function get_categories()
    {
        // Récupérer les données
        $categories = $this->api_call('/categories', getenv('token'));

        // Vérifier si les catégories existent
        $json = json_decode($categories, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur interne']);
            exit;
        }

        // Retourner les données
        return $json;
    }

    public function get_categorie_by_id($id)
    {
        // Récupérer les données
        $categorie = $this->api_call('/categorie/' .$id, getenv('token'));

        // Vérifier si les catégories existent
        $json = json_decode($categorie, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur interne']);
            exit;
        }

        // Retourner les données
        return $json;
    }

    public function get_categorie_by_slug($slug)
    {
        // Récupérer les données
        $categorie = $this->api_call('/categorie/' .$slug, getenv('token'));

        // Vérifier si les catégories existent
        $json = json_decode($categorie, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur interne']);
        }

        // Retourner les données
        return $json;
    }

    public function get_subcategories()
    {
        // Récupérer les données
        $subcategories = $this->api_call('/subcategories', getenv('token'));

        // Vérifier si les catégories existent
        $json = json_decode($subcategories, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur interne']);
        }

        // Retourner les données
        return $json;
    }

    public function get_chantier_by_id($id)
    {
        // Récupérer les données
        $chantier = $this->api_call('/chantier/' .$id, getenv('token'));

        // Vérifier si les chantiers existent
        $json = json_decode($chantier, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur interne']);
            exit;
        }

        // Retourner les données
        return $json;
    }

    public function get_company_address()
    {
        // Récupérer les données
        $address = $this->api_call('/address', getenv('token'));

        // Vérifier si la société existe
        $json = json_decode($address, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur interne']);
            exit;
        }
        
        // Retourner les données
        return $json;
    }
}