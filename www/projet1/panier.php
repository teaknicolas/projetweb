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

<label>Voici Votre Panier</label>
<?php

$sql = "SELECT * FROM catalogue INNER JOIN panier ON panier.id_produit = catalogue.id INNER JOIN utilisateur ON utilisateur.id = panier.id_utilisateur WHERE panier.id_utilisateur = '" . $_SESSION['user_id'] . "'";
$result = mysqli_query($bdd, $sql);
$fetch_row = mysqli_num_rows($result);
if($fetch_row > 0)
{
    foreach ($result as $key => $v)
    {?>
        <form method="get" action="">
        <div class="panier">
        <img src ="<?= $v['img'] ?>" height="10%" width="10%">
        <br>
        <label for="produit"><?php echo $v['produit'] ?></label>
        <br>
            <label><?php echo 'Quantité : '?><?php echo $v['qte']; ?></label>
        </div>


        </form>


        <?php
    }
}
else
{
    echo "no record found";
}


?>











</body>
</html>
