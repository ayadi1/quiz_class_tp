<?php

session_start();

require_once '../modules/Question.php';
require_once '../modules/Reponse.php';
require_once '../Connection.php';


if(isset(
    $_POST['libQuestion'],
    $_POST['idCompetence']
)){
    $libQuestion = $_POST['libQuestion'];
    $idCompetence = $_POST['idCompetence'];

    $connection = new Connection();
    $conn = $connection->connect();

    $idQuestion= null;
    $question = new Question();
    $question->setLib($libQuestion);
    $question->setIdCompetence($idCompetence);
    if($question->save($conn)){
        $question->setId($conn->lastInsertId());
        $idQuestion = $question->getId();
        for($i = 0; $i < 4; $i++){
            $reponse = new Reponse();
            if($reponse->save($conn)){
                $reponse->setId( (int) $conn->lastInsertId());
                $query = "INSERT INTO avoir_reponse (idReponse, idQuestion) VALUES (?, ?)";
                $pdoS = $conn->prepare($query);
                $pdoS->execute([
                    $reponse->getId(),
                    $question->getId()
                ]);
            }
        }
    }
    
    header("Location: ../views/question/editer.php?id=$idQuestion");

}else{
    header("Location: ../views/question/");
}
?>