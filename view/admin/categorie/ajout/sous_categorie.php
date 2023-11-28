<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["role"] == "admin") {
    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/SGRC/css/style_admin/produit/edition-ajoute.css" rel="stylesheet">
        <title>Ajout sous categorie</title>
        <style>
            .color-button {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                cursor: pointer;
                margin-right: 5px;
                transition: background-color 0.5s;
                border: none;
            }

            .color-button.selected-color {
                border: 3px solid #7380ec;
                box-shadow: 0 0 5px #7380ec;
            }
        </style>

    </head>

    <body>
        <div class="right">
            <div class="theme-toggler" id="theme-toggler">
                <!-- Dark and Light -->
                <i><img class="icon_darkmode" src="image\icone\darkmode.svg" alt="Icone Dark Mode"></i>
            </div>
        </div>
        <form action="" method="POST">
            <input type="hidden" name="action" value="ajout sous categorie">
            <a href="?page=sous_categorie" class="back_btn">Retour</a>
            <h2>Ajouter une sous catégorie </h2>
            <!--choix du plat-->
            <label for="nom_sous_cat">Choix du nom</label>
            <input name="nom_sous_cat" type="text">
            <label>Couleur</label>
            <div class="color-buttons-container">
                <?php
                $colors = array(
                    "#247BA0", "#FFE066", "#F25F5C", "#54B6A5",
                    "#FF621F", "#9AE95D", "#B47EB3", "#FF85A1"
                );

                foreach ($colors as $color) {
                    echo '<button type="button" class="color-button ' . $color . '" style="background-color: ' . $color . '" onclick="selectColor(this, \'' . $color . '\')"></button>';
                }
                ?>
            </div>
            <!-- Champ caché pour stocker la couleur sélectionnée -->
            <input type="hidden" name="couleur" id="couleur" value="<?php echo $color; ?>">

            <!-- Le bouton d'envoi -->
            <input type="submit" name="Validez" value="Ajouter"> <br>


            <p style="color: red;" id="erreur"></p>
        </form>
        <!-- Script DarkMode -->
        <script src="/SGRC/js/source/dark_mode.js"></script>
        <!-- SCRIPT FONT AWESOME -->
        <script src="https://kit.fontawesome.com/438cd94e6c.js" crossorigin="anonymous"></script>
        <!-- Script ValidationJS -->
        <script src="/SGRC/js/admin/produit/ajouter_modifier/verification-plat.js"></script>
        <script src="/SGRC/js/admin/produit/ajouter_modifier/couleurs.js"></script>

    </body>

    </html>
    <?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location:/SGRC/index.php");
    exit();
}
?>