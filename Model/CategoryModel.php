<?php
namespace App\Model;

require_once('Model/Manager.php');

use App\Model\Manager;

class CategoryModel extends Manager
{
    protected $connexion;

    public function __construct()
    {
        $this->connexion  = $this->dbConnect();
    }

    // public function getCategories()
    // {

    //     $sql = 'SELECT id, titre FROM categorie ORDER BY id DESC';
    //     $query =  $this->connexion->query($sql);

    //     return $query->fetchAll();

    // }

    public function getCategories()
    {

        $sql = 'SELECT * FROM categorie ORDER BY id DESC';
        $query =  $this->connexion->query($sql);

        return $query->fetchAll();

    }

}