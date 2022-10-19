<?php

require_once '../../modules/Question.php';
require_once '../../Connection.php';

if (isset($_GET['id'], $_GET['filiere'], $_GET['module'], $_GET['competence'])) {

    $db = new Connection();

    $question = new Question();
    $question->setId( (int)$_GET['id']);
    session_start();
    if ($question->supprimer($db->connect())) {
        $_SESSION['question']['delete'] = true;
    }
    else {
        $_SESSION['question']['delete'] = false;
    }
    header(sprintf("location:./index.php?filiere=%s&module=%s&competence=%s", $_GET['filiere'], $_GET['module'], $_GET['competence']));
}