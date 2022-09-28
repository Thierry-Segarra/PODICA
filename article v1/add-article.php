<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="../loginstyle.css">
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
                <select name="categorie" id="categorie" form="article" onchange="traitement()">
                <option selected>aucun</option>

                    <?php
                    include('../connect.php');
                    $requete = "SELECT * FROM categorie";
                    $exec_requete = mysqli_query($db,$requete) or die("Foobar");

                    while($row = mysqli_fetch_assoc($exec_requete)){
        
                        echo'<option value="' . $row["id_categorie"] . '">' . $row["nom"] . '</option>';
                        
                    };
                    ?>
                    
                </select>
                <br><br>
                <label><b>Sous-Catégorie</b></label>
                <br>
                
                <select name="sous-categorie" id="sous-categorie" form="article">
                <option id='aucun_sous_cat' value="aucun" selected>aucun</option>
                <?php
                    include('../connect.php');
                    $requete = "SELECT * FROM `sous-categorie`";
                    $exec_requete = mysqli_query($db,$requete) or die("Foobar");
                    
                    while($row = mysqli_fetch_assoc($exec_requete)){
                        
                        echo'<option value="' . $row["id_sous_categorie"] . '" id="cat_' . $row["id_sous_categorie"].$row["id_cat"] . '" style="display:none">' . $row["nom"] . '</option>';
                        
                    };
                    ?>
                    
                </select>


                <script>
                    function traitement(){
                        var liste, texte;
                        liste = document.getElementById("categorie");
                        texte = liste.options[liste.selectedIndex].value;

                        document.getElementById("sous-categorie").selectedIndex = "aucun";

                        let i = 1;
                        while(i <= 13){
                            
                            if(document.getElementById("cat_"+i+texte)){
                                document.getElementById("cat_"+i+texte).style.display='contents';
                            }else{
                                let a = 1;
                                while(a <= 4){
                                    if(a != texte){
                                        if(document.getElementById("cat_"+i+a)){
                                            document.getElementById("cat_"+i+a).style.display='none';
                                        }
                                    }
                                    a++;
                                }
                            }
                            i++;
                        };
                    }
                </script>

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