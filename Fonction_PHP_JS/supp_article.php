<?php
session_start();

require('connect.php');

if(isset($_GET['id']) and !empty($_GET['id'])){

    $requete= "select count(*) from article where id_article =".$_GET['id']."";
    $exec_requete1 = mysqli_query($db,$requete);
    $reponse = mysqli_fetch_array($exec_requete1);
    $count = $reponse['count(*)'];

    $requete2= "select * from article where id_article =".$_GET['id']."";
    $exec_requete2 = mysqli_query($db,$requete2);
    $reponse2 = mysqli_fetch_array($exec_requete2); 

    if($count !=  0){

        $info_utilisateur = $reponse2;
        print_r($info_utilisateur);
        if($info_utilisateur['id_user'] == $_SESSION['id'] || $_SESSION['role'] == 'admin'){

            $supparticle1="delete from article where id_article =".$_GET['id']." ";
            $exec_requete1 = mysqli_query($db,$supparticle1);

            $supparticle2="delete from commentaire where id_article =".$_GET['id']." ";
            $exec_requete2 = mysqli_query($db,$supparticle2);

            $supparticle3="delete from signaler where id_article =".$_GET['id']." ";
            $exec_requete3 = mysqli_query($db,$supparticle3);

            if($_SESSION['role'] != 'admin'){
                header('Location: liste-mes-articles.php');
            }else{
                header('Location: ../admin/index.php');
            }

        }else{
            echo "Vous n'êtes pas autorisé à supprimer un article qui ne vous appartient pas !";
        }

    }else{
        echo "Aucun article trouver";
    }

}else{
    echo "Aucun article trouver";
}