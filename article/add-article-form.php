<?php
session_start();
echo $_POST['titre'].'<br>'.$_POST['contenu'].'<br>'.$_POST['description'].'<br>'.$_POST['categorie'].'<br>'.$_POST['sous-categorie'].'<br>';
if(isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['description']) && isset($_POST['categorie']) && isset($_POST['sous-categorie']))
{
    // connexion à la base de données
    include('../Fonction_PHP_JS/connect.php');
    
    // on applique les troi fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $titre = mysqli_real_escape_string($db,htmlspecialchars($_POST['titre']));
    $contenu = mysqli_real_escape_string($db,htmlspecialchars($_POST['contenu']));
    $description = mysqli_real_escape_string($db,htmlspecialchars($_POST['description']));
    $categorie = mysqli_real_escape_string($db,htmlspecialchars($_POST['categorie']));
    $sous_categorie = mysqli_real_escape_string($db,htmlspecialchars($_POST['sous-categorie']));
    
    echo $titre.'<br>'.$contenu.'<br>'.$categorie.'<br>'.$description.'<br>'.$_SESSION['id'].'<br>'.$sous_categorie.'<br>';
    if($titre !== "" && $contenu !== "" && $description !== "" && $categorie !== "aucun" && $sous_categorie !== "aucun")
    {
            
        $requete = "SELECT count(titre) FROM article where titre = '".$titre."'";
        $exec_requete = mysqli_query($db,$requete) or die("Foobar");
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(titre)']; // si 0 = non utiliser si 1 = utiliser

        if($count==0) // !=0 si le nom_utilisateur et deja utiliser | == 0 si le nom_utilisateur n'est pas utiliser
        {   
            $requete = "INSERT INTO `article`(`id_categorie`,`id_sous_categorie`,`titre`, `description`,`contenue`,`id_user`,`date_publication`) VALUES ('".$categorie."','".$sous_categorie."','".$titre."','".$description."','".$contenu."',".$_SESSION['id'].", NOW())"; // id auto-increase
            $requete = mysqli_query($db,$requete) or die("Foobar2");// doit normalement executer la requete SQL
            if($requete){
                header('Location: ../index.php');
            }
            else
            {
                header('Location: add-article.php?erreur=3');
            }
        }
        else
        {
            header('Location: add-article.php?erreur=1');// nom d'utilisateur et deja inscrit
        }
    }
    else
    {
    header('Location: add-article.php?erreur=3'); // utilisateur ou mot de passe vide
    }
}
else
{
   //header('Location: add-article.php');
}
mysqli_close($db); // fermer la connexion
?>