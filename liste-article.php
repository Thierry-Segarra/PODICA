<!DOCTYPE html>
<html lang="fr">

<?php
include('connect.php');

$requete = "SELECT count(*) from article";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
$count = $reponse['count(*)'];

if($count!=0){

        $requete="Select titre, C.nom, description, contenue from article A INNER JOIN categorie C ON A.id_categorie = C.id_categorie";
        $exec_requete2 = mysqli_query($db,$requete);

    while($row = mysqli_fetch_assoc($exec_requete2)){
        
        echo'<div class="">
       <span> Titre : ' . $row["titre"] . '</span><br>
       <span> Catégorie : ' . $row["nom"] . '</span><br>
       <span> Descriptif : ' . $row["description"] . '</span><br>
       <span> Contenu: ' . $row["contenue"] . '</span> 
       </div><br><br><br><br><br>';
        
    };

};
?>

</html>