<?php

session_start();

require_once '../modules/Question.php';
require_once '../modules/Reponse.php';
require_once '../Connection.php';



if (isset(
    $_GET['idQuestion'],
    $_GET['reponseCorrecte'],
    $_GET['reponsePossible']
)) {
    $idQuestion = $_GET['idQuestion'];
    $idReponseCorrecte = $_GET['reponseCorrecte'];
    $reponsePossibles = $_GET['reponsePossible'];

    $connection = new Connection();
    $conn = $connection->connect();

    $question = Question::findById($conn, $idQuestion);
    if ($question) {

        foreach ($reponsePossibles as $idReponse => $libReponse) {
            $reponse = Reponse::findById($conn, $idReponse);
            $reponse->setLib($libReponse);
            $reponse->modifier($conn);
            if ($idReponse == $idReponseCorrecte) {
                $question->modifierReponseCorrect($conn, $idReponseCorrecte);
            }
        }
    }

    header("Location: ../views/question/index.php");

} else {
    header("Location: ../views/question/editer.php?error=true&id=" . $_GET['idQuestion']);
}




?>