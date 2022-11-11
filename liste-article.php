<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="utf-8">
        <title>Podica</title>
        <link rel="stylesheet" href="css/loginstyle.css">
    </head>
<body>
<header>
<?php include('module/header.php')?>
<link rel="stylesheet" href="css/style-articles.css">
</header>

    <div class="row-bienvenue">
        <div class="bienvenue">
            <h1>Bienvenue sur Podica</h1>
        </div>
    </div>
    <br>

    <div class="wrapper-article">

<?php
include('Fonction_PHP_JS/connect.php');

$requete = "SELECT count(*) from article";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
$count = $reponse['count(*)'];

if($count!=0){

        $requete="Select id_article, titre, C.nom, description, U.pseudo, date_publication from article A INNER JOIN categorie C ON A.id_categorie = C.id_categorie INNER JOIN user U ON A.id_user = U.id_user";
        $exec_requete2 = mysqli_query($db,$requete);
       
 
        while($row = mysqli_fetch_assoc($exec_requete2)){
        echo'
            <div class="article">
            <div class="row-td">
       <a class="titre" href="afficher-article.php?id=' . $row["id_article"] . '">Titre : ' . $row["titre"]. '</a>
       <p> Date : ' . $row["date_publication"] . '</p></div>
       
       <div class="row-desc">
       <p>Descrisption : ' . $row["description"] . '</p>
       </div>

       <div class="row-ncat">
            <p>Catégorie : ' . $row["nom"] . '</p>
            <p>Auteur: ' . $row["pseudo"] . '</p>
       </div>
       </div>';
        
    };

};
?>
</div>
<footer>
    <?php include('module/footer.php')?>
</footer>
</body>
</html> 