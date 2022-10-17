<?php
session_start();

require_once "../controllers/passerExamenController.php";
require_once "../modules/Stagiaire.php";
require_once "../modules/Groupe.php";
require_once "../modules/Filiere.php";
require_once "../modules/Competence.php";
require_once "../modules/Module.php";
require_once "../modules/Examen.php";
require_once "../Connection.php";


$passerExamen = new passerExamenController();


if (isset($_POST['competence'])) {
    $passerExamen->versPasserExamen($_POST['module'], $_POST['competence']);
    return;
}

if (isset($_POST['module'])) {
    $idModule = $_POST['module'];
    $passerExamen->versPasserExamen($idModule);
    return;
}

//if (!isset($_POST['module'], $_POST['competence'])) {
$passerExamen->versPasserExamen();
//}
