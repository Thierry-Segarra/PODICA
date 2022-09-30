<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="../css/loginstyle.css">
    </head>
    <body>
    <header>
            <?php
            session_start();
            include('header.php');
            ?>
        </header>
        <div class="center">    
        <h1>Création d'article</h1>        
            <form action="add-article-form.php" name='article' id='article' method="POST">
                
                <div class="texte">
                    <input type="text" name="titre" maxlength="128" required>
                    <span></span>
                    <label>Titre de votre article</label>
                </div>
                <div class="texte">
                    <textarea class='areatext' id="description" name="description"  placeholder="Description"></textarea>
                    <span></span>
                </div>

                <div class="texte">
                    <textarea class='areatext' id="contenu" name="contenu" placeholder="Contenu"></textarea>
                    <span></span>
                </div>
                
                <div class="texte">
                    <select name="categorie" id="categorie" form="article" onchange="traitement()">
                    <option selected>Catégorie</option>

                        <?php
                        include('../connect.php');
                        $requete = "SELECT * FROM categorie";
                        $exec_requete = mysqli_query($db,$requete) or die("Foobar");

                        while($row = mysqli_fetch_assoc($exec_requete)){
            
                            echo'<option value="' . $row["id_categorie"] . '">' . $row["nom"] . '</option>';
                            
                        };
                        ?>
                        
                    </select>
                    <span></span>
                </div>

                <div class="texte">
                    <select name="sous-categorie" id="sous-categorie" form="article">
                    <option id='aucun_sous_cat' value="aucun" selected>Sous-Catégorie</option>
                    <?php
                        include('../connect.php');
                        $requete = "SELECT * FROM `sous-categorie`";
                        $exec_requete = mysqli_query($db,$requete) or die("Foobar");
                        
                        while($row = mysqli_fetch_assoc($exec_requete)){
                            
                            echo'<option value="' . $row["id_sous_categorie"] . '" id="cat_' . $row["id_sous_categorie"].$row["id_cat"] . '" style="display:none">' . $row["nom"] . '</option>';
                            
                        };
                        ?>
                    
                    </select>
                    <span></span>
                </div>



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
                        echo "<p style='color:red'>Nom de l'article déja inscrit</p>";
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