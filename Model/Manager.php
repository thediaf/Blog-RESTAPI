<?php

namespace App\Model;

use mysqli;
use PDO;

class Manager {
    
    public function dbConnect(): PDO
    {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=mglsi_news', 'root', 'root', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            return $db;    //code...
        } 
        catch (\Throwable $th) {
            //throw $th;
            echo $th;
        }
        
    }
    
    
    
}

?>