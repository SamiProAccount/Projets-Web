<?php
include "../secure/secure.php";
include "../includes/database.php";
$id_users=$_GET['id_users'];

try{
$sql = "DELETE FROM Users WHERE id_users='$id_users'";
$sth = $dbco->prepare($sql);
$sth->execute();
  header('Location:userslist.php');
}

catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}
?>
