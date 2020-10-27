<?php
include "../includes/database.php";

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>FORMULAIRE</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>


        <!--lien pour les carrousels-->
        <link rel="stylesheet" href="assets/owl.carousel.min.css"/>
        <link rel="stylesheet" href="assets/owl.theme.default.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/formcreatelivre.css"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    </head>

    <body>

      <?php
                      			
                       // SELECTION BIBLIOTHEQUE

                      			$sql = "SELECT id_bibliotheque, nom FROM bibliotheque";
                      			$sth = $dbco->prepare($sql);
                            $sth->execute();
                      			$result = $sth->fetchAll(PDO::FETCH_ASSOC);

                      			 foreach ($result as $bi => $val){
                      				 @$optionbiblio .="<option value='".$val['id_bibliotheque']."'>".$val['nom']."
                               </option>";
                      			 }

                      // SELECTION AUTEUR
                             $sql = "SELECT id_auteur, nom FROM auteur";
                             $sth = $dbco->prepare($sql);
                             $sth->execute();
                             $result = $sth->fetchALL(PDO::FETCH_ASSOC);

                              foreach ($result as $bi => $val){
                       				 @$optionauteur .="<option value='".$val['id_auteur']."'>".$val['nom']."
                                </option>";
                              }

                      //  SELECTION EDITEUR
                              $sql = "SELECT id_editeur, nom FROM editeur";
                              $sth = $dbco->prepare($sql);
                              $sth->execute();
                              $result = $sth->fetchALL(PDO::FETCH_ASSOC);

                              foreach ($result as $bi => $val){
                                @$optionediteur .="<option value='".$val['id_editeur']."'>".$val['nom']."
                                </option>";
                              }



      ?>

      <h1>Formulaire HTML</h1>

        <form action="?page=createlivre" method="post" enctype="multipart/form-data">
            <div class="c100">
                <label for="titre"> Titre : </label>
                <input type="text" id="titre" name="titre">
            </div>
            <div class="c100">
                <label for="auteur"> Auteur(e) : </label>
                <select id="id_auteur" name="id_auteur">                                                 <!-- liste déroulante des bibliothèques disponibles-->
                <option value="">--Selectionnez auteur </option>
                   <?php
                   echo $optionauteur;
                    ?>
                </select>
                <a href=""> Ajouter auteur </a>
            </div>
            <div class="c100">
                <label for="logo"> Logo : </label>
                <input type="file" id="logolivre" name="logolivre">
            </div>
            <div class="c100">
                <label for="genre"> Genre : </label>
                <input type="text" id="genre" name="genre">
            </div>
            <div class="c100">
                <label for="editeur"> Editeur : </label>
                <select id="id_editeur" name="id_editeur">                                                 <!-- liste déroulante des bibliothèques disponibles-->
                <option value="">--Selectionnez editeur </option>
                   <?php
                   echo $optionediteur;
                    ?>
                  </select>
                  <a href=""> Ajouter éditeur </a>
            </div>
            <div class="c100">
                <label for="publication"> Date de Publication : </label>
                <input type="date" id="date_de_publication" name="date_de_publication">
            </div>
            <div class="c100">
                <label for="id_bibliotheque"> Bibliothèque : </label>
                    <select id="id_bibliotheque" name="id_bibliotheque">                                                 <!-- liste déroulante des bibliothèques disponibles-->
                    <option value="">--Selectionnez la bibliotheque</option>
                       <?php
                       echo $optionbiblio;
                        ?>
                    </select>
                    <a href="?page=formcreatelivre"> Ajouter Bibliothèque </a>
            </div>

                <input type="submit" value="Envoyer">

            </div>
        </form>
  </body>
  </html>
