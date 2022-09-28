<?php

session_start();
require_once "../modules/Formateur.php";
require_once "../modules/Stagiaire.php";
require_once "../modules/Filiere.php";
require_once '../Connection.php';
$user = unserialize($_SESSION['user']);
$filieres = null;
$modules = null;
$db = new Connection();
if ($user instanceof  Formateur) {
    $filieres = $user->retournerFilieres($db->connect());
}
$idFiliere = null;
if (isset($_POST["filiere"], $_POST['s_filiere'])) {
    $idFiliere = $_POST["filiere"];
}

if (isset($idFiliere)) {
    $modules = ModuleAssurer::retournerModules($idFiliere, $idFormateur);
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
                    <select required class="form-select" name="filiere" id="selectFiliere">
                        <?php foreach ($filieres as $filiere) : ?>
                            <option value="<?= $filiere->getId(); ?>"><?= $filiere->getLIB_Filiere(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="s_filiere" value="filiere">
            </form>
        </div>

        <div class="mt-5">
            <label for="">module</label>
            <select class="form-select" name="module" id="">
                <?php if (isset($idFiliere)) : ?>
                    <?php foreach ($modules as $module) : ?>
                        <option value="<?= $module->getId(); ?>"><?= $module->getLabelModule(); ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>

        <div class="mt-5">
            <label for="">competence</label>
            <select class="form-select" name="competence" id="">
                <?php if (false) : ?>
                    <?php foreach ($competences as $competence) : ?>
                        <option value="<?= $competence->getId(); ?>"><?= $competence->getLabelCompetence(); ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>

            </select>
        </div>

    </div>
</div>