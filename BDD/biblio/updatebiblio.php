<?php
include "../includes/database"
$servname="localhost";

if(@$_POST['id_bibliotheque']!=""){
  $id_bibliotheque = $_POST['id_bibliotheque'];
  $nom=$_POST['nom'];
  $adresse=$_POST['adresse'];
  $telephone=$_POST['telephone'];
  try{
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname",$dbuser,$dbpass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE bibliotheque set nom=:nom,adresse=:adresse,telephone=:telephone WHERE id_bibliotheque=:id_bibliotheque";
    $sth = $dbco->prepare($sql);

    $params=array(
      ':nom'=>$nom,
      ':adresse'=>$adresse,
      ':telephone'=>$telephone,
      ':id_bibliotheque'=>$id_bibliotheque,

    );

    $sth->execute($params);
      header('Location:bibliolist.php');
  }

  catch(PDOException $e){
    echo "Erreur : ". $e->getMessage();
  }
}
?>
