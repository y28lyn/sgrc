<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["role"] == "service") {

    // Redirection pou eviter le bug
    header('Location:/SGRC/view/service/prise_de_commande/prise_de_commande.php');
    ?>
    <!-- Script DarkMode -->
    <script src="/SGRC/js/source/dark_mode.js"></script>
    <!-- SCRIPT FONT AWESOME -->
    <script src="https://kit.fontawesome.com/438cd94e6c.js" crossorigin="anonymous"></script>
    <!-- SCRIPT POP UP -->
    <script src="/SGRC/js/service/finTicket.js"></script>
    </body>

    </html>
    <?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location: /SGRC/index.php");
    exit();
}
?>