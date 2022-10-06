<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
}

require_once "../modules/Stagiaire.php";
require_once "../modules/Module.php";
require_once "../modules/Competence.php";
require_once "../modules/Examen.php";
require_once '../Connection.php';


$user = unserialize($_SESSION['user'], ["allowed_classes" => true]);

$db = new Connection();
$conn = $db->connect();

$modules = ["aproche agile", "preparer projet web"];
$competences = ["comp1", "comp2"];
?>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<div class="container">
    <div class="w-50 m-auto">
        <a href="../router/logoutRouter.php"> Deconnecter </a>
        <form method="post">
            <div class="mt-1">
                <label for="">module</label>
                <select class="form-select" name="module" id="" onchange="submit()">
                    <option value="" hidden>Choisi le module</option>
                    <?php foreach ($modules as $module) : ?>
                        <option value="<?= $module ?>"><?= $module ?></option>
                    <?php endforeach; ?>
                    <?php if (isset($idFiliere)) : ?>
                        <?php foreach ($modules as $module) : ?>
                            <option <?= optionSelected('module', $module->getId()) ?>
                                value="<?= $module->getId() ?>"><?= $module->getLibModule() ?></option>
                        <?php endforeach;
                        unset($modules, $module);
                        ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="mt-1">
                <label for="">competence</label>
                <select class="form-select" name="competence" id="" onchange="submit()">
                    <option value="" selected hidden>Choisi la competence</option>
                    <?php foreach ($competences as $competence) : ?>
                        <option value="<?= $competence ?>"><?= $competence ?></option>
                    <?php endforeach; ?>
                    <?php if (isset($idModule)) : ?>
                        <?php foreach ($competences as $competence) : ?>
                            <option <?= optionSelected('competence', $competence->getId()) ?>
                                value="<?= $competence->getId() ?>"><?= $competence->getLibCompetence() ?></option>
                        <?php endforeach;
                        unset($competences, $competence);
                        ?>
                    <?php endif; ?>
                </select>
            </div>
        </form>
        <button class="btn btn-outline-success">Start Examen</button>
    </div>