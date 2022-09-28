<!DOCTYPE html>
<html lang="fr">


<?php
include('connect.php');

if (isset($_GET['id']))

$requete = "SELECT * from article where id_article = " . $_GET['id']."";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
        
        echo'<div class="">
       <span> Contenu : ' . $reponse["contenue"] . '</span>
       </div>';


?>
<a href="signale.php?id-article=<?php echo $_GET['id'] ?>">signaler</a>

</html>
