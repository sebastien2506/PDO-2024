<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/MyCSS.css">
</head>
<body>
<!--
On veut construire un formulaire de contact avec les champs suivants :
- le nom
- le prénom
- un groupe de radio-boutons pour le genre (homme/femme)
- une zone de texte pour un message de maximum 1024 caractères
- une liste déroulante avce la langue parlée (français/néerlandais/anglais)
- une case à cocher pour valider le stockage des données (RGPD)
- un bouton d'envoi    
-->
    <h1>Formulaire de contact</h1>
    <form action="" method="post">
        <div>
        <div id="colonne_gauche">
            <div id="lenom">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" required>
            </div>
            <div id="leprenom">
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom" required>
            </div>
            <div id="ddn">
                <label for="ddn">Date de naissance :</label>
                <input type="date" id="ddn1" name="user_ddn" required>
            </div>
            <div id="legenre">
                <fieldset>
                    <legend>&nbsp;Genre&nbsp;</legend>
                    <div>
                        <input type="radio" name="genre" id="homme" value="H" checked>
                        <label for="homme">Homme</label>
                    </div>
                    <div>
                        <input type="radio" name="genre" id="femme" value="F">
                        <label for="femme">Femme</label>
                    </div>
                </fieldset>
            </div>
            <div id="lalangue">
                <label for="langue">Langue :</label>
                <select name="langue" id="langue">
                    <option value="FR">Français</option>
                    <option value="NL">Nederlands</option>
                    <option value="DE">Deutsch</option>
                    <option value="EN">English</option>
                </select>
            </div>
        </div>
        <div id="colonne_droite">
            <div id="username">
                <label for="username">Pseudo :</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div id="email">
                <label for="email">Email :</label>
                <input type="email" id="email" name="themail" required>
            </div>
            <div id="password">
                <label for="password">Mots de passe :</label>
                <input type="password" id="password1" name="password" required>
            </div>
            <div id="lemessage">
                <label for="msg">Message :</label>
                <textarea name="themessage" id="msg" cols="30" rows="5" maxlength="1024"></textarea>
            </div>
            <div id="lergpd">
                <input type="checkbox" name="rgpd" id="rgpd"><label for="rgpd">J'accepte que mes données soient stockées et je suis d'accord avec la politique de confidentialité.</label>
            </div>
        </div>
        </div>
        <div id="envoi">
            <input type="submit" onclick="validateForm(event)" value="Envoyer les données">
        </div>
    </form>
    <h1>Les Commentaires</h1>
    <section id="informations">
        <?php 
            foreach(array_reverse($informations) as $information):
        ?>
        <div class="information">
            <div>
                <p><?= $information["themail"] ?></p>
                <p><?=(new DateTime($information["thedate"]))->format('d/m/Y H:i:s')?></p>
            </div>
            <p><?= $information["themessage"] ?></p>
        </div>
        <?php
            endforeach;
        ?>
    </section>
    <script>
        function validateForm(e){
        var ageInput = document.getElementById("ddn1").value;
        var birthday = new Date(ageInput);
        var yearBirthday = birthday.getFullYear();
        var currentYear = new Date().getFullYear();
        var age = currentYear - yearBirthday ;
    
    
        var password = document.getElementById('password1').value;
        var lengthCheck = password.length >= 8;
        var uppercaseCheck = /[A-Z]/.test(password);
        var numberCheck = /\d/.test(password);
        var symbolCheck = /[!@#$%^&*(),.?":{}|<>]/.test(password);
        
        if (isNaN(age)|| age < 18)  {
            e.preventDefault();
            alert (" Vous n'êtes pas majeur");
        }
        if  (age > 120){
            e.preventDefault();
            alert (" Vous etes trop vieux papy");
        } 
    
        if (!lengthCheck || !uppercaseCheck || !numberCheck || !symbolCheck) {
            e.preventDefault();
             alert("Le mot de passe ne respecte pas les critères");
        } 
    }
    </script>
</body>
</html>