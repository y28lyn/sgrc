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
        <title>Ajoute produit</title>
    </head>

    <body>
        <div class="right">
            <div class="theme-toggler" id="theme-toggler">
                <!-- Dark and Light -->
                <i><img class="icon_darkmode" src="image\icone\darkmode.svg" alt="Icone Dark Mode"></i>
            </div>
        </div>
        <form action="" method="POST" id="ValidationDuFormulaireMenu">
            <input type="hidden" name="action" value="ajout menu">
            <a href="?page=menu" class="back_btn"> Retour</a>
            <h2>Ajouter un menu </h2>
            <input name="id_menu" id="id_menu" type="hidden">
            <!-- Le nom du menu -->
            <label for="nom_menu">Nom du menu</label>
            <input name="nom_menu" id="nom_menu" type="text" autofocus="autofocus" placeholder="menu du jour"> <br>
            <!-- La description du menu -->
            <label for="description">Description du menu</label>
            <input name="description" id="description" type="text" placeholder="entrée + plat + dessert"> <br>
            <!-- Le prix unitaire du menu -->
            <label for="prix_unitaire">Prix unitaire</label>
            <input name="PU" id="prix_unitaire" type="number" min="0" step="any" placeholder="25"> <br>
            <!--la date du menu-->
            <label for="date_menu">Date du menu</label>
            <input name="date_menu" id="date_menu" type="date"> <br>
            <!--visible-->
            <label for="vu">visible/invisible</label>
            <select name="vu" id="vu">
                <option value="0">visible</option>
                <option value="1">invisible</option>
            </select> <br>
            <!-- Le bouton d'envoi -->
            <input type="submit" name="Validez" value="Ajouter"> <br>


            <p style="color: red;" id="erreur"></p>
        </form>
        <!-- Script DarkMode -->
        <script src="/SGRC/js/source/dark_mode.js"></script>
        <!-- SCRIPT FONT AWESOME -->
        <script src="https://kit.fontawesome.com/438cd94e6c.js" crossorigin="anonymous"></script>
        <!-- Script ValidationJS -->
        <script src="/SGRC/js/admin/produit/ajouter_modifier/verification-menu.js"></script>
    </body>

    </html>
<?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location: /SGRC/index.php");
    exit();
}
?>