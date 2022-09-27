<?php
    session_start();
    include('connect.php');

         //include('connect.php');
        $motif = '';
        echo $_POST['article'];
        $id_article = $_POST['article'];
        echo '<br><br><br><br><br>';
        if(!empty($_POST['violent']))
        {
            
        $motif = $motif .','. $_POST['violent'];

        }
        if(!empty($_POST['pron']))
        {
            
      
        $motif = $motif .','. $_POST['pron'];

        }
        if(!empty($_POST['inappro']))
        {
           
      
        $motif = $motif .','. $_POST['inappro'];

        }
        if(!empty($_POST['rel']))
        {
            
      
        $motif = $motif .','. $_POST['rel'];

        }
        if(!empty($_POST['poli']))
        {
            
      
        $motif = $motif .','. $_POST['poli'];

        }
        if(!empty($_POST['other']))
        {
         
      
        $motif = $motif .','. $_POST['other'];

        }
        echo $motif;
    

        $requete = "INSERT INTO `signaler`(`motif`,`id_user`,`id_article`) VALUES ('".$motif."','".$_SESSION['id']."','".$id_article."')"; 
        $exec_requete = mysqli_query($db,$requete);

        $requete2 = " SELECT nb_signalement FROM article WHERE id_article = '".$id_article."'";
        $exec_requete2= mysqli_query($db,$requete2);
        $reponse = mysqli_fetch_array($exec_requete2);

        $nb_signale = $reponse['nb_signalement'] + 1;
        echo '<br><br><br><br>';
        echo $nb_signale;

        $requete3 = " UPDATE `article` SET nb_signalement = '".$nb_signale."' WHERE id_article = '".$id_article."'";
        $exec_requete3= mysqli_query($db,$requete3);



?>