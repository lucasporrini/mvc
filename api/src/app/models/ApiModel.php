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
    
    public function get_menu()
    {
        return $this->db->select('*', 'menus');
    }

    public function get_user($user_id)
    {
        return $this->db->simpleSelect('id, email', 'users', ['id' => $user_id]);
    }
}