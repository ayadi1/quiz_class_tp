<?php require_once '../layout/header.php' ?>
<?php

require_once "../../modules/Question.php";
require_once "../../Connection.php";


$connection = new Connection();
$conn = $connection->connect();

if (isset($_GET['id'])) {
    $idQuestion = $_GET['id'];

    $question = Question::findById($conn, $idQuestion);
    $idReponseCorrecte = $question->getIdReponse();
    $reponses = $question->getReponses($conn);
}

function optionChecked($idReponseCorrecte, $currentReponseId): string
{
    return ((int)$idReponseCorrecte === $currentReponseId) ? "checked" : "";
}

?>
<div class="container">
    <!-- message if error start -->
    <div>
        <?php if (isset($_GET['error']) && $_GET['error']) : ?>
            <div class="alert alert-danger" role="alert">
                il y a une erreur veuillez réessayer plus tard
            </div>
        <?php endif; ?>
    </div>
    <!-- message if error end -->

    <!-- display form editer start -->
    <div class="card mt-3">
        <div class="card-header">
            <h1>Editer question</h1>
        </div>

        <div class="card-body">
            <!-- form editer question start -->
            <form method="GET" action="../../controllers/EditerQuestionController.php" class="border p-3 bg-light mt-4">
                <div>
                    <h2><?= $question->getLib() ?></h2>
                    <div class="input-group mb-3">
                        <input type="hidden" class="form-control" name="idQuestion" value="<?= $question->getId() ?>" readonly>
                    </div>

                    <?php foreach($reponses as $reponse): ?>
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="radio" 
                            name="reponseCorrecte" 
                            id="reponse1" 
                            value="<?= $reponse->getId() ?>"
                            <?= optionChecked($idReponseCorrecte, $reponse->getId()) ?>
                        >
                        <!-- <label class="form-check-label" for="reponse1"> -->
                        <input 
                            type="text" 
                            class="form-control" 
                            name="reponsePossible[<?= $reponse->getId() ?>]" 
                            value="<?= $reponse->getLib() ?>"
                        >
                        <!-- </label> -->
                    </div>
                    <?php endforeach; ?>

                    <div class="d-flex justify-content-end align-items-end">
                        <input type="submit" value="Enregistrer" class="btn btn-primary w-100">
                    </div>
                </div>
            </form>
            <!-- form editer question end -->
        </div>

        <div class="card-footer">

        </div>
    </div>
    <!-- display form editer end -->

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function deleteQuestion(id, filiere, _module, competence) {
        if (confirm('are you sure?')) {
            window.location.href = `./Supprimer.php?id=${id}&filiere=${filiere}&module=${_module}&competence=${competence}`;
        }
    }
    $(".alert-success").fadeTo(2000, 500).slideUp(500, function() {
        $(".alert-success").slideUp(500);
    });
    $(".alert-danger").fadeTo(2000, 500).slideUp(500, function() {
        $(".alert-danger").slideUp(500);
    });
</script>
<?php require_once '../layout/footer.php' ?>