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
        <form action="" method="POST">
            <input type="hidden" name="action" value="ajout carte">
            <a href="?page=carte_menu" class="back_btn">Retour</a>
            <h2>Ajouter un plat </h2>
            <!--choix du plat-->
            <label for="id_plat">Choix du plat</label>
            <select id="id_plat" name="id_plat">
            <?php
            foreach($cat_plat as $cat_plats)
            {
                ?>
                <optgroup label="<?php echo $cat_plats['nom_sous_cat'] ?>">
                <?php
            //boucle pour afficher les plats disponibles
                foreach($cartes as $carte){
                    if ($carte['id_sous_cat'] == $cat_plats['id_sous_cat']) {
                        ?>
                        <option value="<?php echo $carte['id_plat']; ?>"><?php echo $carte['nom_plat']; ?></option>
                        <?php
                    }
                }
            }
            ?>
            </select>
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