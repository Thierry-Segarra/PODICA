<!DOCTYPE html>
<html lang="fr">

<?php
include('connect.php');

$requete = "SELECT count(*) from article";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
$count = $reponse['count(*)'];

if($count!=0){

        $requete="Select id_article, titre, C.nom, description, contenue from article A INNER JOIN categorie C ON A.id_categorie = C.id_categorie";
        $exec_requete2 = mysqli_query($db,$requete);

    while($row = mysqli_fetch_assoc($exec_requete2)){
        
        echo'<div style="border: solid black 2px">
       <a href="afficher-article.php?id=' . $row["id_article"] . '">Titre : ' . $row["titre"] . '</a>
       <p>Catégorie : ' . $row["nom"] . '</p>
       <p>Descrisption : ' . $row["description"] . '</p>
       <p>Contenu: ' . $row["contenue"] . '</p>
       </div><br><br>';
        
    };

};
?>

</html>