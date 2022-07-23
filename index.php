<?php
require_once('Controller/ArticleController.php');

$run = new \App\Controller\ArticleController();


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
        }
        else
            $run->home();   
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        $run->add();
    }
}
