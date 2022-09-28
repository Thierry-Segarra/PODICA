<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=podica;charset=utf8;', 'root', '');
}catch(Exception $e){
    die('Erreur de connexion à la base de donnée : ' . $e->getMessage());
}
