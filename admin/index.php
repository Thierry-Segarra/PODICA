<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="../css/style-articles.css">
</head>
<body>
<header>
<?php 
session_start();
?>
</header>
<button><a href="../index.php">Retour</a></button>

<div class="wrapper-article">
<?php
include('../Fonction_PHP_JS/connect.php');

$requete = "SELECT count(*) from article where nb_signalement >=10";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
$count = $reponse['count(*)'];

if($count!=0){

        $requete="Select id_article, titre, C.nom, description, U.pseudo,nb_signalement, date_publication, SC.nom AS nom_sc from article A INNER JOIN categorie C ON A.id_categorie = C.id_categorie INNER JOIN user U ON A.id_user = U.id_user INNER JOIN `sous-categorie` SC ON A.id_sous_categorie = SC.id_sous_categorie where nb_signalement >=10 order by nb_signalement desc";
        $exec_requete2 = mysqli_query($db,$requete);
       
 
        while($row = mysqli_fetch_assoc($exec_requete2)){
        echo'
            <div class="article">
            <div class="row-td">
       <a class="titre" href="../afficher-article.php?id=' . $row["id_article"] . '">Titre : ' . $row["titre"]. '</a><br>
       Date : ' . $row["date_publication"] . '<br>
       Nombre de signalement ' . $row["nb_signalement"] . '</div>
       
       
       <div class="row-desc">
       <textarea id="newPoste" class="textarea_index" disabled>Description : ' . $row["description"] . '</textarea>

       </div>

       <div class="row-ncat">
            Catégorie : ' . $row["nom"] . '<br>
            Sous Catégorie : ' . $row["nom_sc"] . '<br>
            Auteur: ' . $row["pseudo"] . '<br>
            <a href="article-report.php?id_article=' . $row['id_article'] .'"> Voir les signalements</a>

       <a href="../Fonction_PHP_JS/supp_article.php?id=' . $row['id_article'] .'"> Suprimer article</a>
       </div>
       </div>';
        
    };

}else{
    echo "pas d'article signaler";
};
?>
</div>
</body>
</html>