<?php
session_start();
require 'config.php';
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
require 'header.php';
?>
<?php


$array[] = $_SESSION[$idproduit];
foreach($_SESSION[$idproduit] as $val){

    echo($val);
}
?>


<?php
include 'footer.php';

?>







</body>
</html>
