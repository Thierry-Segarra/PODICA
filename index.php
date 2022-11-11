<!DOCTYPE html>
<html lang="fr">
    <head>
    <link rel="stylesheet" href="css/style-articles.css">
    <title>Podica</title>
    </head>
<body class="bodd">
<header>
<?php include('module/header.php')?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
</header>

    <div class="row-bienvenue">
        <div class="bienvenue">
        <h1 class="ml1">
        <span class="text-wrapper">
            <span class="line line1"></span>
            <span class="letters">Bienvenue sur Podica</span>
            <span class="line line2"></span>
        </span>
        </h1>
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

        $requete="Select id_article, titre, C.nom, description, U.pseudo, date_publication, SC.nom AS nom_sc from article A INNER JOIN categorie C ON A.id_categorie = C.id_categorie INNER JOIN user U ON A.id_user = U.id_user INNER JOIN `sous-categorie` SC ON A.id_sous_categorie = SC.id_sous_categorie";
        $exec_requete2 = mysqli_query($db,$requete);
       
 
        while($row = mysqli_fetch_assoc($exec_requete2)){
        echo'
            <div class="article">
            <div class="row-td">
       <a class="titre" href="afficher-article.php?id=' . $row["id_article"] . '">Titre : ' . $row["titre"]. '</a>
       <p> Date : ' . $row["date_publication"] . '</p></div>
       
       <div class="row-desc">
       <textarea id="newPoste" class="textarea_index" disabled>Description : ' . $row["description"] . '</textarea>
       </div>

       <div class="row-ncat">
            <p>Catégorie : ' . $row["nom"] . '</p>
            <p>Sous Catégorie : ' . $row["nom_sc"] . '</p>
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
<script>
  //Wrap every letter in a span
var textWrapper = document.querySelector('.ml1 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline()
  .add({
    targets: '.ml1 .letter',
    scale: [0.3,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 600,
    delay: (el, i) => 70 * (i+1)
  }).add({
    targets: '.ml1 .line',
    scaleX: [0,1],
    opacity: [0.5,1],
    easing: "easeOutExpo",
    duration: 700,
    offset: '-=875',
    delay: (el, i, l) => 80 * (l - i)
  })
</script>