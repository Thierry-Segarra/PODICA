<?php
session_start();
if(isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['description']) && isset($_POST['categorie']))
{
    // connexion à la base de données
    include('../connect.php');
    
    // on applique les troi fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $titre = mysqli_real_escape_string($db,htmlspecialchars($_POST['titre']));
    $contenu = mysqli_real_escape_string($db,htmlspecialchars($_POST['contenu']));
    $description = mysqli_real_escape_string($db,htmlspecialchars($_POST['description']));
    $categorie = mysqli_real_escape_string($db,htmlspecialchars($_POST['categorie']));
    
    
    if($titre !== "" && $contenu !== "" && $description !== "" && $categorie !== "")
    {
            
        $requete = "SELECT * FROM article where titre = '".$titre."'";
        $exec_requete = mysqli_query($db,$requete) or die("Foobar");
        $reponse      = mysqli_fetch_array($exec_requete);

        if($reponse['id_user'] == $_SESSION['id']) // !=0 si le nom_utilisateur et deja utiliser | == 0 si le nom_utilisateur n'est pas utiliser
        {   
            echo $titre.'<br>'.$contenu.'<br>'.$categorie.'<br>'.$description.'<br>'.$_SESSION['id'].'<br>'.$_POST['id'].'<br>';
            $requete = "UPDATE `article` SET id_categorie= '".$categorie."', titre = '".$titre."', description = '".$description."', contenue = '".$contenu."' WHERE id_article = ".$_POST['id']." and id_user = ".$_SESSION['id'].""; // id auto-increase
            $requete = mysqli_query($db,$requete) or die("Foobar2");// doit normalement executer la requete SQL
            if($requete){
                header('Location: ../acceuil.php');
            }
            else
            {
                header('Location: ../inscription.php?erreur=3');
            }
        }
        else
        {
            header('Location: ../inscription.php?erreur=1');// nom d'utilisateur et deja inscrit
        }
    }
    else
    {
       header('Location: ../inscription.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: inscription.php');
}
mysqli_close($db); // fermer la connexion
?>