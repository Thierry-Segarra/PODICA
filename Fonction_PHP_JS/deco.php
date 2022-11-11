<?php
$deco = $_GET['deco'];
if($deco==1){
    session_start();

    $_SESSION['id'] = "";
    $_SESSION['username'] = "";
    $_SESSION = array();
    
    session_destroy(); 
    header('Location: ../index.php?deco');
    
}
?>