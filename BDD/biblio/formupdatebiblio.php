<?php
include "../secure/secure.php";
include "../includes/database.php";

$id_bibliotheque=$_GET['id_bibliotheque'];
try{
		

//       Sélectionne toutes les valeurs dans la table bilbliotheque

		$anyname = $dbco->prepare("SELECT id_bibliotheque,nom,adresse,telephone FROM bibliotheque where id_bibliotheque='$id_bibliotheque'");

		$anyname->execute();
		$resultat = $anyname->fetch(PDO::FETCH_ASSOC);
		$nom=	$resultat['nom'];
		$adresse=	$resultat['adresse'];
		$telephone=	$resultat['telephone'];
	}
	catch(PDOException $e){

			echo "Erreur : " . $e->getMessage();

	}
?>

		  	      <link rel="stylesheet" href="css/style.css">
							​
<h1>Formulaire HTML</h1>

				<form action="?page=updatebiblio" method="post">
​
							<input type="hidden" id="id_bibliotheque" name="id_bibliotheque" value="<?php echo $id_bibliotheque;?>">
​
            			<div class="c100">
                		<label for="nom"> Nom : </label>
                		<input type="text" id="nom" name="nom" value="<?php echo $nom;?>">
            			</div>

            			<div class="c100">
                		<label for="mail"> Email : </label>
                		<input type="adresse" id="adresse" name="adresse" value="<?php echo $adresse;?>">
            			</div>

            			<div class="c100">
                		<label for="telephone"> Telephone: </label>
                		<input type="telephone" id="telephone" name="telephone" value="<?php echo $telephone;?>">
            			</div>

            			<div class="c100" id="submit">
                		<input type="submit" value="Envoyer">
            			</div>

					</form>
