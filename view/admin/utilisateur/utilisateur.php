<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["role"] == "admin") {
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Utilisateur</title>
        <!-- Lien CSS -->
        <link rel="stylesheet" href="/SGRC/css/style_admin/utilisateur/utilisateur.css" />
        <link rel="stylesheet" href="/SGRC/css/style_admin/tableau_de_bord/tableau_de_bord.css" />
        <link rel="stylesheet" href="/SGRC/css/common.css" />
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
                    <!-- Tableau de bord -->
                    <a href="?page=tableau">
                        <img class="icon_size_sidebar" src="image\icone\house.svg" alt="Icone House">
                        <h3>Tableau de bord</h3>
                    </a>
                    <!-- Tables -->
                    <a href="?page=table">
                        <img class="icon_size_sidebar" src="image\icone\table.svg" alt="Icone Table">
                        <h3>Tables</h3>
                    </a>
                    <!-- Plats -->
                    <a href="?page=plat">

                        <img class="icon_size_sidebar" src="image\icone\utensils.svg" alt="Icone Ustensils">
                        <h3>Plats</h3>
                    </a>
                    <!-- Boissons -->
                    <a href="?page=boisson">
                        <img class="icon_size_sidebar" src="image\icone\bottle.svg" alt="Icone Bottle">
                        <h3>Boissons</h3>
                    </a>
                    <!-- Menus -->
                    <a href="?page=menu">
                        <img class="icon_size_sidebar" src="image\icone\menu.svg" alt="Icone Menu">
                        <h3>Menus</h3>
                    </a>
                    <!-- Utilisateurs -->
                    <a href="?page=users" class="active">

                        <img class="icon_size_sidebar" src="image\icone\users.svg" alt="Icone Users">
                        <h3>Utilisateurs</h3>
                    </a>
                    <!-- Categorie -->
                    <a href="?page=categorie">
                        <img class="icon_size_sidebar" src="image\icone\explore.svg" alt="Icone Explore">
                        <h3>Catégories</h3>
                    </a>
                    <!-- Deconnexion-->
                    <a href="/SGRC/php/deconnexion.php">
                        <img class="icon_size_sidebar" src="image\icone\logout.svg" alt="Icone Logout">
                        <h3>Déconnexion</h3>
                    </a>
                </div>
            </aside>
            <!-------------Fin ASIDE  ----------------->
            <main class="main-user">
                <h1>Utilisateurs</h1>

                <div class="Utilisateur">
                    <!-- Table -->
                    <table class="table-grid">
                        <caption>
                            Utilisateurs
                        </caption>
                        <thead>
                            <tr>
                                <th>Login</th>
                                <th>Rôle</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <?php
                        foreach ($users as $user) {
                        ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $user['login']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['role']; ?>
                                    </td>

                                    <td>
                                        <table class="test">
                                            <tr>
                                                <td>
                                                    <!-- Formulaire pour modifier l'utilisateur -->
                                                    <form action="?page=modif_utilisateur" method="post">
                                                        <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
                                                        <button type="submit" value="modifier" class="btn btn-primary"><img class="icon_size" src="image\icone\pen-to-square.svg" alt="Icone Edit Categorie">
                                                    </form>
                                                </td>

                                                <td>
                                                    <!-- Formulaire pour supprimer l'utilisateur -->
                                                    <form method="post" action="">
                                                        <input type="hidden" name="action" value="suppr_utilisateur">
                                                        <input type="hidden" name="id_u" value="<?php echo $user['id_user']; ?>">
                                                        <button type="submit" onclick="return confirm ('êtes-vous sûr de vouloir supprimer ?')"><img class="icon_size" src="image\icone\trash.svg" alt="Icone Delete Categorie"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                        }
                        ?>
                        <!-- Ligne ajout -->
                        <tr class="add">
                            <td colspan="4">
                                <a href="/SGRC/view/admin/utilisateur/ajouter.php">
                                    <img class="icon_size" src="image\icone\plus.svg" alt="Icone Plus">
                                </a>
                            </td>
                        </tr>
                    </table>
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
                            <br>
                            <p style="text-transform: uppercase;"><b>
                                    <?php echo $_SESSION['role'] ?>
                                </b></p>

                        </div>
                        <?php
                        $sql_req = "SELECT * FROM user WHERE id_user =" . $_SESSION['id_user'];
                        $stt = $pdo->prepare($sql_req);
                        $stt->execute();
                        $row = $stt->fetch();
                        ?>
                        <div class="profil-photot">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SCRIPT FONT AWESOME -->
        <script src="https://kit.fontawesome.com/438cd94e6c.js" crossorigin="anonymous"></script>
        <!-- Script Menu -->
        <script src="/SGRC/js/source/menu.js"></script>
        <!-- Script Dark Mode -->
        <script src="/SGRC/js/source/dark_mode.js"></script>
    </body>

    </html>
<?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location: /SGRC/index.php");
    exit();
}
?>