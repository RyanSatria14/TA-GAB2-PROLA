<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Server.php";

require APPPATH . 'libraries/JWT.php';
require APPPATH . 'libraries/ExpiredException.php';
require APPPATH . 'libraries/BeforeValidException.php';
require APPPATH . 'libraries/SignatureInvalidException.php';
require APPPATH . 'libraries/JWK.php';

use \Firebase\JWT\JWT;

class Token extends Server
{
    function config_token()
    {
        $config['exp'] = 400; //detik
        $config['key'] = 'key-jwt';
        return $config;
    }

    public function token_login(){        
        $authHeader = $this->input->request_headers()['Authorization'];  
        $arr = explode(" ", $authHeader); 
        $token = $arr[1];        
        if ($token){
            try{
                $decoded = JWT::decode($token, $this->config_token()['key'], array('HS256'));          
                if ($decoded){
                    return 1;
                }
            } catch (\Exception $e) {                
                return 0;
                
            }
        }       
    }

}