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
<?php $_SESSION["unnegro"] = "jsuis vraiment tres bre-som";?>
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

                <img src ="<?php echo $row["href"]; ?>" height ="15%" width="15%">
            <a href="panier.php?product_id=<?=$row['id']?>">
                <input type="submit" value="Ajouter au panier"/>
            </a>




        </div>

        <?php
    }
}?>





<?php
include 'footer.php';

?>
</body>
</html>
