<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>FORMULAIRE</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>


        <!--lien pour les carrousels-->
        <link rel="stylesheet" href="assets/owl.carousel.min.css"/>
        <link rel="stylesheet" href="assets/owl.theme.default.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../user/formcreateusers.css"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    </head>

    <body>

        <h1>Formulaire HTML</h1>

        <form action="createusers.php" method="post">
            <div class="c100">
                <label for="prenom">Prénom : </label>
                <input type="text" id="prenom" name="prenom">
            </div>
            <div class="c100">
                <label for="nom">Nom : </label>
                <input type="text" id="nom" name="nom">
            </div>
            <div class="c100">
                <label for="date">Date de naissance : </label>
                <input type="date" id="date" name="naissance">
            </div><div class="c100">
                <label for="tel">Téléphone : </label>
                <input type="number" id="tel" name="telephone">
            </div><div class="c100">
                <label for="adresse">Adresse : </label>
                <input type="text" id="adresse" name="adresse">
            </div>
            <div class="c100">
                <label for="pays">Pays :</label>
                <select id="pays" name="pays">
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
            <div class="c100">
                <input type="radio" id="femme" name="sexe" value="femme">
                <label for="femme"> Femme </label>
                <input type="radio" id="homme" name="sexe" value="homme">
                <label for="homme"> Homme </label>
                <input type="radio" id="autre" name="sexe" value="autre">
                <label for="autre"> Autre </label>
            </div>
            <div class="c100">
                <label for="genre"> Genre(s) préféré(s) : </label>
                <input type="text" id="genre" name="genre">
            </div>
            <div class="c100">
                <label for="pseudo">Identifiant : </label>
                <input type="text" id="pseudo" name="pseudo">
            </div>
            <div class="c100">
                <label for="email">Email : </label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="username">Password : </label>
                <input type="password" id="username" minlength="8" required  name="password">
            </div>
            <div>
                <label for="pass">Re password (8 characters minimum):</label>
                <input type="password" id="pass" name="retypepassword"
                       minlength="8" required>
            </div>
            <div class="c100" id="submit" name="submit">
                <input type="submit" value="Envoyer">
            </div>
        </form>

    </body>

</html>
