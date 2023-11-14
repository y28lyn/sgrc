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
        <title>Modification produit</title>
        <style>
            .color-picker {
                display: inline-block;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                border: 1px solid #000;
                cursor: pointer;
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
        <form action="" method="POST" id="ValidationDuFormulaireMenu">
            <a href="?page=sous_categorie" class="back_btn"> Retour</a>
            <input type="hidden" name="action" value="update sous cat">
            <h2>Modifier la sous-catégorie</h2>
            <!-- <label for="id_menu">Identifiant</label> -->
            <input name="id_t" id="id_t" type="hidden" value=<?php echo htmlspecialchars(($cat[0]['id_cat'])) ?>>
            <!-- <label for="id_menu">Identifiant</label> -->
            <input name="id_sous_cat" id="id_sous_cat" type="hidden" value=<?php echo htmlspecialchars(($cat[0]['id_sous_cat'])) ?>>
            <!-- Le nom du menu -->
            <label for="nom_cat">Nom de la sous categorie</label>
            <input name="nom_sous_cat" id="nom_sous_cat" type="text"
                value="<?php echo htmlspecialchars(($cat[0]['nom_sous_cat'])) ?>"> <br>
            <!-- Couleur du plat -->
            <label for="couleur">Couleur</label>
            <input name="couleur" id="couleur" type="color"
                value="<?php echo htmlspecialchars(($cat[0]['couleur'])) ?>"> <br>
            <!-- Le bouton d'envoi -->
            <input type="submit" name="Validez" value="Modifier">

            <br>
            <p style="color: red;" id="erreur"></p>
        </form>
        <!-- Script DarkMode -->
        <script src="/SGRC/js/source/dark_mode.js"></script>
        <!-- SCRIPT FONT AWESOME -->
        <script src="https://kit.fontawesome.com/438cd94e6c.js" crossorigin="anonymous"></script>
        <!-- Script ValidationJS -->

    </body>

    </html>
    <?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location: /SGRC/index.php");
    exit();
}
?>