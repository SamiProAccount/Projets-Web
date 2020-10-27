<?php
include "../security/secure.php";
include "../includes/database.php";

 // Vérifier si le formulaire est soumis
//var_dump($_POST);
         if(@$_POST['nom']!="" && @$_POST['adresse']!="" && @$_POST['telephone']!="" ){


     // récupérer les données du formulaire en utilisant la valeur des attributs name comme clé
     $editeur = $_POST['id_editeur'];
     $nom=$_POST['nom'];
     $adresse=$_POST['adresse'];
     $telephone=$_POST['telephone'];

            try{                                                                           //On établit la connexion

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// INSERTION DANS LA TABLE EDITEUR
                $sql = "INSERT INTO editeur (id_editeur,nom,adresse,telephone)
                        VALUES(:id_editeur,:nom,:adresse,:telephone)";

                      $sth = $conn->prepare($sql);

                $params=array(

                                    ':id_editeur' => "$editeur",
                                    ':nom' => "$titre",
                                    ':adresse' => "$adresse",
                                    ':telephone' => "$telephone",
               );

                $sth->execute($params);

                $id_livre=$conn->lastInsertId();


				  //header('Location:livrelist.php');
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
