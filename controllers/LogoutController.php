<?php

/**
 *
 */
class LogoutController
{
    /**
     * @return void
     */
    public static function logout(): void
    {
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy(); 
        header("location:../login.php");
    }
}
