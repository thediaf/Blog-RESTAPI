<?php
namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CategoryModel;
use stdClass;

require_once('Model/ArticleModel.php');
require_once('Model/CategoryModel.php');

class ArticleController 
{
    protected $model;
    protected $categoryModel;

    public function __construct()
    {
        $this->model = new ArticleModel();
        $this->categoryModel = new CategoryModel();
    }

    public function home()
    {
        $articles   =   $this->model->getArticles();
        $categories =   $this->categoryModel->getCategories();

        $response = new stdClass();
        $response->articles = $articles;
        $response->categories = $categories;

		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
    
    }

    public function show($id)
    {
        $categories = $this->categoryModel->getCategories();
        
        $article = $this->model->getArticle($id);

        $response = new stdClass();
        $response->article = $article;
        $response->categories = $categories;
        
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function categoryArticles($id)
    {
        $articles = $this->model->getArticlesByCategory($id);
        $categories = $this->categoryModel->getCategories();
       
        $response = new stdClass();
        $response->articles = $articles;
        $response->categories = $categories;
        // var_dump($articles);

		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
    }
}