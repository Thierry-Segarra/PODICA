<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="css/stylesignalement.css" >
            <Title>Signalement</Title>
        </head>
    <body>
    <header>
            <?php
            include('module/header.php');
            if(isset($_SESSION['id'])){
            ?>
        </header>
      
        <form class="form" action="Fonction_PHP_JS/signal-form.php" method='POST'>
            <h1>SIGNALER CET ARTICLE</h1>
            <h3>Pourquoi signaler cet article ?</h3>
            <!---Cases a cocher-->
            
            <p><input type="checkbox" id="violent" value="1" name="violent" onclick="validate()">Contenu violent</p>
            <p><input type="checkbox" id="pron" value="2" name="pron" onclick="validate()">Contenu a caractère pornographique</p>
            <p><input type="checkbox" id="inappro" value="3" name="inappro" onclick="validate()">Contenu innaproprié</p>
            <p><input type="checkbox" id="rel" value="4" name="rel" onclick="validate()">Contenu a caractère religieux</p>
            <p><input type="checkbox" id="poli" value="5" name="poli" onclick="validate()">Contenu a but politique</p>
            <p><input type="checkbox" id="other" value="6" name="other" onclick="validate()">Autre...</p>
            <p><input type="text" id="article" value="<?php echo $_GET['id-article'] ?>" name="article" style='display: none'></p>
            <div id="textarea"></div>
            <div id="config"></div>

                <script>
                //Fonction de validation//
                function validate()
                {
                    //Si une case est cochée alors le bouton confirmer apparait//
                    if(violent.checked == 1 || pron.checked == 1|| inappro.checked == 1|| rel.checked == 1 || poli.checked == 1 || other.checked == 1)
                    {
                        document.getElementById('config').innerHTML='<input id="button-submit-signal" type="submit" name="submit" value="Signaler">';
                    }
                    else
                    {
                        document.getElementById('config').innerHTML='';
                    }
                    if(other.checked == 1)
                    {
                        document.getElementById('textarea').innerHTML= '<textarea id="detail"  class="textarea_signalement" name="detail" rows="8" placeholder="Zone de texte!" ></textarea>';
                    }
                    else
                    {
                        document.getElementById('textarea').innerHTML='';
                    }
                }
                </script>
            
             <a id="button-quitter" href="afficher-article.php?id=<?php echo $_GET['id-article'] ?>">Quitter</a>
            
        </form>
        <?php }else{
            header('Location: connection.php'); // utilisateur ou mot de passe vide
        }; ?>
    </body>
</html>
