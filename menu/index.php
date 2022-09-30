<?php
session_start();
$user = unserialize($_SESSION['user']);
require_once '../modules/Formateur.php';
require_once '../modules/Stagiaire.php';

$type = null;
if ($user instanceof  Formateur) {
    $type = 'formateur';
} elseif ($user instanceof  Stagiaire) {
    $type = 'stagaire';
}
$_SESSION['user'] = serialize($user);

?>

<?php if ($type = 'formateur') : ?>
    <nav>
        <ul>
            <li>
                <a href="./gererExamen.php">gerer Examen</a>
            </li>
        </ul>
    </nav>
<?php elseif ($type = 'stagiaire') : ?>
    <nav>
        <ul>
            <li><a href="./passerExamen.php">passer Examen</a></li>
        </ul>
    </nav>
<?php endif; ?>