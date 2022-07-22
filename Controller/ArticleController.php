<?php
namespace App\Controller;

use App\Model\ArticleModel;

require_once('Model/ArticleModel.php');

class ArticleController 
{
    protected $model;
    public function __construct()
    {
        $this->model = new ArticleModel();
    }

    public function home()
    {
        $articles = $this->model->getArticles();
        // $categories = $this->model->getCategories();
        // $categories = new CategoryModel();
        // foreach ($articles as $values) {
        //     # code...
        //     foreach ($values as $key => $value) {
        //         # code...
        //         var_dump($key);
        //     }
        // }
        // echo "test";
        
		header('Content-Type: application/json');
		echo json_encode($articles, JSON_PRETTY_PRINT);
        // if ($articles) {
        //     require('View/home.php');   
        //     # code...
        // }
    }
}