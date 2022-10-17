<?php
session_start();

require_once '../modules/Formateur.php';
require_once '../modules/Stagiaire.php';

$user = unserialize($_SESSION['user'], ["allowed_classes" => true]);
//print_r($_SESSION);
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
}

$type = null;
if ($user instanceof Formateur) {
    $type = 'formateur';
} elseif ($user instanceof Stagiaire) {
    $type = 'stagiaire';
}
$_SESSION['user'] = serialize($user);
?>

<?php if ($type === 'formateur') : ?>
    <nav>
        <ul>
            <li>
                <a href="./gererExamen.php">gerer Examen</a>
            </li>
        </ul>
    </nav>
<?php elseif ($type === 'stagiaire') : ?>
    <nav>
        <ul>
            <li><a href="../router/passerExamenRouter.php">passer Examen</a></li>
        </ul>
    </nav>
<?php elseif ($type === 'directeur') : ?>
    <nav>
        <ul>
            <li><a href="consulterExamenDirecteur.php">consulter Examen</a></li>
        </ul>
    </nav>
<?php endif; ?>
<a href="../router/logoutRouter.php"> Deconnecter </a>
