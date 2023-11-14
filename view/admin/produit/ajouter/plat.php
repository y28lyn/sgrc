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
        <title>Ajouter produit</title>
        
    </head>

    <body>
        <div class="right">
            <div class="theme-toggler" id="theme-toggler">
                <!-- Dark and Light -->
                <i><img class="icon_darkmode" src="image\icone\darkmode.svg" alt="Icone Dark Mode"></i>
            </div>
        </div>
        <form action="" method="POST">
            <input type="hidden" name="action" value="ajout plat">
            <a href="?page=plat" class="back_btn"> Retour</a>
            <h2>Ajouter un plat </h2>
            <input name="id_plat" id="id_plat" type="hidden">
            <!-- Le nom du plat -->
            <label for="nom_plat">Nom du plat</label>
            <input name="nom_plat" autofocus="autofocus" type="text"> <br>
            <!-- La description du plat -->
            <label for="description">Description du plat</label>
            <input name="description" type="text"> <br>
            <!-- Le sous-type de plat -->
            <label for="sous_type_plat">Sous-type de plat</label>
            <select id="sous_type_plat" name="sous_type_plat">
                <?php
                // Boucle pour afficher chaque option
                foreach($souscats as $souscat) {
                    ?>
                    <option value="<?php echo $souscat['id_sous_cat']; ?>"><?php echo $souscat['nom_sous_cat']; ?> </option>
                    <?php
                }
                ?>
            </select><br>
            <!-- Le prix unitaire du plat -->
            <label for="PU_carte">Prix unitaire</label>
            <input name="PU_carte" type="number" min="0" step="any" > <br>
            <!--visible-->
            <label for="vu">visible/invisible</label>
            <select name="vu" id="vu">
                <option value="0">visible</option>
                <option value="1">invisible</option>
            </select>
            <br>
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
    </body>

    </html>
<?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location:/SGRC/index.php");
    exit();
}
?>
