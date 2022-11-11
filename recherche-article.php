<!DOCTYPE html>
<html lang="fr">
    <title>Podica</title>
    <head>
    <link rel="stylesheet" href="css/stylesearch.css">
</head>

<body>
<header>
<?php include('module/header.php')?>
</header>
    <form class="form" action="recherche-article.php" id="article" name="article" method="POST">
        <a class="barresearch"><u>Rechercher un article :</u><input type="text" id="rechercher" name="rechercher" placeholder="Rechercher..."></input></a>
        <a class="searching"><input type="submit" id='submit' value="RECHERCHER" ></a>
        <br>
        <div class="catego">
            <br><label><b>Catégorie :</b></label></br>
            <br>
            <select name="categorie" id="categorie" form="article" onchange="traitement()">
                <option value="0">Tout</option>
                <?php
                include('Fonction_PHP_JS/connect.php');
                $requete = "SELECT * FROM categorie";
                $exec_requete = mysqli_query($db,$requete) or die("Foobar");

                while($row = mysqli_fetch_assoc($exec_requete)){

                    echo'<option value="' . $row["id_categorie"] . '">' . $row["nom"] . '</option>';
                    
                };
                ?>
                
            </select><br>
            <br><label><b>Sous-Catégorie :</b></label></br>
            <br>
            <select name="id_sous_categorie" id="id_sous_categorie" form="article">
                <option value="0">Tout</option>
                <?php
                $requete2 = "SELECT * FROM `sous-categorie`";
                $exec_requete2 = mysqli_query($db,$requete2) or die("Foobar2");

                while($row2 = mysqli_fetch_assoc($exec_requete2)){
                    echo'<option value="' . $row2["id_sous_categorie"] . '" id="cat_' . $row2["id_sous_categorie"].$row2["id_cat"] . '" style="display:none">' . $row2["nom"] . '</option>';
                };
                ?>
                
            </select>
        </div>
                     
    </form>
    

<?php
if((isset($_POST['categorie']) && isset($_POST['id_sous_categorie'])) || (isset($_GET['id_categorie']) && isset($_GET['id_sous_categorie']))){
    if(isset($_POST['categorie'])){
        $categorie = $_POST['categorie'];
    }else if(isset($_GET['id_categorie'])){
        $categorie = $_GET['id_categorie'];
    }


    if(isset($_POST['id_sous_categorie'])){
        $sous_categorie = $_POST['id_sous_categorie'];
    }else if(isset($_GET['id_sous_categorie'])){
        $sous_categorie = $_GET['id_sous_categorie'];
    }


    if(isset($_POST['rechercher'])){
        $recherche = $_POST['rechercher'];
    }else{
        $recherche = '';
        
    }
        

        if($categorie == 0){
            $requete="Select id_article, date_publication,titre, C.nom, description,U.pseudo, contenue , SC.nom AS nom_sc from article A INNER JOIN categorie C ON A.id_categorie = C.id_categorie INNER JOIN user U ON A.id_user = U.id_user INNER JOIN `sous-categorie` SC ON A.id_sous_categorie = SC.id_sous_categorie where titre LIKE '%".$recherche."%'";

        }
        else if($sous_categorie != 0){
            $requete="Select id_article, date_publication, titre, C.nom, description,U.pseudo, contenue , SC.nom AS nom_sc from article A INNER JOIN categorie C ON A.id_categorie = C.id_categorie INNER JOIN `sous-categorie` S ON A.id_sous_categorie = S.id_sous_categorie INNER JOIN user U ON A.id_user = U.id_user INNER JOIN `sous-categorie` SC ON A.id_sous_categorie = SC.id_sous_categorie where A.id_categorie =".$categorie." and A.id_sous_categorie =".$sous_categorie." and  titre LIKE '%".$recherche."%'";
        }else {
            $requete="Select id_article, date_publication, titre, C.nom, description,U.pseudo, contenue ,  SC.nom AS nom_sc from article A INNER JOIN categorie C ON A.id_categorie = C.id_categorie INNER JOIN user U ON A.id_user = U.id_user INNER JOIN `sous-categorie` SC ON A.id_sous_categorie = SC.id_sous_categorie where A.id_categorie =".$categorie." and  titre LIKE '%".$recherche."%'";
        }
        
        $exec_requete2 = mysqli_query($db,$requete);

        echo '<div class="wrapper-article">';
    while($row = mysqli_fetch_assoc($exec_requete2)){

       echo'<div class="article">
        <div class="row-td">
        <a class="titre" href="afficher-article.php?id=' . $row["id_article"] . '">Titre : ' . $row["titre"]. '</a>
        <p> Date : ' . $row["date_publication"] . '</p></div>
        
        <div class="row-desc">
        <p>Descrisption : ' . $row["description"] . '</p>
        </div>

        <div class="row-ncat">
            <p>Catégorie : ' . $row["nom"] . '</p>
            <p>Sous Catégorie : ' . $row["nom_sc"] . '</p>
            <p>Auteur: ' . $row["pseudo"] . '</p>
        </div>
        </div>';
        
       
    };

};
?>
</div>
<script>
    function traitement(){
        var liste, texte;
        liste = document.getElementById("categorie");
        texte = liste.options[liste.selectedIndex].value;

        document.getElementById("sous-categorie").selectedIndex = 0;

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
<footer>
    <?php include('module/footer.php')?>
</footer>
</body>

</html>