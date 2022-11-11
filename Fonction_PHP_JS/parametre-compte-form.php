<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
{
    // connexion à la base de données
    include('connect.php');
    
    // on applique les troi fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $user = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
    $email = mysqli_real_escape_string($db,htmlspecialchars($_POST['email']));
    $mdp = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));

    $lock = 0;
    
    if($user !== "" || $email !== "")
    {
            
        $pwd_peppered = hash_hmac("md5", $mdp, 7);

        $requete = "SELECT count(*) FROM user where id_user = '".$_SESSION['id']."' and mdp = '".$pwd_peppered."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
  
        if($count!=0) // verifier si user bon password
        {   
            echo $user.'<br>'.$email.'<br>';
            if($user !== "" ){
                    $requete2 = "SELECT count(pseudo) FROM user where pseudo = '".$user."'";
                    $exec_requete2 = mysqli_query($db,$requete2);
                    $reponse2      = mysqli_fetch_array($exec_requete2);
                    $count2 = $reponse2['count(pseudo)'];
                if($count2 ==0){

                    $requete = "UPDATE `user` SET pseudo = '".$user."'WHERE id_user = '".$_SESSION['id']."'"; // id auto-increase
                    $requete = mysqli_query($db,$requete) or die("Foobar2");// doit normalement executer la requete SQL
                    $lock = 1;

                }else{
                    header('Location: parametre-compte.php?erreur=1');
                }
            }

            if($email !== "" ){
                $requete3 = "SELECT count(email) FROM user where email = '".$email."'";
                $exec_requete3 = mysqli_query($db,$requete3);
                $reponse3      = mysqli_fetch_array($exec_requete3);
                $count3 = $reponse3['count(email)'];
            if($count3 ==0){

                    $requete = "UPDATE `user` SET email = '".$email."'WHERE id_user = '".$_SESSION['id']."'"; // id auto-increase
                    $requete = mysqli_query($db,$requete) or die("Foobar2");// doit normalement executer la requete SQL
                    $lock = 1;
            }else{
                header('Location: parametre-compte.php?erreur=2');
            }
        }
        if($lock != 0){
            $_SESSION['username'] = $user;
            header('Location: ../index.php');
        }
            
        }
        else
        {
           header('Location: ../parametre-compte.php?erreur=3'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: ../parametre-compte.php?erreur=4'); // utilisateur ou mot de passe vide
    }
    
}
else
{
   header('Location: ../parametre-compte.php');
}
mysqli_close($db); // fermer la connexion
?>