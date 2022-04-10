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
$sql = "SELECT * FROM catalogue ORDER BY id ASC";
$result = mysqli_query($bdd, $sql);
$fetch_row = mysqli_num_rows($result);

if($fetch_row > 0){
    foreach($result as $key => $data)
    {?>

        <div class="galerie">

            <img src ="<?=   $data['href']; ?>" height ="15%" width="15%"><br>

            <span><?php echo   $data['produit'];?></span>
            <br>
            <?= $data['prix']; ?>

            <a href="addproduct.php?product_id=<?php echo $data['id']; ?>">

            <input type="submit" name="addpanier" value="Ajouter au panier"/>




            </a>

        </div>


        <?php
    }}else{?>
    <tr>
    <td colspan="7"> <?='No data found'; ?></td>
    </tr><?php
}
?>





<?php
include 'footer.php';

?>
</body>
</html>
