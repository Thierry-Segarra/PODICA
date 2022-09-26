<?php

require('../action/database.php');

if(isset($_POST['valide_com'])){
    
    if(!empty($_POST['commentation'])){

        $contenue_com = nl2br(htmlspecialchars($_POST['commentation']));

        $insertcom = $bdd->prepare('INSERT INTO commentaire(contenue_com) VALUE(?)');
        $insertcom->execute(array($contenue_com));
    }
}