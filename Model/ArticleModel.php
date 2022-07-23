<?php
namespace App\Model;

require_once('Model/Manager.php');
require_once('Entity/Article.php');

use App\Entity\Article;
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

    public function add(Article $article)
    {
        $request = $this->connexion->prepare('INSERT INTO article(titre, contenu, dateCreation) VALUES(:title, :content, :createdAt)');

        $request->execute(
            [
                'title' => $article->getTitle(),
                'content' => $article->getContent(),
                'createdAt' => $article->getCreatedAt()
            ]
        );
            
        return $request;
    }

    public function getArticlesByCategory($id)
    {

        $sql = 'SELECT id, titre, contenu, dateCreation FROM article WHERE categorie = ? ORDER BY id DESC';
        $query =  $this->connexion->prepare($sql);
        $query->execute(array($id));

        return $query->fetchAll();

    }

}