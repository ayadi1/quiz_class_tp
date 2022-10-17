<?php
//session_start();

require_once "../modules/Stagiaire.php";
require_once "../modules/Filiere.php";
require_once "../modules/Groupe.php";
require_once "../modules/Module.php";
require_once "../modules/Competence.php";
require_once "../modules/Examen.php";
require_once '../Connection.php';

$user = unserialize($_SESSION['user'], ["allowed_classes" => true]);
// TODO: do the test about type of instance before continue the end.
if (!$_SESSION["user"] && !($user instanceof Stagiaire)) {
    header("Location: ../login.php");
}

//$modules = isset($modules) ? $modules : [];
//$competences ??= [];
//$examens ??= [];
//$modules = unserialize($_SESSION["modulesList"], ["allowed_classes" => true]);
//$idModule = $_SESSION["module"];

//$competences = isset($_SESSION["module"]) ? unserialize($_SESSION["competencesList"], ["allowed_classes" => true]) : [];
//$idCompetence = $_SESSION["competence"];

//$examens = isset($_SESSION["competence"]) ? unserialize($_SESSION["examensList"], ["allowed_classes" => true]) : [];
//$idExamen = $_SESSION["examen"];


//var_dump($_SESSION);
function optionSelected($choix, $currentId): string
{
    return (isset($_SESSION[$choix]) && (int)$_SESSION[$choix] === $currentId) ? "selected" : "";
//    return (isset($choix) && $choix->getId() === $currentId) ? "selected" : "";
}

?>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<div class="container">
    <div class="w-50 m-auto">
        <a href="../router/logoutRouter.php"> Deconnecter </a>
        <form method="POST" action="../router/passerExamenRouter.php">
            <div class="mt-1">
                <label for="">module</label>
                <select class="form-select" name="module" id="" onchange="submit()">
                    <option value="" selected hidden>Choisi le module</option>
                    <?php foreach ($modules as $module) : ?>
                        <option <?= optionSelected("module", $module->getId()) ?>
                                value="<?= $module->getId() ?>"><?= $module->getLib() ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="mt-1">
                <label for="">competence</label>
                <select class="form-select" name="competence" id="" onchange="submit()">
                    <option value="" selected hidden>Choisi la competence</option>
                    <?php if (isset($_SESSION["module"])) : ?>
                        <?php foreach ($competences as $competence) : ?>
                            <option <?= optionSelected('competence', $competence->getId()) ?>
                                    value="<?= $competence->getId() ?>"><?= $competence->getLib() ?></option>
                        <?php endforeach ?>
                    <?php endif; ?>
                </select>
            </div>
        </form>
        <div class="w-100 m-auto mt-4">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Examen</th>
                    <th>date creation</th>
                    <th>date passation</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($idCompetence)) : ?>
                    <?php foreach ($examens as $examen) : ?>
                        <tr>
                            <td><?= $examen->getId() ?></td>
                            <td><?= $examen->getLib() ?></td>
                            <td><?= $examen->getDateCreation() ?></td>
                            <td><?= $examen->getDatePassation() ?></td>
                            <td>
                                <form action="" method="post">
                                    <input hidden type="text" value="<?= $examen->getId() ?>" name="id">
                                    <input type="submit" value="Passer">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;
                    unset($examens, $examen);
                    ?>
                <?php endif; ?>
                </tbody>
        </div>
    </div>