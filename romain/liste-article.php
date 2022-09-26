<!DOCTYPE html>
<html lang="fr">

<?php
include('connect.php');
$i=0;
$requete = "SELECT count(*) from article";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
$count = $reponse['count(*)'];

if($count!=0){
        $requete2="Select * from article";
        $exec_requete2 = mysqli_query($db,$requete2);
    while($row = mysqli_fetch_assoc($exec_requete2)){
        
        echo'<div class="">
       <span><a href="afficher-article.php?id=' . $row["id_article"] . '"</a>  Titre : ' . $row["titre"] . '</span><br>
       <span><a href="afficher-article.php?id=' . $row["id_article"] . '" </a> Catégorie : ' . $row["id_categorie"] . '</span><br>
       <span><a href="afficher-article.php?id=' . $row["id_article"] . '" </a> Descrisption : ' . $row["description"] . '</span><br>
       <span><a href="afficher-article.php?id=' . $row["id_article"] . '" </a> Contenu: ' . $row["contenue"] . '</span><br>
       </div>';
    
    };

};
?>

</html>
