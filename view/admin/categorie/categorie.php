<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["role"] == "admin") {
    //include "include/connexion.php";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Catégories</title>
        <!-- Lien CSS -->
        <link rel="stylesheet" href="/SGRC/css/style_admin/produit/produit.css" />
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
                    <a href="?page=users">

                        <img class="icon_size_sidebar" src="image\icone\users.svg" alt="Icone Users">
                        <h3>Utilisateurs</h3>
                    </a>
                    <!-- Categorie -->
                    <a href="?page=categorie" class="active">
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
            <main>
                <h1>Catégories</h1>
                <?php
                // Code PHP à insérer ici si nécessaire
                ?>
                <div class="Produits">
                    <!-- Tableau -->
                    <table class="table-grid">
                        <caption>
                            Ordre d'affichage
                        </caption>
                        <thead>
                            <tr>
                                <th>Nom Categorie</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        // Boucle sur chaque catégorie
                        $nombre_categories = count($categories);
                        foreach ($categories as $categorie) {
                        ?>
                            <tbody>
                                <tr>
                                    <!-- Affichage du nom de la catégorie -->
                                    <td>
                                        <?php echo $categorie['nom_cat']; ?>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <!-- Formulaire pour afficher les sous-catégories -->
                                                    <form method="post" action="?page=sous_categorie">
                                                        <input type="hidden" name="action" value="sous_categorie">
                                                        <input type="hidden" name="id_t" value="<?php echo $categorie['id_cat']; ?>">
                                                        <button type="submit" value="modifier" class="btn btn-primmary">
                                                            <img class="icon_size" src="image\icone\sous-cat.svg" alt="Icone Sous Categorie">
                                                        </button>

                                                    </form>
                                                </td>
                                                <td>
                                                    <!-- Formulaire pour modifier la catégorie -->
                                                    <form action="?page=modif_categorie" method="post">
                                                        <input type="hidden" name="id_t" value="<?php echo $categorie['id_cat']; ?>">
                                                        <button type="submit" value="modifier" class="btn btn-primary">
                                                            <img class="icon_size" src="image\icone\pen-to-square.svg" alt="Icone Edit Categorie"> </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <!-- Formulaire pour monter la catégorie dans l'ordre d'affichage -->
                                                    <form method="post">
                                                        <input type="hidden" name="action" value="monter ordre cat">
                                                        <input type="hidden" name="id_c" value="<?php echo $categorie['id_cat']; ?>">
                                                        <?php
                                                        // Récupérez l'ordre d'affichage de la catégorie
                                                        $ordre_affichage = $categorie['ordre_affichage_cat'];

                                                        // Vérifiez si la catégorie est la première dans la liste
                                                        if ($ordre_affichage === 1) {
                                                            // Si c'est la première, masquez la flèche de montée
                                                            echo '<button disabled="disabled" type="submit" value="modifier" class="btn btn-primmary" style="opacity: 0;">';
                                                        } else {
                                                            // Sinon, affichez la flèche de montée
                                                            echo '<button type="submit" value="modifier" class="btn btn-primmary">';
                                                        }
                                                        ?>
                                                            <img class="icon_size" style="transform: rotate(-90deg)" src="image\icone\arrow.svg" alt="Icone Arrow Up">
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <!-- Formulaire pour descendre la catégorie dans l'ordre d'affichage -->
                                                    <form method="post">
                                                        <input type="hidden" name="action" value="descendre ordre cat">
                                                        <input type="hidden" name="id_c" value="<?php echo $categorie['id_cat']; ?>">
                                                        <?php
                                                        // Vérifiez si la catégorie est la dernière dans la liste
                                                        if ($ordre_affichage === $nombre_categories) {
                                                            // Si c'est la dernière, masquez la flèche de descente
                                                            echo '<button disabled="disabled" type="submit" value="modifier" class="btn btn-primmary" style="opacity: 0;">';
                                                        } else {
                                                            // Sinon, affichez la flèche de descente
                                                            echo '<button type="submit" value="modifier" class="btn btn-primmary">';
                                                        }
                                                        ?>
                                                            <img class="icon_size" style="transform: rotate(90deg)" src="image\icone\arrow.svg" alt="Icone Arrow Down">
                                                        </button>
                                                    </form>
                                                </td>

                                                <td>
                                                    <!-- Formulaire pour supprimer la catégorie -->
                                                    <form method="post" action="">
                                                        <input type="hidden" name="action" value="suppr cat">
                                                        <input type="hidden" name="id_t" value="<?php echo $categorie['id_cat']; ?>">
                                                        <button type="submit" onclick="return confirm ('êtes-vous sûr de vouloir supprimer ?')">
                                                            <img class="icon_size" src="image\icone\trash.svg" alt="Icone Delete Categorie">
                                                        </button>
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
                                <a href="?page=ajout_categorie">
                                    <img src="image\icone\plus.svg" class="icon_size">
                                </a>
                            </td>
                        </tr>
                    </table>
                    <!-- END Produits -->
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
                            <!-- <small class="text-muted">Admin</small> -->
                        </div>
                        <?php
                        $sql_req = "SELECT * FROM user WHERE id_user = " . $_SESSION['id_user'];
                        $statm = $pdo->prepare($sql_req);
                        $statm->execute();
                        $row = $statm->fetch();
                        ?>
                        <div class="profil-photot">
                            <!-- <img src="/SGRC/php/image/profils/<?php echo $row['image']; ?>" alt=""> -->
                            <!-- <img src="/SGRC/image/img/source/profil.jpg" alt="Profil" /> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Script Dark Mode -->
        <script src="/SGRC/js/source/dark_mode.js"></script>
        <!-- Script Menu -->
        <script src="/SGRC/js/source/menu.js"></script>
        <!-- SCRIPT FONT AWESOME -->
        <script src="https://kit.fontawesome.com/438cd94e6c.js" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location:../../../index.php");
    exit();
}
?>