<?php

class LoginController
{

    private Connection $conn;

    public function __construct()
    {
        $this->conn = new Connection();
    }
    
    // public function store(string $email, string $password, string $type, Db $db)
    public function stor(string $email, string $password, string $type)
    {
        $userObj = null;
        if ($type == "formateur") {
            $userObj = Formateur::login($this->conn->connect(), $email, $password);
        } else {

            $userObj = Stagiaire::login($this->conn->connect(), $email, $password);
        }
        // header("location:MenuPrincipale.php");
        //print_r("Welcome Formateur ,".$userObj->getNom());
        $_SESSION['user'] = serialize($userObj);
        header("location:../menu");
    }
}
