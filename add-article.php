<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
        <div id="container">            
            <form action="add-article-form.php" id="article" method="POST">
                <h1>création d'article</h1>
                
                <label><b>Titre de votre article</b></label>
                <input type="text" placeholder="Entrer le titre" name="titre" maxlength="128" required>

                <label><b>Description</b></label>
                <div class='areatextdiv'>
                    <textarea class='areatext' id="description" name="description"></textarea>
                </div>
                <br>

                <label><b>Contenu</b></label>
                <div class='areatextdiv'>
                    <textarea class='areatext' id="contenu" name="contenu"></textarea>
                </div>
                <br>
                
                <label><b>Catégorie</b></label>
                <br>
                <select name="categorie" id="categorie" form="article">
                    <option value="null">aucune</option>
                </select>
                <br>

                <input type="submit" id='submit' value="POSTER" >
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