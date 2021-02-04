<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videotech</title>
    <!--Cdn-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <!--Css-->
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php
    include('retour_accueil.php');
    ?>


<?php
    $bdd = new PDO('mysql:host=localhost;dbname=videotech;charset=utf8', 'Root', 'Simplon974', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query('SELECT * FROM film');
    while ($donnees = $reponse->fetch()) {
        echo '<form method="post">';
        echo '<input type="hidden" name="projet_id" value="' . $donnees['id'] . '">';
        echo '<input   type="text" name="md_titre_projet" value="' . $donnees['titre'] . '">';
        echo '<input   type="text" name="md_acteur_projet" value="' . $donnees['acteur'] . '">';
        echo '<input   type="text" name="md_genre_projet" value="' . $donnees['genre'] . '">';
        echo '<input   type="text" name="md_synopsis_projet" value="' . $donnees['synopsis'] . '">';
        echo '<input   type="text" name="md_image_projet" value="' . $donnees['image'] . '">';
        echo '<button class="mdl-button mdl-js-button mdl-button--icon type="submit" name="modifier">';
        echo '<i class="material-icons">edit</i>
        </button>';
        echo '</form>';
        
        //MODIFIER DES DONNEES
        if (isset($_POST['modifier'])) {
            $requete = 'UPDATE film SET titre="' . $_POST['md_titre_projet'] . '" , acteur="' . $_POST['md_acteur_projet'] . '" , genre="' . $_POST['md_genre_projet'] . '" , synopsis="' . $_POST['md_synopsis_projet'] . '" , image="' . $_POST['md_image_projet'] . '" WHERE id="' . $_POST['projet_id'] . '"';
            $resultat = $bdd->query($requete);
        }
    }
    ?>	
</body>

</html>