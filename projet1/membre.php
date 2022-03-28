<?php
session_start();
if(isset($_SESSION['user']))
    header('Location:connexion.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>projet1</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
include('index.php');
?>
<h1>Bonjour <?php echo $_SESSION['user']; ?></h1>
    <a href = "deconnexion.php" class="btn membre">Deconnexion</a>
    <footer>
        <div class="logos">
            <a href="#"><img class="image1" src="insta.png" alt="logoinsta" width="20" height="20"></a>
            <a href="#"><img class="image2" src="twitter.png" alt="logotwitter" width="20" height="20"></a>
        </div>
    </footer>
</body>
</html>
