<?php
session_start();
require('connect.php');
if(isset($_POST['valide_com'])){
    
    if(!empty($_POST['espace_com'])){

//---nl2br->permet le saut de ligne---htmlspecialchars->permet de pas introduire des requêtes pour sécuriser le code---\\
        $contenue_com = nl2br(htmlspecialchars($_POST['espace_com']));

        $requete=" Insert into commentaire(id_user, pseudo_user, id_article, contenue_com) values (".$_SESSION['id'].", '".$_SESSION['username']."',  '".$idarticle."',  '".$contenue_com."')";    
        $exec_requete = mysqli_query($db,$requete);
    }

}