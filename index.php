<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
        <div id="container">            
            <form action="verif.php" method="POST">
                <h1>Connectez-vous</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value="S'IDENTIFIER" >
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
                <p class="Inscriptiontext">Vous n'avez pas de Compte ?</p>
                <a class="s" href="inscription.php" >Incrivez-vous</a>
                
            </form>
        </div>
    </body>
</html>