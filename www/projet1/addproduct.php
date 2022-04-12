<?php
session_start();
require_once 'config.php';
?>


<?php

echo $_GET['product_id'];

$idprtod = $_GET['product_id'];
$iduser = $_SESSION['user_id'];
$qte = 1;

$sql = "INSERT INTO panier VALUES (NULL, " . $iduser . "," . $qte . "," .  $idprtod . ")";

mysqli_query($bdd, $sql);

?>
