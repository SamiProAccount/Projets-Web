<?php
include "../security/secure.php";

$servername = "localhost"; $dbname = "bd_megane_biblio"; $dbuser = "root"; $dbpass = "";

 // Vérifier si le formulaire est soumis
//var_dump($_POST);
         if(@$_POST['nom']!="" && @$_POST['prenom']!="" && @$_POST['nationalite']!="" ){


           //  Importer une image sur le serveur.
              function uploadfile($fieldName){

          //  target => dossier cible           basename => connaître le nom de fichier importé.
           	   $target_dir = "uploads/";
           $target_file = $target_dir . basename($_FILES[$fieldName]["name"]);
           $uploadOk = 1;
           //            strtolower=> Converti les caractères en minuscule (ex : JPG devient jpg)
           $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

           // Check if image file is a actual image or fake image

             $check = getimagesize($_FILES[$fieldName]["tmp_name"]);
             if($check !== false) {
               echo "File is an image - " . $check["mime"] . ".";
               $uploadOk = 1;
             } else {
               echo "File is not an image.";
           	return null;
               $uploadOk = 0;
             }


           // Check if file already exists
           if (file_exists($target_file)) {
             echo "Sorry, file already exists.";
             return null;
             $uploadOk = 0;
           }

           // Check file size
           if ($_FILES[$fieldName]["size"] > 500000) {
             echo "Sorry, your file is too large.";
             return null;
             $uploadOk = 0;
           }

           // Allow certain file formats
           if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
           && $imageFileType != "gif" ) {
             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
             return null;
             $uploadOk = 0;
           }

           // Check if $uploadOk is set to 0 by an error
           if ($uploadOk == 0) {
           	return null;
             echo "Sorry, your file was not uploaded.";

           // if everything is ok, try to upload file
           } else {
             if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $target_file)) {
           	  return $target_file;

             //  echo "The file ". htmlspecialchars( basename( $_FILES[$fieldName]["name"])). " has been uploaded.";
             } else {
           	  return null;
               echo "Sorry, there was an error uploading your file.";
             }
           }
           return $target_file;

              }

     // récupérer les données du formulaire en utilisant la valeur des attributs name comme clé
     $auteur = $_POST['id_auteur'];
     $nom=$_POST['nom'];
     $prenom=$_POST['prenom'];
     $nationalite=$_POST['nationalite'];

     // changement fonction pour fichier
     @$photo=uploadfile('photo_auteur',true);



            try{                                                                           //On établit la connexion
            $conn = new PDO("mysql:host=$servername;dbname=bd_megane_biblio", $dbuser, $dbpass);
             echo 'Connexion réussie';

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// INSERTION DANS LA TABLE AUTEUR
                $sql = "INSERT INTO auteur (id_auteur,nom,prenom,photo_auteur)
                        VALUES(:id_auteur,:nom,:prenom,:photo_auteur)";

                      $sth = $conn->prepare($sql);

                $params=array(

                                    ':id_auteur' => "$auteur",
                                    ':nom' => "$nom",
                                    ':prenom' => "$prenom",
                                    ':nationalite' => "$nationalite",
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
