<?php
include "../secure/secure.php";
include "../includes/database.php";
 // Vérifier si le formulaire est soumis

         if(@$_POST['nom']!="" && @$_POST['adresse']!="" && @$_POST['telephone']!="" ){


     /* récupérer les données du formulaire en utilisant
        la valeur des attributs name comme clé
       */


     $nom = $_POST['nom'];
     $adresse = $_POST['adresse'];
     $telephone = $_POST['telephone'];

     // afficher le résultat
     //echo '<h3>Informations récupérées en utilisant POST</h3>';
    // echo 'prenom : ' . $prenom . ' Age : ' . $age . ' mail  : ' . $mail . ' Sexe : ' .$sexe . ' pays : ' . $pays;


            try{//On établit la connexion
          
                $sql = "INSERT INTO bibliotheque (id_bibliotheque,nom,adresse,telephone)
                        VALUES(:id_bibliotheque,:nom,:adresse,:telephone)";

                      $sth = $dco->prepare($sql);

                $params=array(
                                    ':id_bibliotheque' => $id_bibliotheque,
                                    ':nom' => $nom,
                                    ':adresse' => $adresse,
                                    ':telephone' => $telephone
               );

                $sth->execute($params);
				  header('Location::../admin/starter.php?page=bibliolist');
                //$conn->execute($sql);
                echo 'Entree ajoutee dans la table';

             }
             /*
                echo 'Entrée ajoutée dans la table';
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
                   // $conn->rollBack();
              echo "Erreur : " . $e->getMessage();
            }
    }
        ?>
