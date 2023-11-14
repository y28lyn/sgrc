<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["role"] == "service") {
    $Table_selec = $_SESSION['tables'];


    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/SGRC/css/style_service/nbCouvert.css">
        <link rel="stylesheet" href="/SGRC/css/common.css" />
        <title>Nombre de couvert</title>
    </head>

    <body>
        <div class="l-form">
            <form action="index.php?page=plat" method="POST" class="form" id="FormulaireNbCouvert">
                <input type="hidden" name="action" value="affecter_nb_couvert">
                <a href="index.php" class="back_btn"> Retour</a>
                <h1 class="form__title">Table n°
                    <?php echo $Table_selec ?>
                </h1>

                <div class="form__div">
                    <input type="number" min="0" class="form__input" name="nb_couvert" id="nb_couvert" autocomplete="off"
                        placeholder=" ">
                    <label for="nb_couvert" class="form__label">Entrez un nombre de couvert</label>
                </div>

                <input type="submit" class="form__button" value="Modifier" name="nbC"> <br>
                <p style="color: red;" id="erreur"></p>
            </form>
        </div>

        <div class="right">
            <div class="theme-toggler" id="theme-toggler">
                <!-- Dark and Light -->
                <i><img class="icon_darkmode" src="image\icone\darkmode.svg" alt="Icone Dark Mode"></i>
            </div>
        </div>



        <!-- Script DarkMode -->
        <script src="/SGRC/js/source/dark_mode.js"></script>
        <!-- SCRIPT FONT AWESOME -->
        <script src="https://kit.fontawesome.com/438cd94e6c.js" crossorigin="anonymous"></script>
        <!-- Script ValidationJS -->
        <script src="/SGRC/js/service/nbCouvert.js"></script>
    </body>

    </html>
    <?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location: /SGRC/index.php");
    exit();
}
?>