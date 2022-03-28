<?php

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

if(isset($_POST['email']) && isset($_POST['password']))
{
    $Email = htmlspecialchars($_POST['email']);
    $Password = htmlspecialchars($_POST['password']);


    $sql = "SELECT * FROM utilisateur WHERE email = '" .$Email. "' and mdp = '" .$Password. "' ";
    $sql5 = "SELECT photo FROM utilisateur ORDER BY id asc";


    $result = mysqli_query($bdd, $sql);
    $row = mysqli_num_rows($result);
    $result5 = mysqli_query($bdd, $sql5);






    if($row > 0)
    {
            if (mysqli_num_rows($result5) > 0){
                while($row = mysqli_fetch_array($result5))
                {?>
                    <img src="img/jpg<?php echo base64_encode($row["photo"]); ?>" height="15%" width="15%"/><?php
       header('Location:connexion.php?login_err=success');
                }
                }



    }
    else {header('Location:connexion.php?login_err=fail');}


}
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
    <form action="connexion.php" method="post">

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
