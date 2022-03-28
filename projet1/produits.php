<?php

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

if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
    ?>
        <div class="galerie">
         <form method="get" action="panier.php?action=add&id=<?php echo $row["id"]; ?>">
             <div class="container">
        <img src="<?php echo $row["href"]; ?>" height="15%" width="15%"/>
        <?php echo $row["produit"]; ?><br/>
        <?php echo $row["prix"]; ?>
        <input type="text" name="quantity" class="form-control" value="1" />
                 <input type="hidden" name="hidden_name" id="<?php $row["id"]; ?> "/>
             <input type="hidden" name="hidden_name" value="<?php echo $row["produit"]; ?>" />
             <input type="hidden" name="hidden_price" value="<?php echo $row["prix"]; ?>" />
                 <input type="submit" name="submit" value="ajouter au panier"/>

             </div>
        </form>
        </div>
<?php
    }
}?>





<?php
include 'footer.php';
?>
</body>
</html>