<?php

class LoginController
{

    private Connection $conn;

    public function __construct()
    {
        $this->conn = new Connection();
    }

    public function store(string $email, string $password, string $type)
    {
        $user = null;
        if ($type === "formateur") {
            $user = Formateur::login($this->conn->connect(), $email, $password);
        } else {
            $user = Stagiaire::login($this->conn->connect(), $email, $password);
        }
        if ($user !== false) {
            $_SESSION['user'] = serialize($user);
            header("location:../views/index.php");
        } else{
            header("location: ../login.php?message=Utilisateur ou mot de passe incorrect");
        }
    }
}
