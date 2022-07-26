<?php
namespace App\Model;

require_once('Model/Manager.php');
require_once('Entity/User.php');


use App\Model\Manager;

class UserModel extends Manager
{
    protected $connexion;

    public function __construct()
    {
        $this->connexion  = $this->dbConnect();
    }

    public function getUsers()
    {

        $sql = 'SELECT * FROM user ORDER BY id DESC';
        $query =  $this->connexion->query($sql);

        return $query->fetchAll();

    }

    public function getUser($login)
    {

        $sql = 'SELECT * FROM user WHERE login = ?';
        $query =  $this->connexion->prepare($sql);
        $query->execute(array($login));

        return $query->fetch();

    }

    public function new($user)
    {
        $request = $this->connexion->prepare('INSERT INTO user(lastname, firstname, login, password) VALUES(:lastname, :firstname, :login, :password)');
        
        return $request->execute(array(
                    'lastname' => $user->getLastname,
                    'firstname' => $user->getFirstname,
                    'login' => $user->getLogin,
                    'password' => $user->getPassword
                ));
    }

}