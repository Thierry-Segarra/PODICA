<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Podica</title>
        <link rel="stylesheet" href="css/loginstyle.css">
    </head>
    <body>
        <header>
            <?php
            include('module/header.php');
            ?>
        </header>
        <br>
        <br>
        <div class="center" style="margin-top: 50px;">    
        <h1>Inscription</h1>        
            <form action="Fonction_PHP_JS/inscri.php" method="POST">
                
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
                    <input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{12,}$" required>
                    <span></span>
                    <label>Mot de passe</label>
                </div>

                <div class="texte">
                    <input type="password" name="passwordConf" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{12,}$" required>
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
                    <a href="connection.php">Déjà un compte ? S'identifier</a>
                </div>
                
            </form>
        </div>
    </body>
</html>