<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="css/loginstyle.css">
    </head>
    <body>
    <header>
            <?php
            include('module/header.php');
            ?>
        </header>

        <div class="center">
            <h1>Connectez-vous</h1>
            <form action="Fonction_PHP_JS/verif.php" method="post">

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
                    
                }
                if(isset($_GET['sup'])){
                    echo "<p style='color:red'>Compte Supprimé</p>";
                }
                ?>

                
            </form>

        </div>

    </body>
</html>