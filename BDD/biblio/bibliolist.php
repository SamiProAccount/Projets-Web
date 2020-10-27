<?php
include "../secure/secure.php";
include "../includes/database.php";

?>
<!DOCTYPE html>

<html>

<!--  BibiloList.php (Cliquez sur Update)-> FormUpdateBiblio.php (Remplir les information puis cliquer envoyer)-> updatebiblio.php(modifie
les information dans la base puis redirige vers BiblioList.php) -->

    <head>

        <title> BIBLIOLIST </title>

        <meta charset='utf-8'>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="bibliolist.css">

    </head>

    <body>

        <h1> Cours PHP / MySQL </h1>
            <h3> Base de données MySQL </h3>

            <a class='btn btn-info btn-xs' href='?page=formcreatebiblio'><span class='glyphicon glyphicon-edit'></span> Nouvelle Bibliothèque </a>


        <div class="container">
            <div class="row col-md-6 col-md-offset-2 custyle">
                <table class="table table-striped custab">


                    <?php
                 
                    try{
                
                  //       Sélectionne toutes les valeurs dans la table bilbliotheque

                        $anyname = $dbco->prepare("SELECT id_bibliotheque,nom,adresse,telephone FROM bibliotheque");

                        $anyname->execute();



                        /*Retourne un tableau associatif pour chaque entrée de notre table
                        *avec le nom des colonnes sélectionnées en clefs*/

                        $resultat = $anyname->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($resultat as $row => $bibliotheque) {

                            echo "<tr>";

                            echo "<td>". $bibliotheque['id_bibliotheque']."</td>";
                            echo "<td>". $bibliotheque['nom']."</td>";
                            echo "<td>". $bibliotheque['adresse']."</td>";
                            echo "<td>". $bibliotheque['telephone']."</td>";


                            echo "<td> <a class='btn btn-info btn-xs' href='?page=formupdatebiblio&&id_bibliotheque=".$bibliotheque['id_bibliotheque']."'><span class='glyphicon glyphicon-edit'></span> Edit </a>";

                            echo "<td> <a class='btn btn-danger btn-xs' href='".$path['deletebiblio']."?id_bibliotheque=".$bibliotheque['id_bibliotheque']."'><span class='glyphicon glyphicon-remove'></span> Delete </a>";


                            echo "</tr>";

                        }

                        echo "</table>";

                        /*print_r permet un affichage lisible des résultats,
                        *<pre> rend le tout un peu plus lisible*/

                    }


                    catch(PDOException $e){

                        echo "Erreur : " . $e->getMessage();

                    }

                    ?>
                </table>
            </div>
</body>
</html>
