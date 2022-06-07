<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>projet1</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/css"/>
</head>
<body>
<?php
include 'header.php';
?>
<div class="vitrine-titre">
<p>PRODUITS NOUVEAUTES</p>
</div>
<div class="row">

    <div class="img-vitrine1">
        <a href="processeur.php">
<img src="img/amdryzen73700x.jpg" width="20%"/>
            <p>AMD ryzen 7 3700x</p>
    </div>


    <div class="img-vitrine1">
        <a href="Souris.php">
            <img src="img/aocgm300b.jpg" width="20%"/>
            <p>AOC GM 300B</p>
    </div>
</div>
<?php
include 'footer.php';
?>







</body>
</html>
