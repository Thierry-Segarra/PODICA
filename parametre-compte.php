<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="css/loginstyle.css">
    </head>
    <body>
        <header>
            <?php
            include('header.php');
            ?>
        </header>
    <?php
        include('connect.php');
        $id_user = $_SESSION['id'];

        $requete = "SELECT * FROM user where id_user = ".$id_user."";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        ?>
        <div class="center">    
        <h1>Paramètres du compte</h1>      
            <form action="parametre-compte-form.php" method="POST">
                
                <div class="texte">
                    <input type="text" name="username" maxlength="13" required>
                    <span></span>
                    <label>Changer le Nom d'utilisateur</label>
                </div>
                
                <div class="texte">
                    <input type="email" name="email" required>
                    <span></span>
                    <label>Changer l'Email</label>
                </div>
                
                <div class="texte">
                    <input type="password" name="password" required>
                    <span></span>
                    <label>Mot de passe actuel</label>

                </div>

                <input type="submit" id='submit' value="Mettre à jour le compte" >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:red'>Nom d'utilisateur déja inscrit</p>";
                    }
                    if($err==2){
                        echo "<p style='color:red'>Email déja inscrit</p>";
                    }
                    if($err==3){
                        echo "<p style='color:red'>Mot de passe incorrect</p>";
                    }
                    if($err==4){
                        echo "<p style='color:red'>Echec de modification</p>";
                    }
                }
                ?>

                <div class="inscri">
                <a href = "index.php">Retour acceuil</a>
                </div>
                
            </form>
        </div>
    </body>
</html>