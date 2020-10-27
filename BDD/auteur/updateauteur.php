<?php
include "../security/secure.php";

include "../includes/database.php";
;
include "../includes/functions.php";

if(@$_POST['id_auteur']!=""){
  $auteur = $_POST['id_auteur'];
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $nationalite=$_POST['nationalite'];
  @$photo=uploadfile('photo_auteur',true);

  try{

 
  if($photo!=""){
    $sql = "UPDATE auteur set id_auteur=:id_auteur,nom=:nom,prenom=:prenom,nationalite=:nationalite WHERE auteur.id_auteur=:id_auteur";
    $sth = $dbco->prepare($sql);

    $params=array(
      ':id_auteur'=>$auteur,
      ':nom'=>$nom,
      ':prenom'=>$prenom,
      ':nationalite'=>$nationalite,
  
    );
   }
   else {
     $sql = "UPDATE auteur set id_auteur=:id_auteur,nom=:nom,prenom=:prenom,nationalite=:nationalite WHERE auteur.id_auteur=:id_auteur";
     $sth = $dbco->prepare($sql);

     $params=array(
       ':id_auteur'=>$auteur,
       ':nom'=>$nom,
       ':prenom'=>$prenom,
       ':nationalite'=>$nationalite,

     );
   }

    $sth->execute($params);
      header('Location:auteurlist.php');
  }

  catch(PDOException $e){
    echo "Erreur : ". $e->getMessage();
  }
}
?>
