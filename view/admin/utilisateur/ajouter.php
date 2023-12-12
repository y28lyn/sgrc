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
        <title>Ajouter utilisateur</title>
    </head>

    <body>
        <div class="right">
            <div class="theme-toggler" id="theme-toggler">
                <!-- Dark and Light -->
                <i><img class="icon_darkmode" src="image\icone\darkmode.svg" alt="O"></i>
            </div>
        </div>
        <form action="#" enctype="multipart/form-data">
            <div class="error-txt"></div>
            <a href="/SGRC/index.php?page=users" class="back_btn"> Retour</a>
            <h2>Ajouter un utilisateur </h2>
            <!-- <label for="id_user">Identifiant</label> -->
            <input name="id_user" id="id_user" type="hidden">
            <!-- Login -->
            <label for="login">Login</label>
            <input name="login" id="login" type="text" autofocus="autofocus" autocomplete="off" required> <br>
            <!--Rôle -->
            <label for="role">Rôle</label>
            <select name="role" id="role" required>
                <?php
                // Options manuelles
                $optionsManuelles = array(
                    "bar",
                    "service",
                    "cuisine",
                    "caisse",
                    "admin"
                );

                // Boucle pour les options manuelles
                foreach ($optionsManuelles as $optionManuelle) {
                ?>
                    <option value="<?php echo $optionManuelle; ?>">
                        <?php echo $optionManuelle; ?>
                    </option>
                <?php
                }
                ?>
            </select><br>
            <!-- Le mot de passe -->
            <label for="mdp">Mot de passe</label>
            <input name="mdp" id="mdp" type="password" autocomplete="off" required> <br>
            <!--Image -->
            <label for="image">Image</label>
            <input name="image" id="image" type="file" autocomplete="off" required> <br>
            <!-- Le bouton d'envoi -->
            <input type="submit" name="Validez" class="button" value="Ajouter"> <br>

            <!-- <p style="color: red;" id="erreur"></p> -->
        </form>
        <!-- Script Dark Mode -->
        <script src="/SGRC/js/source/dark_mode.js"></script>
        <!-- SCRIPT FONT AWESOME -->
        <script src="https://kit.fontawesome.com/438cd94e6c.js" crossorigin="anonymous"></script>
        <!-- Script ValidationJs -->
        <script src="/SGRC/js/admin/utilisateur/verification_utilisateur.js"></script>
    </body>

    </html>
<?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location: /SGRC/index.php");
    exit();
}
?>