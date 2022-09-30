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
        $user = null;
        if ($type == "formateur") {
            $user = Formateur::login($this->conn->connect(), $email, $password);
        } else {
            $user = Stagiaire::login($this->conn->connect(), $email, $password);
        }
        // header("location:MenuPrincipale.php");
        //print_r("Welcome Formateur ,".$user->getNom());
        if ($user != false) {
            //if($user){
            $_SESSION['user'] = serialize($user);
            header("location:../menu/index.php");
        } else{
            header("location: ../login.php?message=Utilisateur ou mot de passe incorrect");
        }
    }
}
