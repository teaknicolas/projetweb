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
$user_id = $_SESSION['user_id'];
$sql = "SELECT img FROM catalogue INNER JOIN panier ON panier.id_produit = catalogue.id INNER JOIN utilisateur ON utilisateur.id = panier.id_utilisateur";
$result = mysqli_query($bdd, $sql);
$fetch_row = mysqli_num_rows($result);
if($fetch_row > 0)
{
    foreach ($result as $key => $v)
    {
        echo $v['img'];
    }
}
else
{
    echo "no record found";
}


?>











</body>
</html>
