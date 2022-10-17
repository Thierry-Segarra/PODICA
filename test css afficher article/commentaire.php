<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-commentaire.css">
    <title>Podica</title>
</head>

<body>

    <section>

        <form method="POST" action='envoie_com.php'>
            <div class="commentaire">
             <div class="titre">
                <label>Commentaire</label><br>
               </div>
                    <div class="textarea">
                    <textarea name="valide_com"cols="30" rows="1" style="resize:none; width:100%; height:200px; border:0"></textarea>
                    <br>
                    </div>
                        
                        <input type="text" id="id_article" name="id_article" value="<?php echo $_GET['id']?>" style="display:none">
                        <button type="submit" name="submit">Publier le commentaire</button>
                        </div>
        </form>

    </section>

</body>


</html>