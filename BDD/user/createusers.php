<?php
    //On démarre une nouvelle session
    session_start();
    /*On utilise session_id() pour récupérer l'id de session s'il existe.
     *Si l'id de session n'existe  pas, session_id() rnevoie une chaine
     *de caractères vide*/
?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title> Create Users </title>

        <link rel="stylesheet"     href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384- Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>

        <!--lien pour les carrousels-->
        <link rel="stylesheet" href="assets/owl.carousel.min.css"/>
        <link rel="stylesheet" href="assets/owl.theme.default.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-    awesome.min.css">

        <link rel="stylesheet" href="css/formcreateusers.css"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    </head>

    <body>

               <!--    Connexion au serveur --- 1ére MéTHODE-->
<!--
        <h1>Bases de données MySQL</h1>
        <?php /*
        $servername = 'localhost';
        $username = 'root';
        $password = '';

        //On établit la connexion
        $conn = new mysqli($servername, $username, $password);

        //On vérifie la connexion
        if($conn->connect_error){
            die('Erreur : ' .$conn->connect_error);
        }
       echo 'Connexion réussie';
       */
?>
-->

                <!--        Connexion au serveur MéTHODE 2-->

        <h1>Bases de données MySQL</h1>
        <?php

        if(@$_POST['prenom']!="" && @$_POST['naissance']!="" && @$_POST['email']!="" ){

        // Vérifier si le formulaire est soumis
//        if ( @$_POST['prenom'] !=""  && @$_POST['nom'] !="" ) {
            /* récupérer les données du formulaire en utilisant
            la valeur des attributs name comme clé
            */
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $date = $_POST['naissance'];
            $telephone = $_POST['telephone'];
            $adresse = $_POST['adresse'];
            $pays = $_POST['pays'];
            $sexe = $_POST['sexe'];
            $email = $_POST['email'];
            $genre = $_POST['genre'];
            $pseudo = $_POST['pseudo'];
            $pass = $_POST['password'];


            $servername = 'localhost';
            $dbusername = 'root';
            $dbpassword = '';

            //On essaie de se connecter
            try{
                $conn = new PDO("mysql:host=$servername;dbname=bd_sami_template_3", $dbusername, $dbpassword);
                echo 'Connexion réussie';
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = "INSERT INTO Users(Prenom,Nom,Naissance,Telephone,Adresse,Pays,Sexe,Genres,Email,Identifiant,Role,Password)


         VALUES(:prenom,:nom,:date,:telephone,:adresse,:pays,:sexe,:genre,:email,:pseudo,:role,:pass)";

                $sth = $conn->prepare( $sql);

                $params=array(
                    ':prenom' => $prenom,
                    ':nom' => $nom,
                    ':date' => $date,
                    ':telephone' => $telephone,
                    ':adresse' => $adresse,
                    ':pays' => $pays,
                    ':sexe' => $sexe,
                    ':genre' => $genre,
                    ':email' => $email,
                    ':pseudo' => $pseudo,
                    ':pass' => $pass,
                    ':role' => "admin",);

                $sth->execute($params);
                header('Location:userslist.php');
               // $conn->exec($sql);
                echo 'Entrée ajoutée dans la table';

            }
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        }

        ?>
