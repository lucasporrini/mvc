<?php

require_once 'lib/config.php';
require_once 'Database.php';

class ApiModel
{
    private $db;
    
    public function __construct()
    {
        global $_CONFIG;
        $this->db = new Database($_CONFIG);
    }

    public function verify_token($token)
    {
        return $this->db->simpleSelect('*', 'token', ['value' => $token]);
    }

    public function middleware_auth($token)
    {
        // On vérifie que le token existe
        if(!isset($token)) {
            http_response_code(401);
            echo json_encode(['error' => 'Vous devez être connecté pour accéder à cette page']);
            return false;
        }

        // On vérifie que le token est bien un bearer token
        if(isset($token)) {
            $pattern = '/Bearer\s(\S+)/';

            if(preg_match($pattern, $token, $matches)) {
                $token = $matches[1];
            } else {
                http_response_code(401);
                echo json_encode(['error' => 'L\'authentification a échoué']);
                return false;
            }
        }

        // On vérifie que le token est valide
        $token_in_db = $this->verify_token($token);
        if(!$token_in_db) {
            http_response_code(401);
            echo json_encode(['error' => 'Le token n\'est pas renseigné ou n\'est pas valide']);
            return false;
        }
        
        if($token_in_db['value'] !== $token) {
            http_response_code(401);
            echo json_encode(['error' => 'L\'authentification a échoué']);
            return false;
        }
        
        return true;
    }

    public function authenticate_user($email, $password)
    {
        $user = $this->db->simpleSelect('*', 'users', ['email' => $email]);
        
        if ($user && password_verify($password, $user['password'])) {
            $user['logged_in'] = true;
            return $user; // L'utilisateur est authentifié avec succès
        } else {
            return false; // Échec de l'authentification
        }
    }
    
    public function get_menu()
    {
        return $this->db->select('*', 'menus', ['admin' => 0, 'active' => 1]);
    }

    public function get_menu_admin()
    {
        return $this->db->select('*', 'menus', ['admin' => 1, 'active' => 1]);
    }

    public function get_user($user_id)
    {
        return $this->db->simpleSelect('id, email', 'users', ['id' => $user_id]);
    }

    public function get_products()
    {
        return $this->db->select('*', 'products');
    }

    public function get_products_with_conditions($conditions, $limit = null)
    {
        return $this->db->select('*', 'products', $conditions, $limit);
    }

    public function get_products_by_category($cat_id)
    {
        return $this->db->select('*', 'products', ['category_id' => $cat_id]);
    }

    public function get_last_fiveteen_products()
    {
        return $this->db->select('*', 'products', [], 50);
    }

    public function get_company()
    {
        return $this->db->select('*', 'company');
    }

    public function get_categories()
    {
        return $this->db->select('*', 'categories');
    }

    public function get_categorie_by_id($id)
    {
        return $this->db->simpleSelect('*', 'categories', ['id' => $id]);
    }

    public function get_categorie_by_slug($slug)
    {
        return $this->db->simpleSelect('*', 'categories', ['slug' => $slug]);
    }

    public function get_subcategories()
    {
        return $this->db->select('*', 'subcategories');
    
    }

    public function get_location_by_id($id)
    {
        return $this->db->simpleSelect('*', 'locations', ['id' => $id]);
    }

    public function delete_product($slug)
    {
        return $this->db->update('products', ['active' => 0], ['slug' => $slug]);
    }
}