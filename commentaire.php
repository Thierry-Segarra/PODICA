<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podica</title>
</head>

<body>

    <section>

        <form method="POST" action='envoie_com.php'>
            <label>Commentaire</label><br>
            <textarea name="valide_com"cols="30" rows="10"></textarea>
            <br>
            <input type="text" id="id_article" name="id_article" value="<?php echo $_GET['id']?>" style="display:none">
            <button type="submit" name="submit">Publier le commentaire</button>
        </form>

    </section>

</body>


</html>