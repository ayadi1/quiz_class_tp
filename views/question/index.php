<?php require_once '../layout/header.php'?>

<?php
$db = new Connection();

$filieres = $user->filieres($db->connect());
$modules = [];
$competences = [];
$questions = [];
if (isset($_GET['filiere']) && !empty($_GET['filiere'])) {
    $modules = $user->modules($db->connect(), (int)$_GET['filiere']);
}
if (isset($_GET['module']) && !empty($_GET['module'])) {
    $module = new Module();
    $module->setId((int)$_GET['module']);
    $competences = $module->competences($db->connect());
}
if (isset($_GET['competence']) && !empty($_GET['competence'])) {
    $competence = new Competence();
    $competence->setId((int)$_GET['competence']);
    $questions = $competence->questions($db->connect());
}


function optionSelected($choix, $currentId): string
{
    return (isset($_GET[$choix]) && (int)$_GET[$choix] === $currentId) ? "selected" : "";
}
?>
<div class="container">
    <div>
        <?php if (isset($_SESSION['question']['delete'])): ?>
        <?php if ($_SESSION['question']['delete']): ?>
        <div class="alert alert-success" role="alert">
            la question a ete supprimé avec succès
        </div>
        <?php
    else: ?>
        <div class="alert alert-danger" role="alert">
            il y a une erreur veuillez réessayer plus tard
        </div>
        <?php
    endif; ?>
        <?php
    unset($_SESSION['question']);
endif; ?>
    </div>
    <!-- form for filter start -->
    <form method="get" class="border p-3 bg-light mt-4">
        <div class="row">
            <div class="col">
                <label for="">filiere</label>
                <select required class="form-select" name="filiere" onchange="submit()" id="selectFiliere">
                    <option value="" hidden>Choisi la filiere</option>
                    <?php foreach ($filieres as $filiere): ?>
                    <option value="<?= $filiere->getId()?>" <?=optionSelected('filiere', $filiere->getId())?>>
                        <?= $filiere->getLib()?>
                    </option>
                    <?php
endforeach; ?>

                    <?php unset($filieres, $filiere); ?>
                </select>
            </div>
            <div class="col">
                <label for="">module</label>
                <select class="form-select" name="module" id="" onchange="submit()">
                    <option value="" hidden>Choisi le module</option>
                    <?php foreach ($modules as $module): ?>
                    <option value="<?= $module->getId()?>" <?=optionSelected('module', $module->getId())?>>
                        <?= $module->getLib()?>
                    </option>
                    <?php
endforeach; ?>

                    <?php unset($modules, $module); ?>
                </select>
            </div>
            <div class="col">
                <label for="">competence</label>
                <select class="form-select" name="competence" id="" onchange="submit()">
                    <option value="" selected hidden>Choisi la competence</option>
                    <?php foreach ($competences as $competence): ?>
                    <option value="<?= $competence->getId()?>" <?=optionSelected('competence', $competence->getId())?>>
                        <?= $competence->getLib()?>
                    </option>
                    <?php
endforeach; ?>

                    <?php unset($competences, $competence); ?>
                </select>
            </div>
        </div>
    </form>
    <!-- form for filter end -->
    <!-- display data in table start -->
    <div class="card mt-3">
        <div class="card-header">
            <h1>Liste de questions</h1>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">label</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($questions as $question): ?>
                    <tr>
                        <th scope="row">
                            <?= $question->getId()?>
                        </th>
                        <td>
                            <?= $question->getLib()?>
                        </td>
                        <td>
                            <a href="./modifier.php?id=<?= $question->getId()?>" role="banner"
                                class="btn btn-primary"><i class="fa-sharp fa-solid fa-pen"></i></a>
                            <a href="./editer.php?id=<?= $question->getId()?>" class="btn btn-success"><i
                                    class="fa-sharp fa-solid fa-arrow-right"></i></a>
                            <button
                                onclick="deleteQuestion('<?= $question->getId()?>','<?= $_GET['filiere']?>','<?= $_GET['module']?>','<?= $_GET['competence']?>')"
                                class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></i></button>
                        </td>
                    </tr>
                    <?php
endforeach; ?>


                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <nav aria-label="Page navigation example " class="d-flex justify-content-start">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col d-flex justify-content-end align-items-start">

                    <?php if (isset($_GET['competence']) && !empty($_GET['competence'])): ?>
                    <a href="./ajouter.php?id=<?= $_GET['competence']?>" class="btn btn-primary">ajouter</a>
                    <?php
endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- display data in table end -->

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function deleteQuestion(id, filiere, _module, competence) {
        if (confirm('are you sure?')) {
            window.location.href = `./Supprimer.php?id=${id}&filiere=${filiere}&module=${_module}&competence=${competence}`;
        }
    }
    $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
        $(".alert-success").slideUp(500);
    });
    $(".alert-danger").fadeTo(2000, 500).slideUp(500, function () {
        $(".alert-danger").slideUp(500);
    });
    function changeFiliere() {

    }
</script>
<?php require_once '../layout/footer.php'?>