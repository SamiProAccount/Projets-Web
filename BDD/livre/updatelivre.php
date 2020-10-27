<?php
$servname="localhost";
$dbname="bd_sami_template_3";
$dbuser="root";
$dbpass="";
include "../includes/functions.php";

if(@$_POST['id_livre']!=""){
  $livre = $_POST['id_livre'];
  $titre=$_POST['titre'];
  $auteur=$_POST['id_auteur'];
  $genre=$_POST['genre'];
  $editeur=$_POST['id_editeur'];
  $publication=$_POST['date_de_publication'];
  @$logo=uploadfile('logolivre',true);

  try{

    $dbco = new PDO("mysql:host=$servname;dbname=$dbname",$dbuser,$dbpass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if($logo!=""){
    $sql = "UPDATE livre,publier set titre=:titre,id_auteur=:id_auteur,genre=:genre,id_editeur=:id_editeur,date_de_publication=:date_de_publication,logo_livre=:logo_livre WHERE livre.id_livre=:id_livre and publier.id_livre =:id_livre";
    $sth = $dbco->prepare($sql);

    $params=array(
      ':titre'=>$titre,
      ':id_auteur'=>$auteur,
      ':id_editeur'=>$editeur,
      ':genre'=>$genre,
      ':logolivre'=>$logo,
      ':date_de_publication'=>$publication,
      ':id_livre'=>$livre

    );
   }
   else {
     $sql = "UPDATE livre,publier set titre=:titre,id_auteur=:id_auteur,genre=:genre,id_editeur=:id_editeur,date_de_publication=:date_de_publication WHERE livre.id_livre=:id_livre and publier.id_livre=:id_livre";
     $sth = $dbco->prepare($sql);

     $params=array(
       ':titre'=>$titre,
       ':id_auteur'=>$auteur,
       ':id_editeur'=>$editeur,
       ':genre'=>$genre,
       ':date_de_publication'=>$publication,
       ':id_livre'=>$livre

     );
   }

    $sth->execute($params);
      header('Location:livrelist.php');
  }

  catch(PDOException $e){
    echo "Erreur : ". $e->getMessage();
  }
}
?>
