<?php
session_start();
require 'config.php';

?>

<?php
// display the results
echo "ma phrase préféré est " . $_SESSION["unnegro"] . ".";


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
