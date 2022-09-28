<?php

class Connection
{   
    public  function connect()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=quiz_app", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $conn;
        } catch (PDOException $e) {
            return false;
        }
    }
}
