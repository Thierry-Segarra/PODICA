<!DOCTYPE html>
<html lang="fr">

<?php
include('../connect.php');

$requete = "SELECT count(*) from article where nb_signalement >=10";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
$count = $reponse['count(*)'];

if($count!=0){

        $requete2="Select id_article, titre, C.nom, description,id_user, nb_signalement, contenue from article A INNER JOIN categorie C ON A.id_categorie = C.id_categorie where nb_signalement >=10 order by nb_signalement desc ";
        $exec_requete2 = mysqli_query($db,$requete2);

    while($row = mysqli_fetch_assoc($exec_requete2)){
        $requete3 = "SELECT * from user where id_user ='". $row['id_user']."'";
        $exec_requete3 = mysqli_query($db, $requete3);
        $reponse3 = mysqli_fetch_array($exec_requete3);
        
        echo'<div style="border: solid black 2px">
       <a href="../afficher-article.php?id=' . $row["id_article"] . '">Titre : ' . $row["titre"] . '</a>
       <p>Catégorie : ' . $row["nom"] . '</p>
       <p>Descrisption : ' . $row["description"] . '</p>
       <p>Nombre de signalement ' . $row["nb_signalement"] . '</p>
       <p>Auteur : ' . $reponse3["pseudo"] . '</p>
       <a href="article-report.php?id_article=' . $row['id_article'] .'"> Voir les signalements</a>

       <a href="../supp_article.php?id=' . $row['id_article'] .'"> Suprimer article</a>
       </div><br><br>';
        
    };

}else{
    echo "pas d'article signaler";
};
?>

</html>