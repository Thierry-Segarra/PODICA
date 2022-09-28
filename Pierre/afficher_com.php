<?php

require('connect.php');

$requete="Select id_commentaire, pseudo_user, contenue_com, id_user, id_article from commentaire where id_article=".$_GET['id']."";
$exec_requete1 = mysqli_query($db,$requete);