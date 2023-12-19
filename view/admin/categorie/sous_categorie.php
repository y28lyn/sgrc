<?php
if (!isset($_SESSION)) {
    session_start();
    $_SESSION['id_t'] = $_POST['id_t'];
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
        <title>Sous-catégorie</title>
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
                <h1>Sous Categorie</h1>
                <?php
                // Code PHP peut être ajouté ici
                ?>
                <div class="Produits">
                    <!-- Tableau -->
                    <table class="table-grid">
                        <caption>
                            <a href="?page=categorie" class="back_btn">Retour</a>
                            Ordre Sous Categories
                        </caption>
                        <thead>
                            <tr>
                                <th>Nom Sous Categorie</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        // Boucle pour afficher toutes les sous-catégories
                        $nombre_sous_categories = count($sous_cats);
                        foreach ($sous_cats as $sous_cat) {
                        ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $sous_cat['nom_sous_cat']; ?>
                                    </td>
                                    <td>
                                        <table>
                                            <td>
                                                <!-- Formulaire de modification de la sous-catégorie -->
                                                <form action="?page=modif_sous_cat" method="post">
                                                    <input type="hidden" name="id_c" value="<?php echo $sous_cat['id_sous_cat']; ?>">
                                                    <button type="submit" value="modifier" class="btn btn-primary">
                                                        <img class="icon_size" src="image\icone\pen-to-square.svg" alt="Icone Edit Categorie"> </button>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <!-- Formulaire pour monter la sous-catégorie dans l'ordre -->
                                                <form method="post">
                                                    <input type="hidden" name="action" value="monter ordre sscat">
                                                    <input type="hidden" name="id_c" value="<?php echo $sous_cat['id_sous_cat']; ?>">
                                                    <input type="hidden" name="id_t" value="<?php echo $sous_cat['id_cat']; ?>">
                                                    <?php
                                                    // Récupérez l'ordre d'affichage de la sous-catégorie
                                                    $ordre_affichage = $sous_cat['ordre_aff_sous_cat'];

                                                    // Vérifiez si l'ordre est égal à 1, auquel cas masquez la flèche de montée
                                                    if ($ordre_affichage === 1) {
                                                        echo '<button disabled="disabled" type="submit" value="modifier" class="btn btn-primmary" style="opacity: 0;">';
                                                    } else {
                                                        echo '<button type="submit" value="modifier" class="btn btn-primmary">';
                                                    }
                                                    ?>
                                                        <img class="icon_size" style="transform: rotate(-90deg)" src="image\icone\arrow.svg" alt="Icone Arrow Up">
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <!-- Formulaire pour descendre la sous-catégorie dans l'ordre -->
                                                <form method="post">
                                                    <input type="hidden" name="action" value="descendre ordre sscat">
                                                    <input type="hidden" name="id_c" value="<?php echo $sous_cat['id_sous_cat']; ?>">
                                                    <input type="hidden" name="id_t" value="<?php echo $sous_cat['id_cat']; ?>">
                                                    <?php
                                                    // Récupérez l'ordre d'affichage de la sous-catégorie
                                                    $ordre_affichage = $sous_cat['ordre_aff_sous_cat'];

                                                    // Vérifiez si la sous-catégorie est la dernière dans la liste
                                                    if ($ordre_affichage === $nombre_sous_categories) {
                                                        echo '<button disabled="disabled" type="submit" value="modifier" class="btn btn-primmary" style="opacity: 0;">';
                                                    } else {
                                                        echo '<button type="submit" value="modifier" class="btn btn-primmary">';
                                                    }
                                                    ?>
                                                        <img class="icon_size" style="transform: rotate(90deg)" src="image\icone\arrow.svg" alt="Icone Arrow Down">
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <!-- Formulaire de suppression de la sous-catégorie -->
                                                <form method="post" action="">
                                                    <input type="hidden" name="action" value="suppr sous cat">
                                                    <input type="hidden" name="id_c" value="<?php echo $sous_cat['id_sous_cat']; ?>">
                                                    <input type="hidden" name="id_t" value="<?php echo $sous_cat['id_cat']; ?>">
                                                    <button type="submit" onclick="return confirm ('êtes-vous sûr de vouloir supprimer ?')">
                                                        <img class="icon_size" src="image\icone\trash.svg" alt="Icone Delete Categorie">
                                                    </button>
                                                </form>
                                            </td>

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
                                <a href="?page=ajout_sous_cat">
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
<?php
// Assurez-vous que cette partie du code est à la suite du code où vous affichez les sous-catégories.

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "suppr_sous_cat") {
    // Récupérez l'ID de la sous-catégorie à supprimer
    $id_sous_cat = $_POST["id_c"];

    // Écrivez une requête SQL pour supprimer la sous-catégorie de la base de données
    $sql = "DELETE FROM sous_categories WHERE id_sous_cat = :id_sous_cat";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id_sous_cat", $id_sous_cat, PDO::PARAM_INT);

    // Exécutez la requête
    if ($stmt->execute()) {
        // Redirigez l'utilisateur vers la page de la catégorie après la suppression
        header("Location: ?page=sous_categorie");
        exit();
    } else {
        // Gérez l'erreur si la suppression échoue
        echo "La suppression de la sous-catégorie a échoué.";
    }
}
?>