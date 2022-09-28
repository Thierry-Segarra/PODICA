<!DOCTYPE html>
<html lang="fr">

<!--  -->
    <form action="recherche-article.php" id="article" method="POST">
        <label><b>Catégorie</b></label>
        <br>
        
        <select name="categorie" id="categorie" form="article">
            <option value="0">Tout</option>
            <?php
            include('connect.php');
            $requete = "SELECT * FROM categorie";
            $exec_requete = mysqli_query($db,$requete) or die("Foobar");

            while($row = mysqli_fetch_assoc($exec_requete)){

                echo'<option value="' . $row["id_categorie"] . '">' . $row["nom"] . '</option>';
                
            };
            ?>
            
        </select>
        <input type="text" id="rechercher" name="rechercher"></input>

        <input type="submit" id='submit' value="RECHERCHER" >              
    </form>


<?php

if(isset($_POST['categorie'])||isset($_GET['categorie'])){
    if(isset($_POST['categorie'])){
        $categorie = $_POST['categorie'];
    }else if(isset($_GET['categorie'])){
        $categorie = $_GET['categorie'];}

        $recherche = $_POST['rechercher'];
        if($categorie == 0){$requete="SELECT * from article where titre LIKE '%".$recherche."%'";}
        else{$requete="SELECT * from article where id_categorie =".$categorie." and  titre LIKE '%".$recherche."%'";}
        
        $exec_requete2 = mysqli_query($db,$requete);


    while($row = mysqli_fetch_assoc($exec_requete2)){
        
        echo'<div class="">
       <span> Titre : ' . $row["titre"] . '</span><br>
       <span> Descriptif : ' . $row["description"] . '</span><br>
       <span> Categorie : ' . $row["id_categorie"] . '</span><br>
       </div><br><br><br><br><br>';
        
    };

};
?>

</html>