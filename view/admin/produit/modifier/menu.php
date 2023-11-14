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
        <title>Modification menu</title>
    </head>

    <body>
        <div class="right">
            <div class="theme-toggler" id="theme-toggler">
                <!-- Dark and Light -->
                <i><img class="icon_darkmode" src="image\icone\darkmode.svg" alt="Icone Dark Mode"></i>
            </div>
        </div>
        <form action="" method="POST" id="ValidationDuFormulaireMenu">
            <a href="?page=menu" class="back_btn"> Retour</a>
            <input type="hidden" name="action" value="update menu">
            <h2>Modifier le menu </h2>
            <!-- <label for="id_menu">Identifiant</label> -->
            <input name="id_menu" id="id_menu" type="hidden" value=<?php echo htmlspecialchars(($menu[0]['id_menu'])) ?>>
            <!-- Le nom du menu -->
            <label for="nom_menu">Nom du menu</label>
            <input name="nom_menu" id="nom_menu" type="text" value="<?php echo htmlspecialchars(($menu[0]['nom_menu'])) ?>">
            <br>
            <!-- La description du menu -->
            <label for="description">Description du menu</label>
            <input name="description" id="description" type="text"
                value="<?php echo htmlspecialchars(($menu[0]['description'])) ?>"> <br>
            <!-- Le prix unitaire du menu -->
            <label for="prix_unitaire">Prix unitaire</label>
            <input name="PU" id="prix_unitaire" type="number" min="0" step="any"
                value="<?php echo htmlspecialchars(($menu[0]['PU'])) ?>"> <br>
            <!--la date du menu-->
            <label for="date_menu">Date du menu</label>
            <input name="date_menu" id="date_menu" type="date"
                value="<?php echo htmlspecialchars(($menu[0]['date_menu'])) ?>"> <br>
            <!-- visible ou non-->
            <label for="vu">visible/invisible</label>
            <select name="vu" id="vu" value="<?php echo htmlspecialchars(($menu[0]['vu'])) ?>">
                <option value="0">visible</option>
                <option value="1">invisible</option>
            </select>
            <br>
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