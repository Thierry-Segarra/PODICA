<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>

        <div class="center">
            <h1>Connectez-vous</h1>
            <form action="verif.php" method="post">

                <div class="texte">
                    <input type="text" name="username" required>
                    <span></span>
                    <label>Nom d'utilisateur / E-mail</label>
                </div>

                <div class="texte">
                    <input type="password" name="password" required>
                    <span></span>
                    <label>Mot de passe</label>
                </div>


                <input type="submit" id='submit' value="Se connecter">

                <div class="inscri">
                    <a href="inscription.php">Pas de compte ? Inscrivez-vous !</a>
                </div>


                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2){
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                    if($err==3){
                        echo "<center><p style='color:green'>Inscription résussie !</p></center>";
                    }

                }
                if(isset($_GET['deco'])){
                    $deco = $_GET['deco'];
                    if($deco==1){
                        session_start();
                        $_SESSION['id'] = "";
                        $_SESSION['username'] = "";
                        $_SESSION = array();
                        
                        session_destroy(); 
                        echo "<center><p style='color:green'>Vous êtes deconnecté</p></center>";
                    }
                }
                if(isset($_GET['sup'])){
                    echo "<p style='color:red'>Compte Supprimé</p>";
                }
                ?>

                
            </form>

        </div>

    </body>
</html>