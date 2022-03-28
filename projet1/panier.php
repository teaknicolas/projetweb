<?php
require_once 'config.php';

?>
<?php

if ( filter_has_var( INPUT_GET, 'submit' ) ) {

    echo '<h2>form data retrieved by using $_GET variable<h2/>';

$produit = $_GET['produit'];
$prix = $_GET['prix'];
}

// display the results
echo 'Your name is ' . $produit .' ' . $prix;
exit;

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



</div>
<?php
include 'footer.php';
?>







</body>
</html>
