<!DOCTYPE html>
<html>

  <head>

    <link rel="stylesheet" href="css/formcreatelivre.css">
​
  </head>

  <body>


    <?php

    $servername="localhost";$dbname="bd_sami_template_3";$dbuser="root";$dbpass = "";
            $id_livre=$_GET['id_livre'];
            try{
            		$dbco = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpass);
            		$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            //       Sélectionne toutes les valeurs dans la table livre

            		$anyname = $dbco->prepare("SELECT livre.id_livre, livre.id_bibliotheque,livre.titre,livre.genre,livre.logo_livre, publier.date_de_publication,auteur.nom
                    as auteur_name, auteur.id_auteur, editeur.nom
                    as editeur_name,editeur.id_editeur
                FROM livre,publier,auteur,editeur
                WHERE publier.id_livre=livre.id_livre
                    AND publier.id_auteur=auteur.id_auteur
                    AND publier.id_editeur=editeur.id_editeur and livre.id_livre='$id_livre'");

            		$anyname->execute();
            		$resultat = $anyname->fetch(PDO::FETCH_ASSOC);
            		$titre=	$resultat['titre'];
            		$auteur=	$resultat['id_auteur'];
            		$genre=	$resultat['genre'];
                $editeur=	$resultat['id_editeur'];
                $publication=$resultat['date_de_publication'];
                $bibliotheque=$resultat['id_bibliotheque'];
                $logo=$resultat['logolivre'];
            	}
            	catch(PDOException $e){

            			echo "Erreur : " . $e->getMessage();

            	}

    ?>


    <h1>Formulaire HTML</h1>

      <form action="?page=updatelivre" method="post" enctype="multipart/form-data">
​
        <input type="hidden" id="id_livre" name="id_livre" value="<?php echo $id_livre;?>">
​
          <div class="c100">
            <label for="titre"> Titre : </label>
            <input type="text" id="titre" name="titre" value="<?php echo $titre;?>">
          </div>

          <div class="c100">
            <label for="auteur"> Auteur : </label>
            <input type="text" id="id_auteur" name="id_auteur" value="<?php echo $auteur;?>">
          </div>
          <div class="c100">
              <label for="logo"> Logo : </label>
              <input type="file" id="logolivre" name="logolivre">
          </div>
          <div class="c100">
            <label for="genre"> Genre : </label>
            <input type="text" id="genre" name="genre" value="<?php echo $genre;?>">
          </div>

          <div class="c100">
            <label for="editeur"> Editeur : </label>
            <input type="text" id="id_editeur" name="id_editeur" value="<?php echo $editeur;?>">
          </div>
          <div class="c100">
              <label for="publication"> Date de Publication : </label>
              <input type="date" id="date_de_publication" name="date_de_publication">
          </div>
          <div class="c100">
              <label for="id_bibliotheque"> Bibliothèque : </label>
                  <input id="id_bibliotheque" name="id_bibliotheque" value="<?php echo $bibliotheque;?>">
          </div>
          <div class="c100" id="submit">
            <input type="submit" value="Envoyer">
          </div>

        </form>


</body>

</html>
