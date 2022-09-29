<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="style-header.css">
</head>
  <body>
   <nav>
    <ul class="menu">
      <a href="accueil.php">
    <img alt="test" class="img-header" src="image/Podica_logo.png"> </a>
        <li>
          Loisir
          <ul class="sub-menu">
            <li><a href="recherche-article.php?id_categorie='1'&id_sous_categorie='1'">Esport</a></li>
            <li><a href="recherche-article.php?id_categorie='1'&id_sous_categorie='2'">Jeux vidéo</a></li>
            <li><a href="recherche-article.php?id_categorie='1'&id_sous_categorie='3'">Sport </a></li>
          </ul>
        </li>
        <li>
          Programmation
          <ul class="sub-menu">
            <li><a href="recherche-article.php?id_categorie='2'&id_sous_categorie='4'">Python</a></li>
            <li><a href="recherche-article.php?id_categorie='2'&id_sous_categorie='5'">Java</a></li>
            <li><a href="recherche-article.php?id_categorie='2'&id_sous_categorie='6'"> PHP</a></li>
            <li><a href="recherche-article.php?id_categorie='2'&id_sous_categorie='7'">HTML</a></li>
            <li><a href="recherche-article.php?id_categorie='2'&id_sous_categorie='8'">Javascript</a></li>
          </ul>
        </li>
        <li>
          Outil professionnel
          <ul class="sub-menu">
            <li><a href="recherche-article.php?id_categorie='3'&id_sous_categorie='9'">Excell</a></li>
            <li><a href="recherche-article.php?id_categorie='3'&id_sous_categorie='10'">Photoshop</a></li>
            <li><a href="recherche-article.php?id_categorie='3'&id_sous_categorie='11'">Indesign</a></li>
          </ul>
        </li>
        <li>
          High-tech
          <ul class="sub-menu">
            <li><a href="recherche-article.php?id_categorie='4'&id_sous_categorie='12'">Hardware</a></li>
            <li><a href="recherche-article.php?id_categorie='4'&id_sous_categorie='13'">Software</a></li>
          </ul>
        </li>
      <li>  
       <form action='recherche-article.php' id='search-form' method='POST'>  
         <input name='categorie' value='0' type='text' style="display:none"/>
         <input id='button-submit' type='submit' value='Recherche'/>
      </form>
</li>
        <li style="float:right ; padding-right:25px">
        Profil
          <ul class="sub-menu">
            <li><a href="../admin/index.php">Notif</a></li>
            <li><a href="liste-mes-articles.php">Vos articles</a></li>
            <li><a href="parametre-compte.php">Paramètres</a></li>
            <li>Deconnection</li>
        </ul>
      </li>    
      </ul>
    </nav>
  </body>
<html>