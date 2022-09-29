<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="css/loginstyle.css">
    </head>
    <body class="bodd">
        <header>
            <?php
            include('header.php');
            ?>
        </header>
    <?php
if(isset($_GET['deco'])){
    $deco = $_GET['deco'];
    if($deco==1){
        $_SESSION['id'] = "";
        $_SESSION['username'] = "";
        $_SESSION['role'] = "";
        $_SESSION = array();
        
        session_destroy(); 
        echo "<center><p style='color:green'>Vous êtes deconnecté</p></center>";
    }
}
if(isset($_GET['sup'])){
    echo "<p style='color:red'>Compte Supprimé</p>";
}
    
    ?>
    <footer>
    <?php
        include('footer.php');
    ?>
    </footer>
</body>
</html>
