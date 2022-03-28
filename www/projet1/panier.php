<?php
require_once 'config.php';

?>
<?php

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");//on met item_id dans shopping_cart en colonne
        if(!in_array($_GET["id"], $item_array_id))//si id n'est pas dans item_array_id
        {
            //$count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'       => $_GET["id"],
                'item_name'     => $_POST["hidden_name"],
                'item_price'    => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );
            array_push($_SESSION['shopping_cart'], $item_array);
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="panier.php"</script>';
        }
    }
    else
    {
        $item_array = array(
                'item_id'       => $_GET["id"],
                'item_name'     => $_POST["hidden_name"],
                'item_price'    => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach ($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}
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

<div class="tablepanier">
    <table class="table_bordered">
        <tr>
            <th width="40%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
        </tr>
        <?php
        if(!empty($_SESSION["shopping_cart"]))
        {
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
        ?>
        <tr>

            <td><?php echo $values["item_name"]; ?></td>
            <td><?php echo $values["item_quantity"]; ?></td>
            <td>$ <?php echo $values["item_price"]; ?></td>

            <td><a href="panier.php?action=delete&id=<?php echo $values["item_id"]; ?>"<span class="text_danger">Remove</span></td>
        </tr>

        <?php
                /*$total = $total + ($values["item_quantity"] * $values["item_price"]);*/

            }
        ?>
        <tr>
            <td>TOTAL</td>
            <td align="right">$ <?php echo number_format($total, 2); ?></td>
        </tr><?php
        }
        ?>


    </table>

</div>
<?php
include 'footer.php';
?>







</body>
</html>
