<?php

session_start();

require_once '../modules/Question.php';
require_once '../modules/Reponse.php';
require_once '../Connection.php';


if (isset(
$_POST['id'],
$_POST['lib']

)) {
    $id = $_POST['id'];
    $newLibQuestion = $_POST['lib'];

    $connection = new Connection();
    $conn = $connection->connect();
    $question = new Question();
    $question->setId((int)$id);
    $question->setLib($newLibQuestion);
    $question->modifier($conn,);
   
    header("Location: ../views/question/index.php");
    
}else {
    header("Location: ../views/question/index.php?error=true");
    echo 'erreur';
}

?>
