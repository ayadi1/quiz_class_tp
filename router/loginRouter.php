<?php
session_start();
require "../Connection.php";
require_once '../controllers/LoginController.php';
require_once "../modules/Formateur.php";
require_once "../modules/Stagiaire.php";



if (isset($_POST["email"], $_POST["password"],$_POST["type"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $type = $_POST["type"];
    // $db = new Db();
    $loginController = new LoginController();
   // $loginController->store($email, $password,$type , $db);
    $loginController->stor($email, $password,$type);
}