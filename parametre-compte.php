<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
    <?php
        session_start();
        include('connect.php');
        $id_user = $_SESSION['id'];

        $requete = "SELECT * FROM user where id_user = ".$id_user."";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        ?>
        <div id="container">            
            <form action="parametre-compte-form.php" method="POST">
                <h1>Paramètres du compte</h1>
                
                <label><b>Changer le Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nouveau nom d'utilisateur" name="username" maxlength="13" >
                
                <label><b>Changer l'Email</b></label>
                <input type="email" placeholder="Entrer le nouvelle email" name="email">

                <label><b>Mot de passe actuel</b></label>
                <input type="password" placeholder="Entrer le mot de passe actuel" name="password" required>


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
                
                <a class="s" href = "index.php">accueil</a>
                
            </form>
        </div>
    </body>
</html>