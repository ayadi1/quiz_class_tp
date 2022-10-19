<?php
if (isset($_GET['id'])) :
    require_once "../../Connection.php";
    require_once "../../modules/Question.php";
    $pdo = new Connection();
    $Question = Question::findById($pdo->connect(), $_GET['id']);

endif;
?>
<?php require_once '../layout/header.php' ?>

<div class="w-75 m-auto  mt-3 m-5  shadow p-3 mb-5 bg-light rounded">
    <form action="../../controllers/ModifierQuestionController.php" method="post">
    <h2  class="text-center">Modifier une question</h2>
    <small id="emailHelp" class="form-text text-muted">Veuillez indiquer dans la case suivante le contenu de la question.</small>
        <div class="form-group">
            <input type="hidden" id="id" value="<?= $Question->getId() ?>" name="id" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" value="<?= $Question->getLib() ?> " placeholder="question...?" id="lib" name="lib" class="form-control">
        </div>
        <input type="submit" value="Enregistrer" class="btn btn-primary mt-2">

    </form>

</div>
<?php require_once '../layout/footer.php' ?>