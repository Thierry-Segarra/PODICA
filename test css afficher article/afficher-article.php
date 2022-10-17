<!DOCTYPE html>
<html lang="fr">

<head>
<?php include("header.php")?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-afficher-article.css">
  
    <title>Podica</title>
</head>

<?php

session_start();
include('connect.php');

if (isset($_GET['id']))

//Récupère l'identifiant de l'article
$idarticle = $_GET['id'];

$requete = "SELECT * from article where id_article = " . $_GET['id']."";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
        
        echo'<div class="article">
        <div class="row-pres">
        <p> Titre : ' . $reponse["titre"] .' </p>
        <p> Catégorie : ' . $reponse["id_categorie"] .' </p>
        </div>
        
        <div class="row-contenu">
       <p> Contenu : ' . $reponse["contenue"] . '</p>
       </div>
       <div class="row-dateps">
       <p> Pseudo : ' . $reponse["id_user"] .' </p>
       <p> Date : ' . $reponse["date_publication"] .' </p>
       </div>
       </div>';
?>

</br></br>

<?php
$requete1="Select id_commentaire, pseudo_user, contenue_com, id_user, id_article from commentaire where id_article=".$_GET['id']."";
$exec_requete1 = mysqli_query($db,$requete1) or die("Foobar");

while($row = mysqli_fetch_assoc($exec_requete1)){
    echo'<div class="commentaire">
    <div class="pseudo-commentaire">
    <p> Pseudo : ' . $row["pseudo_user"] . '<p>
    </div>

    <div class="contenu-commentaire">
    <p> Commentaire : </br>' . $row["contenue_com"] . '</p>
    </div>
    </div>';

    if($row["id_user"] == $_SESSION['id']){
    ?>
<br>
    <a href="supp_com.php?id=<?php echo $row["id_commentaire"]  ?>&id_article=<?php echo $row["id_article"]  ?>" style="border: solid 1px gray; border-radius:10px; text-decoration:none; padding:3px; background-color:gray;color:black" >Suprimer</a>


<?php
}
echo '</br></br></br>';
}

?>

<?php
include('commentaire.php')
?>
<div class="btn-signaler">
<a class="favorite styled" href="signal.php?id-article=<?php echo $_GET['id'] ?>">signaler</a>
</div>
<footer>
    <?php include("footer.php")?>
</footer>
</html>
