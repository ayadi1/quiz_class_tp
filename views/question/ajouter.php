<?php require_once '../layout/header.php' ?>
<div class=" w-75 m-auto  mt-3 m-5  shadow p-3 mb-5 bg-light rounded">
    <form method="POST" action="../../controllers/AjouterQuestionController.php">
        <div class="form-group d-flex justify-content-center m-4">
            <h2>Ajouter une question</h2>
        </div>
        <div>
            <small id="emailHelp" class="form-text text-muted">Veuillez indiquer dans la case suivante le contenu de la question.</small>
        </div>
        <div class="md-form amber-textarea active-amber-textarea-2">
            <i class="fas fa-pencil-alt prefix"></i>
            <input type="hidden" name="idCompetence" value="<?= $_GET['id'] ?>">
            <input id="form24" class="md-textarea form-control" name="libQuestion">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ajouter la question</button>
    </form>
</div>
<?php require_once '../layout/footer.php' ?>
