<?php
session_start();
include('connect.php');
if(isset($_POST['valide_com'])){

    if(!empty($_POST['valide_com'])){
        $id_article = $_POST['id_article'];
        $contenue_com = mysqli_real_escape_string($db,htmlspecialchars($_POST['valide_com']));
        
        $requete="INSERT INTO commentaire (id_user, pseudo_user, id_article, contenue_com,date_publication) values (".$_SESSION['id'].", '".$_SESSION['username']."',  '".$id_article."',  '".$contenue_com."', Now())";    
        $exec_requete = mysqli_query($db,$requete);
        header('Location: ../afficher-article.php?id='.$id_article.'');
    }

}
?>