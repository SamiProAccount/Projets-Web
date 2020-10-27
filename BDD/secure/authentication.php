<?php

session_start();
include "../includes/database.php";
include "../includes/functions.php";

if(@$_POST['email']!=""){
try{

    $email=securisation($_POST['email']);
    $password=securisation($_POST['password']);
    $sql = "SELECT * FROM users WHERE email='$email'";


    $sth = $dbco->prepare($sql);
   $sth->execute();
    $resultat = $sth->fetch(PDO::FETCH_ASSOC);
    if($sth->rowCount()>0){

         $actualpassword=$resultat["password"];
         $prenom=$resultat["prenom"];
         $role=$resultat["role"];

          if($actualpassword==$password){

              $_SESSION["user_firstname"]=$prenom;
              $_SESSION["user_email"]=$email;
              $_SESSION["role"]=$role;
               header("location:../admin/starter.php");
              exit();
          }
        else{

            $_SESSION["error_message"]="Password doesn't match";
            /*echo "Password doesn't match";*/
        }


    }
    else {

        $_SESSION["error_message"]="User not found";
        //echo "user not found";
     }
   }
	catch(PDOException $e){

	   echo "Erreur : " . $e->getMessage();

	}


 }
 else {

        $_SESSION["error_message"]="Enter your email";
        //echo "user not found";
    }
 header("location:login.php");
