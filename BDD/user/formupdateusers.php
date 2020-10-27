<?php
$servername = "localhost"; $dbname = "bd_sami_template_3"; $dbuser = "root"; $dbpass = "";
$id_users=$_GET['id_users'];

$dbco = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpass);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "select *  FROM Users WHERE id_users='$id_users'";
$sth = $dbco->prepare($sql);

$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);

$id_users=$result['id_users'];
$prenom=$result['prenom'];
$email=$result['email'];
$sexe=$result['sexe'];
$naissance=$result['naissance'];
$pays=$result['pays'];
?>

		  	      <link rel="stylesheet" href="css/userslist.css">

<h1>Formulaire HTML</h1>

        <form action="updateusers.php" method="post">

		<input type="hidden" id="id_users" name="id_users" value="<?php echo $id_users;?>">

            <div class="c100">
                <label for="prenom">Prénom : </label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $prenom;?>">
            </div>
            <div class="c100">
                <label for="mail">Email : </label>
                <input type="email" id="mail" name="mail" value="<?php echo $email;?>">
            </div>
            <div class="c100">
                <label for="naissance"> Date de Naissance : </label>
                <input type="date" id="naissance" name="naissance" value="<?php echo $naissance;?>">
            </div>


            <div class="c100">
                <input type="radio" id="femme" name="sexe" value="femme" <?php if($sexe=="femme")echo "checked";?>>
                <label for="femme">Femme</label>
                <input type="radio" id="homme" name="sexe" value="homme" <?php if($sexe=="homme")echo "checked";?>>
                <label for="homme">Homme</label>
                <input type="radio" id="autre" name="sexe" value="autre" <?php if($sexe=="autre")echo "checked";?>>
                <label for="autre">Autre</label>
            </div>
            <div class="c100">
                <label for="pays">Pays de résidence :</label>
                <select id="pays" name="pays">
				 <option value="<?php echo $pays?>"><?php echo $pays?></option>

                    <optgroup label="Europe">
                        <option value="france">France</option>
                        <option value="belgique">Belgique</option>
                        <option value="suisse">Suisse</option>
                    </optgroup>
                    <optgroup label="Afrique">
                        <option value="algerie">Algérie</option>
                        <option value="tunisie">Tunisie</option>
                        <option value="maroc">Maroc</option>
                        <option value="madagascar">Madagascar</option>
                        <option value="benin">Bénin</option>
                        <option value="togo">Togo</option>
                    </optgroup>
                    <optgroup label="Amerique">
                        <option value="canada">Canada</option>
                    </optgroup>
                </select>
            </div>
            <div class="c100" id="submit">
                <input type="submit" value="Envoyer">
            </div>
        </form>
