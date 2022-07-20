<?php
namespace App\Model;

use App\Model\Manager;

class CategoryModel extends Manager
{
    protected $connexion;

    public function __construct()
    {
        $this->connexion  = $this->dbConnect();
    }

}