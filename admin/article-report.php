<!DOCTYPE html>
<html lang="fr">

    <head>
        <title>Article reporté</title>
        <link rel="stylesheet" href="../css/style-artreport.css">
    <head>
    <body>
        
<?php
$id_article = $_GET['id_article'];
include('../Fonction_PHP_JS/connect.php');

$requete = "SELECT * from signaler where id_article=".$id_article."";
$exec_requete = mysqli_query($db, $requete);

?>

<?php echo '<button><a href="../afficher-article.php?id=' . $id_article . '">Lien article</a></button><br>'?>

<?php
while($row = mysqli_fetch_assoc($exec_requete)){
    $requete2 = "SELECT pseudo from user where id_user=".$row["id_user"]."";
    $exec_requete2 = mysqli_query($db, $requete2);
    $reponse2      = mysqli_fetch_array($exec_requete2);
    

    $motif = $row['motif'];
    $liste_motif = '<ul>';
    // Teste si la chaîne contient le mot
    if(strpos($motif, "1") != ""){
        $liste_motif = $liste_motif . '<li>Contenu violent</li>';
    }
    if(strpos($motif, "2") != ""){
        $liste_motif = $liste_motif . '<li>Contenu a caractère pornographique</li>';
    }
    if(strpos($motif, "3") != ""){
        $liste_motif = $liste_motif . '<li>Contenu innaproprié</li>';
    }
    if(strpos($motif, "4") != ""){
        $liste_motif = $liste_motif . '<li>Contenu a caractère religieux</li>';
    }
    if(strpos($motif, "5") != ""){
        $liste_motif = $liste_motif . '<li>Contenu a but politique</li>';
    }
    if(strpos($motif, "6") != ""){
        $liste_motif = $liste_motif . '<li>Autre...</li>';
    }
    $liste_motif = $liste_motif . '</ul>';
    
    echo'<br><div class="liste">
    
    <table>
      <tr>
        <u>Utiliseur : ' . $reponse2["pseudo"] . '<br><br>
        Motif : '.$liste_motif.'
        Details :</u> '.$row['detail'].'
      </tr>

    </table>
    </div><br>';
    
};


?>

</body>
</html>