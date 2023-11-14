<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["role"] == "admin") {

    $id_t = $_POST['id_t'];
    $Requete_edit_table = "SELECT * FROM `sgr_table` WHERE id_table = " . $id_t . "";
    $re = $pdo->query($Requete_edit_table);
    $table = $re->fetchALL(PDO::FETCH_ASSOC);

    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/SGRC/css/style_admin/produit/edition-ajoute.css" rel="stylesheet">
        <title>Modification table</title>
    </head>

    <body>
        <div class="right">
            <div class="theme-toggler" id="theme-toggler">
                <!-- Dark and Light -->
                <i><img class="icon_darkmode" src="image\icone\darkmode.svg" alt="Icone Dark Mode"></i>
            </div>
        </div>
        <form action="#" method="POST" id="ValidationDuFormulaireTable">
            <a href="?page=table" class="back_btn"> Retour</a>
            <input type="hidden" name="action" value="update table">
            <h2>Modifier la table </h2>
            <input name="id_table" id="id_table" type="hidden" value=<?php echo htmlspecialchars(($table[0]['id_table'])) ?>>
            <!-- Le numero de la table -->
            <label for="numero_table">Numero de la table</label>
            <input name="numero_table" id="numero_table" type="number" min="1" 
                value="<?php echo htmlspecialchars(($table[0]['numero_table'])) ?>"> <br>
            <!-- Le type de table -->
            <label for="type_table">Type de table</label>
            <select name="type_table" id="type_table" value="<?php echo htmlspecialchars(($table[0]['type_table'])) ?>">
                <option value="CAR">CAR</option>
                <option value="RON">RON</option>
            </select> <br>
            <!-- visible ou non-->
            <label for="vu">visible/invisible</label>
            <select name="vu" id="vu" value="<?php echo htmlspecialchars(($table[0]['vu'])) ?>">
                <option value="0">visible</option>
                <option value="1">invisible</option>
            </select>
            <br>
            <!-- Le bouton d'envoi -->
            <input type="submit" name="Validez" value="Modifier">

            <br>
            <p style="color: red;" id="erreur"></p>
        </form>
        <!-- Script dark mode -->
        <script src="/SGRC/js/source/dark_mode.js"></script>
        <!-- SCRIPT FONT AWESOME -->
        <script src="https://kit.fontawesome.com/438cd94e6c.js" crossorigin="anonymous"></script>
        <!-- Script ValidationJS -->
        <script src="/SGRC/js/admin/produit/ajouter_modifier/verification-table.js"></script>
    </body>

    </html>
    <?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location: /SGRC/index.php");
    exit();
}
?>
