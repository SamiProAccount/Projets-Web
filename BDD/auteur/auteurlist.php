<?php
include "../secure/secure.php";

include "../includes/database.php";

?>
<!DOCTYPE html>

<html>

  <head>

      <title> AUTEURLIST </title>

      <meta charset='utf-8'>
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link rel="stylesheet" href="../livre/livre.css">

    </head>

    <body>

      <h1> Cours PHP / MySQL </h1>
          <h3> Base de données MySQL </h3>

          <a class='btn btn-info btn-xs' href='?page=formauteur'><span class='glyphicon glyphicon-edit'></span> Ajouter Auteur </a>

          <div class="container">
              <div class="row col-md-6 col-md-offset-2 custyle">
                  <table class="table table-striped custab">

<?php

                      try{// Sélectionne tous les auteurs dans la table auteur

                        $anyname = $dbco->prepare(
                          "SELECT auteur.id_auteur, auteur.prenom, auteur.nationalite, auteur.nom
                              as auteur_name
                          FROM auteur
                          WHERE auteur.id_auteur=auteur.id_auteur");

                        $anyname->execute();

                        /*Retourne un tableau associatif pour chaque entrée de notre table avec le nom des colonnes sélectionnées en clefs*/
                        $resultat = $anyname->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($resultat as $row => $auteur) {
                          echo "<tr>";

                          echo "<td>". $auteur['id_auteur']."</td>";
                          echo "<td>". $auteur['prenom']."</td>";
                          echo "<td>". $auteur['nationalite']."</td>";
                          echo "<td>". $auteur['auteur_name']."</td>";
                          echo "<td> <a class='btn btn-info btn-xs' href='?page=formauteur&&?id_auteur=".$auteur['id_auteur']."'><span class='glyphicon glyphicon-edit'></span> Edit </a>";
                          echo "<td> <a class='btn btn-danger btn-xs' href='".$path['deleteauteur']."?id_auteur=".$auteur['id_auteur']."'><span class='glyphicon glyphicon-remove'></span> Delete </a>";

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
