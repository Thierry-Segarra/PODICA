<!DOCTYPE html>
<html lang="fr">

<head>
<?php include("header.php")?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-afficher-article.css">
    <link rel="stylesheet" href="css/style-commentaire.css">

  
    <title>Podica</title>
</head>

<?php

include('connect.php');

if (isset($_GET['id']))

//Récupère l'identifiant de l'article
$idarticle = $_GET['id'];

$requete = "Select id_article, titre, C.nom, contenue, description, U.pseudo, date_publication, SC.nom AS nom_sc from article A INNER JOIN categorie C ON A.id_categorie = C.id_categorie INNER JOIN user U ON A.id_user = U.id_user INNER JOIN `sous-categorie` SC ON A.id_sous_categorie = SC.id_sous_categorie where id_article = " . $_GET['id']."";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
        
        echo'<div class="article">
        <div class="row-top">
        <div class="block-cat">
        <p> Catégorie : ' . $reponse["nom"] .' </p>
        <p> Sous catégoire : ' . $reponse["nom_sc"] .'</p>
        </div>
        

        <div class="block-date-aut">
        <p style=""> Date : ' . $reponse["date_publication"] .' </p>
        <p style=""> Par : ' . $reponse["pseudo"] .' </p>
        </div>
        </div>
        

        <div class="row-contenu">
        <div class="block-contenu">
        <p> Titre : ' . $reponse["titre"] .' </p>
        <textarea id="newPoste" class="form_input" name="topic" placeholder="Contenu du poste..." disabled>Contenu : ' . $reponse["contenue"] . '</textarea>
       </div>';  
 
?>
       <a class="favorite styled" href="signal.php?id-article=<?php echo $_GET['id'] ?>" style="border: solid 1px gray; border-radius:10px; text-decoration:none; padding:3px; margin-bottom:5px; background-color:red;color:white; float:left; text-align:right;">Signaler</a>
<?php
echo'</div></div> ';
?>
</br></br>

<div class="com"> 
<?php
echo'<p style="font-size: 30px; float:left; padding-left: 10px;"> Commentaire </p>';
$requete1="Select id_commentaire, pseudo_user, contenue_com, id_user, id_article, date_publication from commentaire where id_article=".$_GET['id']."";
$exec_requete1 = mysqli_query($db,$requete1) or die("Foobar");
if(isset($_SESSION['id'])){
include('commentaire.php');
}else{
    ?>
    <br>
    <?php
}
while($row = mysqli_fetch_assoc($exec_requete1)){
    
    echo'<div class="commentaire-art">
    <div class="pseudo-commentaire">
    <p style="float:left; width:75%; padding-left: 10px; padding-top: 10px"> Pseudo : ' . $row["pseudo_user"] . '<p>
    <p style="float:left; width:80%; text-align:right; padding-right: 10px; padding-top: 10px;"> Date : ' . $row["date_publication"] . '<p>
    </div>

    <div class="contenu-commentaire">
    <textarea id="newPoste" rows="8" class="form_input" name="topic" placeholder="Contenu du poste..." disabled>Contenu : ' . $row["contenue_com"] . '</textarea>
    ';
    if(isset($_SESSION['id'])){
        if($row["id_user"] == $_SESSION['id']){
    ?>
    <a href="supp_com.php?id=<?php echo $row["id_commentaire"]  ?>&id_article=<?php echo $row["id_article"]  ?>" style="border: solid 1px gray; border-radius:10px; text-decoration:none; padding:3px; margin-bottom:5px; background-color:red;color:white; float:left; text-align:right;">Suprimer</a>

<?php
    }
}
echo '</div></div></br></br></br>';
}

?>
</div>

<!-- <div class="btn-signaler"> -->
<!-- </div> -->
<footer>
    <?php include("footer.php")?>
</footer>
</html>
