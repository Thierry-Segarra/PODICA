<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="../loginstyle.css">
    </head>
    <body>
        <?php
        session_start();
        include('../connect.php');
        $id = $_GET['id'];
        $id_user = $_SESSION['id'];

        echo 'test value <br>';
        echo $id .'<br>';
        echo $id_user;

        $requete = "SELECT * FROM article where id = ".$id." AND id_user = ".$id_user."";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        ?>
        <div id="container">            
            <form action="modifier-article-form.php" id="article" method="POST">
                <h1>création d'article</h1>
                <input style="display: none" type="text" name="id" value='<?php echo $_GET['id'] ?>' required>
                <label><b>Titre de votre article</b></label>
                <input type="text" placeholder="Entrer le titre" name="titre" maxlength="128" value='<?php echo $reponse["titre"] ?>' required>

                <label><b>Description</b></label>
                <div class='areatextdiv'>
                    <textarea class='areatext' id="description" name="description"><?php echo $reponse["descriptif"] ?></textarea>
                </div>
                <br>

                <label><b>Contenu</b></label>
                <div class='areatextdiv'>
                    <textarea class='areatext' id="contenu" name="contenu"><?php echo $reponse["contenu"] ?></textarea>
                </div>
                <br>
                
                <label><b>Catégorie</b></label>
                <br>
                <select name="categorie" id="categorie" form="article">
                    <option value="<?php echo $reponse["categorie"] ?>">aucune</option>
                </select>
                <br>

                <input type="submit" id='submit' value="POSTER LES MODIFICATION" >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:red'>Nom d'utilisateur deja inscrit</p>";
                    }
                    if($err==2){
                        echo "<p style='color:red'>Mot de passe incorrect</p>";
                    }
                    if($err==3){
                        echo "<p style='color:red'>Echec d'inscription</p>";
                    }
                }
                ?>                
            </form>
        </div>
    </body>
</html>