<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["role"] == "admin") {

    $id_pl = $_POST['id_b'];
    $Requete_edit_plat = "SELECT * FROM `plat` WHERE id_plat = " . $id_pl . "";
    $re = $pdo->query($Requete_edit_plat);
    $boisson = $re->fetchALL(PDO::FETCH_ASSOC);

?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/SGRC/css/style_admin/produit/edition-ajoute.css" rel="stylesheet">
        <title>Modification boisson</title>
    </head>

    <body>
        <div class="right">
            <div class="theme-toggler" id="theme-toggler">
                <!-- Dark and Light -->
                <i><img class="icon_darkmode" src="image\icone\darkmode.svg" alt="Icone Dark Mode"></i>
            </div>
        </div>
        <form action="" method="POST">
            <a href="/SGRC/index.php?page=boisson" class="back_btn"> Retour</a>
            <input type="hidden" name="action" value="update boisson">
            <h2>Modifier la boisson </h2>
            <!-- <label for="id_plat">Identifiant</label> -->
            <input name="id_plat" id="id_plat" type="hidden" value=<?php echo  htmlspecialchars(($boisson[0]['id_plat'])) ?>>
            <!-- Le nom du plat -->
            <label for="nom_plat">Nom de la boisson</label>
            <input name="nom_plat" type="text" value="<?php echo  htmlspecialchars(($boisson[0]['nom_plat'])) ?>"> <br>
            <!-- La description du plat -->
            <label for="description">Description de la boisson</label>
            <input name="description" type="text" value="<?php echo  htmlspecialchars(($boisson[0]['description'])) ?>"> <br>
            <!--sous-type plat-->
            <label for="type_plat">Type de boisson</label>
            <select id="type_plat" name="type_plat">
                <?php
                // Boucle pour afficher chaque option
                foreach ($souscats as $souscat) {
                    $id_sous_cat = htmlspecialchars($souscat['id_sous_cat']);
                    $nom_sous_cat = htmlspecialchars($souscat['nom_sous_cat']);
                ?>
                    <option value="<?php echo $id_sous_cat; ?>" <?php echo ($boisson[0]['id_sous_cat'] == $id_sous_cat ? 'selected' : ''); ?>>
                        <?php echo $nom_sous_cat; ?>
                    </option>
                <?php
                }
                ?>
            </select><br>
            <!-- Le prix unitaire du plat -->
            <label for="PU_carte">Prix unitaire</label>
            <input name="PU_carte" type="number" min="0" step="any" value="<?php echo  htmlspecialchars(($boisson[0]['PU_carte'])) ?>"> <br>

            <!-- visible ou non-->
            <label for="vu">visible/invisible</label>

            <select name="vu" id="vu">
                <option value="Visible" <?php echo ($boisson[0]['vu'] == '0' ? 'selected' : ''); ?>>Visible</option>
                <option value="Invisible" <?php echo ($boisson[0]['vu'] == '1' ? 'selected' : ''); ?>>Invisible</option>
            </select>

            <!-- Le bouton d'envoi -->
            <input type="submit" name="Validez" value="Modifier">

            <br>
            <p style="color: red;" id="erreur"></p>
        </form>
        <!-- Script DarkMode -->
        <script src="/SGRC/js/source/dark_mode.js"></script>
        <!-- SCRIPT FONT AWESOME -->
        <script src="https://kit.fontawesome.com/438cd94e6c.js" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location: /SGRC/index.php");
    exit();
}
?>