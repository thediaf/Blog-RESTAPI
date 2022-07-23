<?php
require_once('Controller/ArticleController.php');

$run = new \App\Controller\ArticleController();


if(isset($_SERVER["REQUEST_METHOD"]))
{   
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        
        $run->show($_GET['id']);
    }
}
else
    $run->home();   
