<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["role"] == "admin") {

    $id_u = $_POST['id_user'];
    $Requete_edit_user = "SELECT * FROM `user` WHERE id_user = " . $id_u . "";
    $re = $pdo->query($Requete_edit_user);
    $user = $re->fetchALL(PDO::FETCH_ASSOC);

    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/SGRC/css/style_admin/produit/edition-ajoute.css" rel="stylesheet">
        <title>Modification utilisateur</title>
    </head>

    <body>
        <div class="right">
            <div class="theme-toggler" id="theme-toggler">
                <!-- Dark and Light -->
                <i><img class="icon_darkmode" src="image\icone\darkmode.svg" alt="Icone Dark Mode"></i>
            </div>
        </div>
        <form action="#" method="POST" id="ValidationDuFormulaireUtilisateur">
            <a href="?page=users" class="back_btn"> Retour</a>
            <h2>Modifier l'utilisateur</h2>
            <input type="hidden" name="action" value="modif_utilisateur">
            <input name="id_user" id="id_user" type="hidden" value=<?php echo htmlspecialchars(($user[0]['id_user'])) ?>>
            <!-- Login -->
            <label for="login">Login</label>
            <input name="login" id="login" type="text" value="<?php echo htmlspecialchars(($user[0]['login'])) ?>"> <br>
            <!--Rôle -->
            <label for="role">Rôle</label>

            <select name="role" id="role">
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
                    $selected =
                        $user[0]["role"] == $optionManuelle
                        ? "selected"
                        : ""; ?>
                    <option value="<?php echo $optionManuelle; ?>" <?php echo $selected; ?>>
                        <?php echo $optionManuelle; ?>
                    </option>
                <?php
                }
                ?>
            </select>

            <br>
            <!-- Le prix unitaire du menu -->
            <label for="mdp">Mot de passe</label>
            <input name="mdp" id="mdp" type="password"> <br>
            <!-- Le bouton d'envoi -->
            <input type="submit" name="Validez" value="Modifier">
            <p style="color: red;" id="erreur"></p>
        </form>
        <!-- Script Dark mode -->
        <script src="/SGRC/js/source/dark_mode.js"></script>
        <!-- SCRIPT FONT AWESOME -->
        <script src="https://kit.fontawesome.com/438cd94e6c.js" crossorigin="anonymous"></script>
        <!-- Script ValidationJs -->
        <script src="/SGRC/js/admin/utilisateur/verification_utilisateur_s_ajax.js"></script>
    </body>

    </html>
    <?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location: /SGRC/index.php");
    exit();
}
?>