<?php
include "../secure/secure.php";
include "../includes/database.php";
$id_livre=$_GET['id_livre'];
try{
  $sql = "DELETE FROM livre WHERE id_livre='$id_livre'";

  $sth = $dbco->prepare($sql);
 $sth->execute();
 header('Location:../admin/starter.php?page=livrelist');
}catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}
?>
