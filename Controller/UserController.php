<?php
namespace App\Controller;

use App\Entity\User;
use App\Model\ArticleModel;
use App\Model\CategoryModel;
use App\Model\UserModel;
use App\Service\JwtService;
use stdClass;

require_once('Entity/User.php');
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

    public function users()
    {
        $users   =   $this->model->getUsers();
        $categories =   $this->categoryModel->getCategories();

        $response = new stdClass();
        $response->users = $users;
        $response->categories = $categories;

		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
    
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
        if($_POST)
        {
            // Patch XSS
            $login = htmlspecialchars($_POST['login']);
            $firstname  =   htmlspecialchars($_POST['firstname']);
            $lastname  =   htmlspecialchars($_POST['lastname']);
            $password = htmlspecialchars($_POST['password']);
            $password_retype = htmlspecialchars($_POST['password_retype']);
            
            if($password === $password_retype){ // si les deux mdp saisis sont bon

                // On hash le mot de passe avec Bcrypt, via un coût de 12
                $cost = ['cost' => 12];
                $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                $user = new User();
                $user->setLogin($login);
                $user->setFirstname($firstname);
                $user->setLastname($lastname);
                $user->setPassword($password);

                $response = $this->model->new($user);
                // On redirige avec le message de succès
                if ($response) {
                    $this->signin;
                }
                else
                {
                    $login = $response['login'];

                    $headers = array('alg'=>'HS256','typ'=>'JWT');
                    $payload = array('login'=>$login, 'exp'=>(time() + 60));

                    $jwt = (new JwtService())->generate_jwt($headers, $payload);
                    $response = new stdClass();

                    $response->token = $jwt;
                    var_dump($response);

                    header('Content-Type: application/json');
                    echo json_encode($response, JSON_PRETTY_PRINT);
                }
            }
            
        }          
        else {
            // $categories = $this->model->getCategories();
            require('View/signup.php'); 
        }
    }
    // public function signup()
    // {
    //     $categories = $this->categoryModel->getCategories();
    //     require('View/signup.php'); 
    // }
}