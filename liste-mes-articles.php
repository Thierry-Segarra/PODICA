<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
<head>
<link rel="stylesheet" href="css/style-articles.css">
</head>
<body>
<header>
<?php include('header.php')?>
</header>

<a href="article v1/add-article.php"><input type="button" name="add_article" value="Ajouter un nouveau article"/></a><br><br>

<div class="wrapper-article">

<?php
include('connect.php');

$requete = "SELECT count(*) from article";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
$count = $reponse['count(*)'];

if($count!=0){

        $requete="Select id_article, titre, C.nom, description, U.pseudo, date_publication, SC.nom AS nom_sc from article A INNER JOIN categorie C ON A.id_categorie = C.id_categorie INNER JOIN user U ON A.id_user = U.id_user INNER JOIN `sous-categorie` SC ON A.id_sous_categorie = SC.id_sous_categorie WHERE A.id_user =".$_SESSION['id']."";
        $exec_requete2 = mysqli_query($db,$requete);
       
 
        while($row = mysqli_fetch_assoc($exec_requete2)){
        echo'
            <div class="article">
            <div class="row-td">
       <a class="titre" href="afficher-article.php?id=' . $row["id_article"] . '">Titre : ' . $row["titre"]. '</a>
       <p> Date : ' . $row["date_publication"] . '</p></div>
       
       <div class="row-desc">
       <textarea id="newPoste" class="textarea_index" disabled>Description : ' . $row["description"] . '</textarea>
       </div>

       <div class="row-ncat">
            <p>Catégorie : ' . $row["nom"] . '</p>
            <p>Sous Catégorie : ' . $row["nom_sc"] . '</p>
            <p>Auteur: ' . $row["pseudo"] . '</p>
       ';
       ?>
            <a href="afficher-article.php?id=<?php echo $row["id_article"] ?>"><input type="button" name="affiche_article" value="Afficher l'article"/></a>
            <a href="article v1/modifier-article.php?id=<?php echo $row["id_article"] ?>"><input type="button" name="modif_article" value="Modifier l'article"/></a>

            
            <a href="supp_article.php?id=<?php echo $row['id_article']?>" ><input type="button" name="supp_article" value="Supprimer l'article"/></a>
       <?php
       echo '</div></div>';
        
    };

};
?>
</div>
<footer>
    <?php include('footer.php')?>
</footer>
</body>

</html>