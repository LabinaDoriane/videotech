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

        echo '<button class="mdl-button mdl-js-button mdl-button--icon type="submit" name="supprimer"">
        <i class="material-icons">Supprimer</i>
      </button> ' . '<br/>';
        echo '</form>';
        //SUPPRIMER DES DONNEES
        if (isset($_POST['supprimer'])) {
            $requete = 'DELETE FROM film WHERE id="' . $_POST['projet_id'] . '"';
            $resultat = $bdd->query($requete);
        }
        
    }
    ?>