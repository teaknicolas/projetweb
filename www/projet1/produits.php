<?php
session_start();
require 'config.php';

?>

<!DOCTYPE html>
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
if(count($_GET)>0){
$idprtod = $_GET['product_id'];
$iduser = $_SESSION['user_id'];
$qte = $_GET['qte'];

$sql = "INSERT INTO panier VALUES (NULL, " . $iduser . "," . $qte . "," .  $idprtod . ")";

mysqli_query($bdd, $sql);}
?>

<?php
$sql = "SELECT * FROM catalogue ORDER BY id ASC";
$result = mysqli_query($bdd, $sql);
$fetch_row = mysqli_num_rows($result);

if($fetch_row > 0){
    foreach($result as $key => $data)
    {?>
        <form method="GET" action="produits.php">
        <div class="galerie">

            <img src ="<?=   $data['img']; ?>" height ="15%" width="15%"><br>

            <span><?php echo   $data['produit'];?></span>
            <br>
            <?= $data['prix']; ?>

            <label for="quantity">Quantity (between 1 and 10):</label>
            <input type="number" id="qte" name="qte" min="1" max="10" value="1">

             <input type="hidden" name="product_id" value="<?php echo $data['id']?>">


                <input type="submit" name="addpanier" value="Ajouter au panier"/>



        </div>
        </form>


        <?php
    }}else{?>
    <tr>
    <td colspan="7"> <?='No data found'; ?></td>
    </tr><?php
}
?>





<?php


?>
</body>
</html>
