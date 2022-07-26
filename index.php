<?php
require_once('Controller/ArticleController.php');
require_once('Controller/UserController.php');

$run = new \App\Controller\ArticleController();
$userController = new \App\Controller\UserController();


if(isset($_SERVER["REQUEST_METHOD"]))
{   
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if(isset($_GET['action']))
        {
            if ($_GET['action'] == "show")
            {
                $run->show($_GET['id']);
            }
            elseif ($_GET['action'] == "category")
            {   
                $run->categoryArticles($_GET['id']);
            }
            elseif ($_GET['action'] == "signin")
            {
                
                $userController->signin();
            }
            elseif ($_GET['action'] == "signup")
            {
                
                $userController->signup();
            }
        }
        else
            $run->home();   
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['firstname'])) {
            $userController->signup();
        }
        elseif (isset($_POST['content'])) {
            $run->add();
        }
        elseif (isset($_POST['login'])) {
            $userController->signin();
        }
    }
}
