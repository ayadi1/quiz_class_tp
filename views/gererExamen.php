<?php
session_start();

require_once "../modules/Formateur.php";
require_once "../modules/Stagiaire.php";
require_once "../modules/Filiere.php";
require_once "../modules/ModuleAssurer.php";
require_once "../modules/Module.php";
require_once "../modules/Competence.php";
require_once "../modules/Examen.php";
require_once '../Connection.php';

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
}

$user = unserialize($_SESSION['user'], ["allowed_classes" => true]);
$filieres = [];
$modules = [];
$competences = [];
$examens = [];

$db = new Connection();
$conn = $db->connect();

if ($user instanceof Formateur) {
    $filieres = $user->retournerFilieres($conn);
}

$idFiliere = null;
$idModule = null;
$idCompetence = null;

if (isset($_POST["update"])) {
    $id = (int)$_POST['id'];
    $label = $_POST['label'];
    $datePassation = $_POST['datePassation'];
    $examen = new Examen();
    $examen->setId($id);
    $examen->update($conn, $label, $datePassation);
    $_POST["filiere"] = $_SESSION['filiere'];
    $_POST["module"] = $_SESSION['module'];
    $_POST["competence"] = $_SESSION['competence'];
}

if (isset($_POST["filiere"])) {
    $idFiliere = $_POST["filiere"];
    $_SESSION['filiere'] = $idFiliere;
    $modules = ModuleAssurer::retournerModules($conn, (int)$idFiliere, $user->getId());
}

if (isset($_POST["module"])) {
    $idModule = $_POST["module"];
    $_SESSION['module'] = $idModule;
    $competences = Module::retournerCompetences($conn, (int)$idModule);
}

if (isset($_POST["competence"])) {
    $idCompetence = $_POST["competence"];
    $_SESSION['competence'] = $idCompetence;
    $examens = Competence::returnerExamens($conn, (int)$idCompetence);
    // $competence = new Competence();
    // $competence->setId($idCompetence);
    // $examens = $competence->returner_Examens($conn);
}

function optionSelected($choix, $currentId): string
{
    return (isset($_SESSION[$choix]) && (int)$_SESSION[$choix] === $currentId) ? "selected" : "";
}

?>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<div class="container">
    <div class="w-50 m-auto">
        <a href="../router/logoutRouter.php"> Deconnecter </a>
        <form method="post">
            <div class="mt-1">
                <div>
                    <label for="">filiere</label>
                    <select required class="form-select" name="filiere" onchange="submit()" id="selectFiliere">
                        <!-- <option value="" hidden></option> -->
                        <?php foreach ($filieres as $filiere) : ?>
                            <option value="" hidden>Choisi la filiere</option>
                            <option <?= optionSelected('filiere', $filiere->getId()) ?>
                                    value="<?= $filiere->getId() ?>"><?= $filiere->getLibFiliere() ?></option>
                        <?php endforeach;
                        unset($filieres, $filiere);
                        ?>
                    </select>
                </div>
                <input type="hidden" name="s_filiere" value="filiere">
            </div>

            <div class="mt-1">
                <label for="">module</label>
                <select class="form-select" name="module" id="" onchange="submit()">
                    <option value="" hidden>Choisi le module</option>
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
    </div>

    <div class="w-75 m-auto mt-4">
        <table border="1" class="table">
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
                    <form method="post">
                        <tr>
                            <input hidden type="text" value="<?= $examen->getId() ?>" name="id">
                            <td><?= $examen->getId() ?></td>
                            <td>
                                <input type="text" name="label" value="<?= $examen->getLibExamen() ?>">
                            </td>
                            <td><?= $examen->getDateCreation() ?></td>
                            <td><input name="datePassation" type="date" value="<?= $examen->getDatePassation() ?>"></td>

                            <td>
                                <input type="submit" name="update" value="update">
                            </td>
                        </tr>
                    </form>
                <?php endforeach;
                unset($examens, $examen);
                ?>
            <?php endif; ?>
            </tbody>
    </div>
</div>
