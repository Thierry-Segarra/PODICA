<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="css/style-header.css">
</head>
  <body>
   <nav>
    <ul class="menu">
      <a href="index.php?duck"><img alt="logo" class="img-header" src="image/Podica_logo.png"></a>
        <li>
          <a href="recherche-article.php?id_categorie=1&id_sous_categorie=0">Loisir</a>
          <ul class="sub-menu">
            <li><a href="recherche-article.php?id_categorie=1&id_sous_categorie=1">Esport</a></li>
            <li><a href="recherche-article.php?id_categorie=1&id_sous_categorie=2">Jeux vidéo</a></li>
            <li><a href="recherche-article.php?id_categorie=1&id_sous_categorie=3">Sport </a></li>
          </ul>
        </li>
        <li>
          <a href="recherche-article.php?id_categorie=2&id_sous_categorie=0">Programmation</a>
          <ul class="sub-menu">
            <li><a href="recherche-article.php?id_categorie=2&id_sous_categorie=4">Python</a></li>
            <li><a href="recherche-article.php?id_categorie=2&id_sous_categorie=5">Java</a></li>
            <li><a href="recherche-article.php?id_categorie=2&id_sous_categorie=6"> PHP</a></li>
            <li><a href="recherche-article.php?id_categorie=2&id_sous_categorie='7'">HTML</a></li>
            <li><a href="recherche-article.php?id_categorie=2&id_sous_categorie=8">Javascript</a></li>
          </ul>
        </li>
        <li>
        <a href="recherche-article.php?id_categorie=3&id_sous_categorie=0">Outil professionnel</a>          
          <ul class="sub-menu">
            <li><a href="recherche-article.php?id_categorie=3&id_sous_categorie=9">Excell</a></li>
            <li><a href="recherche-article.php?id_categorie=3&id_sous_categorie=10">Photoshop</a></li>
            <li><a href="recherche-article.php?id_categorie=3&id_sous_categorie=11">Indesign</a></li>
          </ul>
        </li>
        <li>
        <a href="recherche-article.php?id_categorie=4&id_sous_categorie=0">High-tech</a>
          <ul class="sub-menu">
            <li><a href="recherche-article.php?id_categorie=4&id_sous_categorie=12">Hardware</a></li>
            <li><a href="recherche-article.php?id_categorie=4&id_sous_categorie=13">Software</a></li>
          </ul>
        </li>
      <li>
      <a style="margin-left:5vw" id='button-submit' href="recherche-article.php">Recherche</a>
</li>
        <li style="float:right ; padding-right:25px">
          <?php
          
          session_start();
          if(isset($_SESSION['username'])){
            if($_SESSION['username'] != ""){

              echo $_SESSION['username'];
              ?>
              <img class="image-profil" src="image/pp.jpg" alt="image profil">
              <ul class="sub-menu">
              <?php
                if($_SESSION['role'] !== 'null'){
              ?>
                <li><a href="admin/index.php">Notif</a></li>
              <?php
                }
              ?>
                <li><a href="liste-mes-articles.php">Vos articles</a></li>
                <li><a href="parametre-compte.php">Paramètres</a></li>
                <li><a href="Fonction_PHP_JS/deco.php?deco=1">Deconnection</a></li>
            </ul>
            <?php
            }
          }else{
            ?>
            <a href="connection.php">S'inscrire / se connecter</a>
            <?php
          }
          ?>
          <?php
          if(isset($_GET['duck'])){
            ?>
            <audio id="duck">
            <source src="Fonction_PHP_JS/duck.ogg" type="audio/ogg" />
            </audio>
            <script>
            
            function duck(){
            var audio = document.getElementById('duck');
            audio.volume = 0.5; // on met le son au maximum
            audio.play(); // on lance le son
            }
            duck();
            </script>
            <?php
          }
          ?>
        </li>   
      </ul>
    </nav>
  </body>
<html>