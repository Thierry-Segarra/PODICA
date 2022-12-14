<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    include('connect.php');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
      $pwd_peppered = hash_hmac("md5", $password, 7);

      $requete = "SELECT count(*) FROM user where pseudo = '".$username."' and mdp = '".$pwd_peppered."' ";
      $exec_requete = mysqli_query($db,$requete);
      $reponse      = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];

      $requete2 = "SELECT * FROM user where pseudo = '".$username."' and mdp = '".$pwd_peppered."' ";
      $exec_requete2 = mysqli_query($db,$requete2);
      $reponse2      = mysqli_fetch_array($exec_requete2);
      print_r($reponse2);

      if($count!=0) // nom d'utilisateur et mot de passe correctes
      {   
         $_SESSION['username'] = $username;
         $_SESSION['id'] = $reponse2['id_user'];


         if($reponse2['role'] == 'admin'){
            $_SESSION['role'] = 'admin';
            header('Location: ../index.php');
         }else{
            $_SESSION['role'] = 'null';
            header('Location: ../index.php');
         }
            
      }
      else
      {
         header('Location: ../connection.php?erreur=1'); // utilisateur ou mot de passe incorrect
      }

      
    }
    else
    {
       header('Location: ../connection.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: ../connection.php');
}
mysqli_close($db); // fermer la connexion
?>