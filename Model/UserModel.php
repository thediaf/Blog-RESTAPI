<?php
namespace App\Model;

require_once('Model/Manager.php');

use App\Model\Manager;

class UserModel extends Manager
{
    protected $connexion;

    public function __construct()
    {
        $this->connexion  = $this->dbConnect();
    }

    public function getUser($login)
    {

        $sql = 'SELECT * FROM user WHERE login = ?';
        $query =  $this->connexion->prepare($sql);
        $query->execute(array($login));

        return $query->fetch();

    }

}