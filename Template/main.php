        <!--Main-->
        <div class="container-fluid">

          <!--Blockitem-->
          <div class="row contenu">
            <div class="col-5 align-self-center blockitem mx-auto">
              <h1 class="anim1">GET SOME DATA</h1>
                <p class="anim2">Plug your database and <br> enjoy the ride</p>
              <button type="button" class="btn boutton">Primary</button>
            </div>
              <img src="../BootstrapTemplate/images/ordi.png" class="laptop col-3 mx-auto">
          </div>
          <div class="row no-gutter alert image p-0 m-0">
            <img src="../images/fondsvg.svg" class="fond-curvy col-12 p-0 m-0">
          </div>
          
          <!--Carroussel-->

          <!--Cards-->
          <div class="row">
            <h2 class="col-2 mx-auto toptrend">Top Trending</h2>
          </div>
          <div class="row roblock">
            <div class="card col-3 mx-auto border-0">
              <img class="card-img-top" src="../images/book1.jpg" alt="Card image cap">
              <div class="card-body border">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
          </div>
              <div class="card col-3 mx-auto border-0">
                <img class="card-img-top" src="../images/book2.jpg" alt="Card image cap">
                <div class="card-body border">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <div class="card col-3 mx-auto border-0">
                <img class="card-img-top" src="../images/book3.jpg" alt="Card image cap">
                <div class="card-body border">
                  <h5 class="card-title"></h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <div class="card col-3 mx-auto border-0">
                <img class="card-img-top" src="../images/book4.jpg" alt="Card image cap">
                <div class="card-body border">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
              

          </div>
        
        </div> 
     
        <?php

try{$// Sélectionne toutes les livres dans la table ppublier

  $anyname = $dbco->prepare(
          "SELECT livre.id_livre, livre.id_bibliotheque,livre.titre,livre.genre,livre.logolivre,auteur.nom
            as auteur_name,editeur.nom
            as editeur_name
            FROM livre,publier,auteur,editeur
            WHERE publier.id_livre=livre.id_livre
                AND publier.id_auteur=auteur.id_auteur
                AND publier.id_editeur=editeur.id_editeur");

          $anyname ->execute();
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