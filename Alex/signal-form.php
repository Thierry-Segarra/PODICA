<?php
    session_start();
    //include('connect.php');
    // $test = $_POST['other'];
    // print_r($test);
    echo $_POST['violent'];
    if(isset($_POST['violent']))
    {

        alert("bruh");
        echo $_POST['violente'];

    }else{
        echo'marche ta mere';
    }//== true){echo $test;}
   
    

    // $other = mysqli_real_escape_string($db,htmlspecialchars($_POST['other']));
    // $motif="3";
    // $requete = "INSERT INTO `signaler`(`motif`) VALUES ('".$motif."')"; 
    // $exec_requete = mysqli_query($db,$requete);
        $requete2 = " SELECT nb_signalement FROM article WHERE id_article = '".$id_article."'";
        $exec_requete2= mysqli_query($db,$requete2);
        $reponse = mysqli_fetch_array($exec_requete2);
        $reponse = $reponse +1 ;
        $requete3 = " UPDATE `article` SET nb_signalement = '".$reponse."' WHERE id_article = '".$id_article."'";
         

6

    
    
    
    
    
    // <p id="confirm"></p>
    //         <script>
    //             //Fonction confirmation//
                
    //             function myFunction() 
    //             {
    //                 document.getElementById("confirm").innerHTML = "Merci pour votre aide !";
    //                 alert("Merci pour votre aide !");
    //                 document.location.href="https://www.google.com";   //A remplacer avec l'URL du site web (Podica)
    //             }
    //             //Fonction quitter le signalement//
    //             function quitter()
    //             {
    //                 document.location.href="https://www.google.com";  //A remplacer avec l'URL du site web (Podica)
    //             }
    //         </script>
    
    
    
    
    
    
    
    //mysqli_close($db);


?>