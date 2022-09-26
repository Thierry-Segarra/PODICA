<?php
    session_start();
    require('../envoie_base/envoie_com.php');
?>

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

        <form method="POST">
            <label>Commentaire :</label>
            <textarea name="commentation"cols="30" rows="10"></textarea>
            <br>
            <button type="submit" name="valide_com">Publier le commentaire</button>
        </form>

    </section>

</body>


</html>