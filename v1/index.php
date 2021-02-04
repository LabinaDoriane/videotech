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

  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet"> 
</head>

<body>

  <!-- EN TETE/MENU-->
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <!-- Titre -->
        <span class="mdl-layout-title">Videotech</span>
        <!-- Ajouter de l'espace et aligner vers la droite -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">
          <a class="mdl-navigation__link" href="">Accueil</a>
          <a class="mdl-navigation__link" href="">Nouveautés</a>
          <a class="mdl-navigation__link" href="">Populaires</a>
        </nav>
      </div>
    </header>

    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">Title</span>
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="">Accueil</a>
        <a class="mdl-navigation__link" href="">Nouveautés</a>
        <a class="mdl-navigation__link" href="">Populaires</a>
      </nav>
    </div>

    <main class="mdl-layout__content">
      <div class="page-content">
        <!-- Contenu -->
        <!-- Grille carte-->
        <div class="mdl-grid">

          <!-- Carte -->
          <div class="mdl-cell mdl-cell--3-col">
            <div class="demo-card-wide mdl-card mdl-shadow--2dp carte1">
              <h1>Ajouter un film</h1>
              <form method="post" action="insert.php">
                <!-- Grille formulaire-->
                <div class="mdl-grid">

                  <!-- Formulaire titre-->
                  <div class="mdl-cell mdl-cell--12-col">
                    <label>Titre</label><br><input type="text" name="titre" id="titre">
                  </div>
                  <!-- Formulaire acteur -->
                  <div class="mdl-cell mdl-cell--12-col">
                    <label>Acteur</label><br><input type="text" name="acteur" id="acteur">
                  </div>
                  <!-- Formulaire genre-->
                  <div class="mdl-cell mdl-cell--12-col">
                    <label>Genre</label><br> <input type="text" name="genre" id="genre">
                  </div>
                  <!-- Formulaire snopsis-->
                  <div class="mdl-cell mdl-cell--12-col">
                    <label for="story">Synopsis</label><br>
                    <textarea id="synopsis" name="synopsis">
                                 Entrez votre texte
                               </textarea>
                  </div>

                  <!-- Formulaire image-->
                  <div class="mdl-cell mdl-cell--12-col">
                    <label>Image</label><br> <input type="text" name="image" id="image">
                  </div>

                  <!--Bouton ajouter-->
                  <div class="mdl-cell mdl-cell--12-col">
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="submit">
                      Ajouter
                    </button>
                  </div>

                </div>
              </form>

            </div>
          </div>
          <!-- Fin de carte-->

          <!-- LIRE/AFFICHER LES DONNES-->
          <div class="mdl-cell mdl-cell--5-col">

            <?php
            try {
              // On se connecte à MySQL
              $bdd = new PDO('mysql:host=localhost;dbname=videotech;charset=utf8', 'Root', 'Simplon974');
            } catch (Exception $e) {
              // En cas d'erreur, on affiche un message et on arrête tout
              die('Erreur : ' . $e->getMessage());
            }

            // Si tout va bien, on peut continuer

            // On récupère tout le contenu de la table info
            $reponse = $bdd->query('SELECT * FROM film');

            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch()) {
            ?>

              


                <div class="mdl-cell mdl-cell--3-col ">

                  <p><strong>Titre</strong> : <?php echo $donnees['titre']; ?></p>
                  <p><strong>Acteur</strong> :<?php echo $donnees['acteur']; ?></p>
                  <p><strong>Genre</strong> :<?php echo $donnees['genre']; ?></p>
                  <p><strong>Synopsis</strong> : <?php echo $donnees['synopsis']; ?></p>
                  <p heigth="150px"> <?php echo '<img class="img" src="' . $donnees['image'] . '" >'; ?></p>
                </div>
                
              


            <?php
            }

            $reponse->closeCursor(); // Termine le traitement de la requête

            ?>

          </div>


          <div class="mdl-cell mdl-cell--3-col">
            <!-- Wide card with share menu button -->

            <div class="demo-card-wide mdl-card mdl-shadow--2dp carte2">

              <?php
              try {
                // On se connecte à MySQL
                $bdd = new PDO('mysql:host=localhost;dbname=videotech;charset=utf8', 'Root', 'Simplon974');
              } catch (Exception $e) {
                // En cas d'erreur, on affiche un message et on arrête tout
                die('Erreur : ' . $e->getMessage());
              }

              // Si tout va bien, on peut continuer

              // On récupère tout le contenu de la table info
              $reponse = $bdd->query('SELECT * FROM film');

              // On affiche chaque entrée une à une
              while ($donnees = $reponse->fetch()) {
              ?>

                <table width="630">

                  <ul>
                    <li width="152"><strong>Titre</strong> : <?php echo $donnees['titre']; ?>
                    <li>
                      <a href="delete.php">Supprimer</a>
                      <a href="update.php">Modifier</a>
                  </ul>

                </table>
              <?php
              }

              $reponse->closeCursor(); // Termine le traitement de la requête

              ?>


            </div>






          </div>
          <!-- Fin de contenu-->
    </main>
  </div>

</body>

</html>