<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podica</title>
</head>

<?php
include('connect.php');

if (isset($_GET['id']))

//Récupère l'identifiant de l'article
$idarticle = $_GET['id'];

$requete = "SELECT * from article where id_article = " . $_GET['id']."";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
        
        echo'<div class="">
       <span> Contenu : ' . $reponse["contenue"] . '</span>
       </div>';
?>

</br></br>

<?php
require('afficher_com.php');

while($row = mysqli_fetch_assoc($exec_requete1)){
    echo'<div class="">
    <span> Pseudo : ' . $row["pseudo_user"] . '</span><br>
    <span> Commentaire : </br>' . $row["contenue_com"] . '</span><br>
    </div>';
    ?>
    <a href="supp_com.php?id=<?php echo $row["id_commentaire"]  ?>" style="border: solid 1px gray; border-radius:10px; text-decoration:none; padding:3px; background-color:gray;color:black" >Suprimer</a>
</br></br></br>

<?php
}

?>

<?php
include('commentaire.php')
?>



</html>
