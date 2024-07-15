<?php

require_once "global.php";


class Get extends GlobalMethods{

    private $pdo;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }
    
    public function get_signup($id=null){
        $conditionString = null;
        if($id != null){
            $conditionString = "userId=$id";
        }
        return $this->get_signup("users", $conditionString);
    }




    public function isUserLoggedIn() {
        return isset($_SESSION['userId']);
    }

    public function logout() {
        session_unset(); 
        session_destroy(); 
    }
    
    
}

  

?>