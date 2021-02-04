<?php 
include('retour_accueil.php');
?>
<?php
    $bdd = new PDO('mysql:host=localhost;dbname=videotech;charset=utf8', 'Root', 'Simplon974', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query('SELECT * FROM film');
    if (isset($_POST['titre'])) {
        $requete = 'INSERT INTO film VALUES(NULL, "' . $_POST['titre'] . '","' . $_POST['acteur'] . '", "' . $_POST['genre'] . '", "' . $_POST['synopsis'] . '","' . $_POST['image'] . '")';
        $resultat = $bdd->query($requete);
    }
    ?>
