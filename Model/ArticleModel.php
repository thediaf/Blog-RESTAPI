<?php
namespace App\Model;

require_once('Model/Manager.php');

use App\Model\Manager;

class ArticleModel extends Manager
{
    protected $connexion;

    public function __construct()
    {
        $this->connexion  = $this->dbConnect();
    }

    public function getArticles()
    {

        $sql = 'SELECT * FROM article ORDER BY id DESC';
        $query =  $this->connexion->query($sql);

        return $query->fetchAll();

    }

    public function getArticle($id)
    {
        $sql = 'SELECT id, titre, contenu, dateCreation FROM article WHERE id = ? ORDER BY id DESC';
        $query =  $this->connexion->prepare($sql);
        $query->execute(array($id));

        return $query->fetch();

    }

}