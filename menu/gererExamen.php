<?php

session_start();
require_once "../modules/Formateur.php";
require_once "../modules/Stagiaire.php";
require_once "../modules/Filiere.php";
require_once "../modules/ModuleAssurer.php";
require_once "../modules/Module.php";
require_once "../modules/Competence.php";
require_once '../Connection.php';
$user = unserialize($_SESSION['user']);
$filieres = [];
$modules = [];
$competences = [];
$examens = [];

$db = new Connection();
if ($user instanceof  Formateur) {
    $filieres = $user->retournerFilieres($db->connect());
}

$idFiliere = null;
$idModule = null;
$idCompetence = null;

if (isset($_POST["filiere"])) {
    $idFiliere = $_POST["filiere"]; // filiere id
    $_SESSION['filiere'] = $idFiliere;

    $modules = ModuleAssurer::retournerModules($db->connect(), $idFiliere, $user->getId());
}
if (isset($_POST["module"])) {
    $idModule = $_POST["module"];
    $_SESSION['module'] = $idModule;

    $competences = Module::retournerCompetences($db->connect(), $idModule);
}
if (isset($_POST["competence"])) {
    $idCompetence = $_POST["competence"];
    $_SESSION['competence'] = $idCompetence;

    $examens = Competence::returnerExamens($db->connect(), $idCompetence);

}

function optionSelected($choix, $currentId)
{
    return (isset($_SESSION[$choix]) && $_SESSION[$choix] == $currentId) ? "selected" : "";
}

?>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<div class="container">

    <div class="w-50 m-auto">
        <div class="mt-5">
            <form method="post">
                <div>
                    <label for="">filiere</label>
                    <select required class="form-select" name="filiere" onchange="submit()" id="selectFiliere">
                        <!-- <option value="" hidden></option> -->
                        <?php foreach ($filieres as $filiere) : ?>

                            <option <?= optionSelected('filiere', $filiere->getId())  ?> value="<?= $filiere->getId(); ?>"><?= $filiere->getLIB_Filiere(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="s_filiere" value="filiere">
                <!--  </form> -->
        </div>

        <!-- <form method="post"> -->

        <div class="mt-5">
            <label for="">module</label>
            <select class="form-select" name="module" id="" onchange="submit()">
                <?php if (isset($idFiliere)) : ?>
                    <?php foreach ($modules as $module) : ?>
                        <option <?= optionSelected('module', $module->getId()) ?>" value="<?= $module->getId() ?>"><?= $module->getLable(); ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <!-- </form>
        <form method="post"> -->

        <div class="mt-5">
            <label for="">competence</label>
            <select class="form-select" name="competence" id="" onchange="submit()">
                <?php if (isset($idModule)) : ?>
                    <?php foreach ($competences as $competence) : ?>
                        <option <?= optionSelected('competence', $competence->getId()) ?>" value="<?= $competence->getId() ?>"><?= $competence->getLIB_COMP(); ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>

            </select>
        </div>
        </form>

    </div>
</div>