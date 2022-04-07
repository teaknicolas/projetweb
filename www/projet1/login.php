<?php
session_start();
require_once 'config.php';
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
include 'header.php';
?>

<?php



if(isset($_GET['submit']))
{
    $form = $_GET;
    $email = htmlspecialchars['email'];
    $password = htmlspecialchars['password'];
    $_SESSION["user"] = $email;
    $sql = "SELECT * FROM utilisateur WHERE email='" . $email . "' and mdp = '" . $password . "'";
    $result = mysqli_query($bdd, $sql);
    $row = mysqli_num_rows($result);
    if($row > 0)
    {
    echo 'login success';
}echo $_SESSION["user"];}
?>

<div class="formulaire_connexion">
    <?php
     if(isset($_GET['login_err']))
     {

         $err = htmlspecialchars($_GET['login_err']);
         switch($err)
         {
             case 'success':
                 echo 'Vous etes connecté';
                 break;

             case 'fail':

                echo 'Compte inexistant';
                 break;

         }
     }
    ?>


    <div class="connexion">
    <form action="login.php" method="GET">

        <p>Bonjour, connectez-vous</p>
        <section>
            <div>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div>
                <input type="password" name="password" placeholder="Password"/>
            </div>


        </section>
        <br/>
        <input type="submit" value="Continuer" name="Continuer">
        <br>
        <a href="inscription.php">Créer mon compte</a>

    </form>
    </div>
</div>

<?php
include 'footer.php';
?>


</body>
</html>