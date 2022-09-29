<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
        <div class="center">    
        <h1>Inscription</h1>        
            <form action="inscri.php" method="POST">
                
                <div class="texte">
                    <input type="text" name="username" maxlength="13" required>
                    <span></span>
                    <label>Nom d'utilisateur</label>
                </div>
                
                <div class="texte">
                    <input type="email" name="email" required>
                    <span></span>
                    <label>Email</label>
                </div>
                
                <div class="texte">
                    <input type="password" name="password" required>
                    <span></span>
                    <label>Mot de passe</label>
                </div>

                <div class="texte">
                    <input type="password" name="paswordConf" required>
                    <span></span>
                    <label>Confirmer mot de passe</label>
                </div>

                <input type="submit" id='submit' value="INSCRIPTION" >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:red'>Nom d'utilisateur déja inscrit</p>";
                    }
                    if($err==2){
                        echo "<p style='color:red'>Mot de passe incorrect</p>";
                    }
                    if($err==3){
                        echo "<p style='color:red'>Echec d'inscription</p>";
                    }
                }
                ?>

                <div class="inscri">
                    <a href="index.php">Déjà un compte ? S'identifier</a>
                </div>
                
            </form>
        </div>
    </body>
</html>