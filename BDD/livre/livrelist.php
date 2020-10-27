<!DOCTYPE html>

<html>

  <head>

      <title> LIVRELIST </title>

      <meta charset='utf-8'>
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link rel="stylesheet" href="css/livrelist.css">

    </head>

    <body>

      <h1> Cours PHP / MySQL </h1>
          <h3> Base de données MySQL </h3>

          <a class='btn btn-info btn-xs' href='?page=formcreatelivre'><span class='glyphicon glyphicon-edit'></span> Ajouter Livre </a>

          <div class="container">
              <div class="row col-md-6 col-md-offset-2 custyle">
                  <table class="table table-striped custab">

<?php

                      $servname = "localhost"; $dbname = "bd_sami_template_3"; $livre = "root"; $password = "";
                      try{$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $livre, $password);
                        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Sélectionne toutes les livres dans la table ppublier

                        $anyname = $dbco->prepare(
                          "SELECT livre.id_livre, livre.id_bibliotheque,livre.titre,livre.genre,livre.logolivre,auteur.nom
                              as auteur_name,editeur.nom
                              as editeur_name
                          FROM livre,publier,auteur,editeur
                          WHERE publier.id_livre=livre.id_livre
                              AND publier.id_auteur=auteur.id_auteur
                              AND publier.id_editeur=editeur.id_editeur");

                        $anyname->execute();

                        /*Retourne un tableau associatif pour chaque entrée de notre table avec le nom des colonnes sélectionnées en clefs*/
                        $resultat = $anyname->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($resultat as $row => $livre) {
                          echo "<tr>";

                          echo "<td>". $livre['id_livre']."</td>";
                          echo "<td>". $livre['id_bibliotheque']."</td>";
                          echo "<td>". $livre['titre']."</td>";
                          echo "<td>". $livre['genre']."</td>";
                          echo "<td>". $livre['auteur_name']."</td>";
                          echo "<td>". $livre['editeur_name']."</td>";
                          echo "<td> <img src='". $livre['logolivre']."'/></td>";

                          echo "<td> <a class='btn btn-info btn-xs' href='?page=formupdatelivre.php&&id_livre=".$livre['id_livre']."'><span class='glyphicon glyphicon-edit'></span> Edit </a>";
                          echo "<td> <a class='btn btn-danger btn-xs' href='".$path['deletelivre']."?id_livre=".$livre['id_livre']."'><span class='glyphicon glyphicon-remove'></span> Delete </a>";

                          echo "</tr>";

                      }

                      echo "</table>";

                    }

                  catch(PDOException $e){
                    echo "Erreur : ".$e->getMessage();

                  }

?>
            </div>
    </body>
</html>
