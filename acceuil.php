<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body class="bodd">
    <?php
    session_start();
    if($_SESSION['username'] != ""){
        $nom = $_SESSION['username'];
            echo '<p class="titre">Hello '. $nom .'</p>';
        echo'<a href="index.php?deco=1" class="deco">Déconnection</a> <br><br><br><a href="sup.php" class="deco">Suprimer Compte</a> <br><br><br> <a href="liste-article.php" class="deco">Voir vos articles </a><br> <a href="parametre-compte.php" class="deco">parametre compte </a>';
    
        if($_SESSION['role'] == 'admin'){
            echo 'hello my men<br>';
        }
    }
    else{
        header('Location: index.php');
    }

    
    ?>
</body>
</html>
