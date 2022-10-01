<?php

class LogoutController
{

    // public function store(string $email, string $password, string $type, Db $db)
    public static function logOut()
    {
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy(); 
        header("location:../login.php");
    }
}
