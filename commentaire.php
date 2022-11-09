       <form method="POST" action='Fonction_PHP_JS/envoie_com.php' class="form-com">
            <div class="commentaire">
             <div class="titre">
                <label> Poster un commentaire</label><br>
               </div>
                    <div class="textarea">
                    <textarea name="valide_com"cols="30" rows="1" style="resize:none; width:100%; height:200px; border:0"></textarea>
                    <br>
                    </div>
                        
                        <input type="text" id="id_article" name="id_article" value="<?php echo $_GET['id']?>" style="display:none">
                        <button type="submit" name="submit">Publier le commentaire</button>
                        </div>
        </form>
