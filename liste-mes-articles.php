<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">

<?php
session_start();

require('connect.php');

    $requete=" Select id_article, titre, C.nom, description, contenue, date_publication from article A INNER JOIN categorie C ON A.id_categorie = C.id_categorie WHERE id_user =".$_SESSION['id']."";
    $exec_requete2 = mysqli_query($db,$requete);

     while($row = mysqli_fetch_assoc($exec_requete2)){
            
         echo'<div class="">
         <span> Titre : ' . $row["titre"] . '</span><br>
         <span> Catégorie : ' . $row["nom"] . '</span><br>
         <span> Descriptif : ' . $row["description"] . '</span><br>
         <span> Date de publication: ' . $row["date_publication"] . '</span> 
         </div><br>';
         ?>
            <input type="button" name="affiche_article" value="Afficher l'article"/>
            <input type="button" name="modif_article" value="Modifier l'article"/>
            <a href="supp_article.php?id=<?php echo $row['id_article']?>" ><input type="button" name="supp_article" value="Supprimer l'article"/></a>
     </br></br></br></br>
         <?php

            
     };
?>


</html>