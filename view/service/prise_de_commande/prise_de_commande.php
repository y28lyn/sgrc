<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendre une commande</title>
    <link rel="stylesheet" href="/SGRC/css/style_admin/tableau_de_bord/tableau_de_bord.css" />
    <link rel="stylesheet" href="/SGRC/css/style_service/prise_de_commande.css" />
    <link rel="stylesheet" href="/SGRC/css/common.css"/>
</head>

<body>


    <!-- Conteneur -->
    <div class="container">
        <aside>
            <!-- MENU (logo & titre & bouton fermer) -->
            <div class="top">
                <div class="logo">
                    <img src="/SGRC/image/img/source/logo.png" alt="logo du site" />
                    <h2>La table <span class="primary">d'Hélène</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <img class="icon_size_sidebar" src="image\icone\xmark.svg" alt="Icone X Mark">
                </div>
            </div>
            <div class="sidebar">
                <!-- Commander -->
                <a href="#" class="active">
                <img class="icon_size_sidebar" src="image\icone\basket.svg" alt="Icone Commande">
                    <h3>Commande</h3>
                </a>
                <!-- Deconnexion-->
                <a href="/SGRC/php/deconnexion.php">
                    <img class="icon_size_sidebar" src="image\icone\logout.svg" alt="Icone Logout">
                    <h3>Déconnexion</h3>
                </a>
            </div>
        </aside>


        <!-------------Fin ASIDE  ----------------->
        <main>
            <div class="numero_table">
                <h1 class="titre">Choisir une table</h1>
                <form method="post">
                    <input type="hidden" name="action" value="choix_table">
                    <?php
                    foreach ($tables as $table) {
                    ?>
                        <input Type='submit' id='<?php echo $table['id_table']; ?>' name='numero_table_voulue' value="<?php echo $table['numero_table']; ?>">

                    <?php
                    }
                    ?>
                </form>
            </div>

        </main>
        <!-- Fin du  main -->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <i><img class="icon_size" src="image\icone\bar.svg" alt="Icone Bars"></i>
                </button>
                <div class="theme-toggler" id="theme-toggler">
                    <!-- Dark and Light -->
                    <i><img class="icon_darkmode" src="image\icone\darkmode.svg" alt="Icone Dark Mode"></i>
                </div>
                <div class="profil">
                    <div class="info">
                        <p>Bonjour, <b>service</b></p>
                        <small class="text-muted">Admin</small>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Bouton des table -->






    <!-- Script DarkMode -->
    <script src="/SGRC/js/source/dark_mode.js"></script>
    <!-- SCRIPT FONT AWESOME -->
    <script src="https://kit.fontawesome.com/438cd94e6c.js" crossorigin="anonymous"></script>
    <script src="/SGRC/js/source/menu.js"></script>
</body>

</html>