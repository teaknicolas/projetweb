<?php

require_once 'config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>projet1</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

<?php
include 'header.php';
?>
<?php

if (count($_POST) > 0) {

    $Pseudo = htmlspecialchars($_POST['pseudo']);
    $Email = htmlspecialchars($_POST['email']); //pareil
    $Mdp = htmlspecialchars($_POST['password']); //pareil
    $Mdp2 = htmlspecialchars($_POST['password2']);
    $PHOTO = htmlspecialchars($_POST['photo']);

    //$sql = "INSERT INTO utilisateur(pseudo,email,mdp) VALUES (". "'" . $Pseudo . "','" . $Email . "','" . $Mdp . "')";
    // ENTREZ DANS LA TABLE UTILISATEURS LES VALEURS SUIVANTES : NULL(id) PRENOM NOM EMAIL MDP DATE NAISSANCE ET GENRE
    $sql = "SELECT * FROM utilisateur WHERE  pseudo = '" .$Pseudo. "' and email = '" .$Email. "' and mdp = '" .$Mdp. "' and photo = '" .$PHOTO. "'";
    $result = mysqli_query($bdd, $sql);
    $row = mysqli_fetch_array($result);// $sql, $result, $row servent à checker si les données existe déja

    $sql2 = "SELECT * FROM utilisateur WHERE email = '$Email'";
    $result2 = mysqli_query($bdd, $sql2);// $sql2, $result2 servent à verifier un email est unique


    if($row == 0)
    {
        if(mysqli_num_rows($result2) == 0)//si la rows(result2) == 0 ca voudra dire que l'email est unique
        {
                if(strlen($Mdp) > 5)
                {


                        if(filter_var($Email, FILTER_VALIDATE_EMAIL))
                        {

                                if ($Mdp2 == $Mdp)
                                {
                                    //$Mdp = password_hash($Mdp, PASSWORD_DEFAULT);
                                    $sql3 = "INSERT INTO utilisateur(pseudo,email,mdp,photo) VALUES (" . "'" . $Pseudo . "','" . $Email . "','" . $Mdp . "','" . $PHOTO . "')";
                                    $result3 = mysqli_query($bdd, $sql3);//$sql3 et $result3 servent à envoyer les infos final à  la bdd
                                    header('Location:inscription.php?reg_err=success');
                                } else {header('Location:inscription.php?reg_err=MDP_retype');}

                        } else {header('Location:inscription.php');}
                } else {header('Location:inscription.php?reg_err=MDP_faible');}
        } else {header('Location:inscription.php?reg_err=invalide_email');}
    } else {header('Location:inscription.php?reg_err=already');}



    // $mysqli->error;


    // Va sur la page index une fois inscription terminé

}
?>

<?php
    if(isset($_GET['reg_err']))
    {
        $err = htmlspecialchars($_GET['reg_err']);
        switch($err)
        {
            case 'success':
                echo 'Bienvenue, vous etes inscrit';
                break;

            case 'already':

                echo 'Compte existant';

                break;

            case 'MDP_faible':
                echo 'Mot de passe faible';
                break;

            case 'MDP_retype':
                echo '2ème mot de passe différent';
                break;

            case 'invalide_email':
                echo 'Email déja utilisé';
                break;
        }
    }
?>


    <div class="formulaireinscription">


        <h2>Inscrivez vous !</h2>
        <form action="inscription.php" method="post">
            <section>
                <div>
                    <input type="file" name="photo" id = "photo1">
                </div>
                <div>
                    <input type="text" name="pseudo" placeholder="pseudo" required>
                </div>

                <div>
                    <input type="email" name="email" placeholder="Email" required>
                </div>


                <div>
                    <input type="password" name="password" placeholder="Password" required/>
                </div>

                <div>
                    <input type="password" name="password2" placeholder="Confirm Password" required/>

                </div>



            </section>
            <br />
            <input type="submit" value="Continuer" name="Inscription"><br>
            <a href="connexion.php">Déja un compte? Connectez vous!</a>
        </form>
    <div/>



        <?php
        include 'footer.php';
        ?>
</body>

</html>