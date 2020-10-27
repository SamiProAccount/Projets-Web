<?php
$servname = "localhost"; $dbname = "bd_sami_template_3"; $dbuser = "root"; $dbpass = "";
var_dump($_POST);
  if(@$_POST['id_users']!=""){


	        $servername = 'localhost';
            $dbusername = 'root';
            $dbpassword = '';

			$id_users = $_POST['id_users'];
			$prenom=$_POST['prenom'];
			$email=$_POST['email'];
			$naissance=$_POST['naissance'];
			$sexe=$_POST['sexe'];
			$pays=$_POST['pays'];

try{

$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $dbuser, $dbpass);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE Users set prenom=:prenom,email=:email,naissance=:naissance,pays=:pays,sexe=:sexe WHERE id_users=:id_users";
echo $sql;
$sth = $dbco->prepare($sql);
$params=array(

                                    ':prenom' => $prenom,
                                    ':email' => $email,
									                  ':naissance' => $naissance,
                                    ':sexe' => $sexe,
                                    ':pays' => $pays,
                                    ':id_users' => $id_users,
									);

$sth->execute($params); 
  header('Location:userslist.php');
}

catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}

 }
?>
