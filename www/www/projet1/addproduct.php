<?php
session_start();
require_once 'config.php';
?>

<?php
    $idproduit = $_GET['product_id'];
$idproduit = $_SESSION['user_id'];


    $sql = "INSERT INTO panier(id,id_utilisateur) VALUES (" . "'" . $idproduit . "','" . $idproduit . "')";

    $result = mysqli_query($bdd, $sql);






?>
