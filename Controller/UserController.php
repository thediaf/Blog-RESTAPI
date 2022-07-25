<?php
namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CategoryModel;
use App\Model\UserModel;
use App\Service\JwtService;
use stdClass;

require_once('Model/UserModel.php');
require_once('Model/CategoryModel.php');
require_once('Service/JwtService.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

class UserController 
{
    protected $model;
    protected $categoryModel;

    public function __construct()
    {
        $this->model = new UserModel();   
        $this->categoryModel    =   new CategoryModel();
    }

    public function signin()
    {
        if(!empty($_POST['login']) && !empty($_POST['password']))
        {
            $login = htmlspecialchars($_POST['login']);
            
            $password = htmlspecialchars($_POST['password']);
            $response = $this->model->getUser($login);

            if (!$response) {
                header('Content-Type: application/json');

                echo json_encode(array('error' => 'Invalide Utilisateur'));
            }

            if (password_verify($password, $response['password'])) 
            {
		
                $login = $response['login'];

                $headers = array('alg'=>'HS256','typ'=>'JWT');
                $payload = array('login'=>$login, 'exp'=>(time() + 60));

                $jwt = (new JwtService())->generate_jwt($headers, $payload);
                $response = new stdClass();

                $response->token = $jwt;

                header('Content-Type: application/json');
                echo json_encode($response, JSON_PRETTY_PRINT);

            }else {
            # code...

            $categories = $this->categoryModel->getCategories();
            require('View/signin.php'); 
            }
        }else {
            # code...

            $categories = $this->categoryModel->getCategories();
            require('View/signin.php'); 
            }
    }

    public function signup()
    {
        $categories = $this->categoryModel->getCategories();
        require('View/signup.php'); 
    }
}