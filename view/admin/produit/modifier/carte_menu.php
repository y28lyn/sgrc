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
        <!--lien CSS -->
        <link rel="stylesheet" href="/SGRC/css/style_admin/produit/produit.css" />
        <link href="/SGRC/css/style_admin/produit/edition-ajoute.css" rel="stylesheet">
        <link href="/SGRC/css/common.css" rel="stylesheet">

        <title>Modification carte</title>
    </head>

    <body>
        <main>
            <div class="produit">
                <table class="table-grid">
                    <caption>Carte</caption>
                    <thread>
                        <tr>
                            <th>nom du plat</th>
                            <th>description</th>
                            <th>type de plat</th>
                            <th>prix à la carte</th>
                            <th>action</th>
                        </tr>
                    </thread>
                    <a href="?page=produit" class="back_btn"> Retour</a>
                    <?php
                    foreach ($cartes as $carte) {
                    ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $carte['nom_plat']; ?>
                                </td>
                                <td class="description-text">
                                    <?php echo $carte['description']; ?>
                                </td>
                                <td>
                                    <?php echo $carte['nom_sous_cat']; ?>
                                </td>
                                <td>
                                    <?php echo $carte['PU_carte']; ?>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <!--supprimer-->
                                                <form method="post" action="">
                                                    <input type="hidden" name="action" value="suppr carte">
                                                    <input type="hidden" name="id_p" value="<?php echo $carte['id_plat']; ?>">
                                                    <button type="submit" onclick="return confirm('êtes-vous sûr de vouloir supprimer ?')"><i class="fa-solid fa-trash-can"></i></button>

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

                    <form method="post">
                        <tr class="add">
                            <input type="hidden" name="action" value="ajout carte">
                            <input type="hidden" name="id_m" value="<?php echo $_SESSION['id_m']; ?>">
                            <td colspan="5">
                                <a class="icon_size" href="?page=ajout_carte">
                                    <img class="icon_size_sidebar" src="image\icone\plus.svg" alt="Icone Plus">
                                </a>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </main>
        <div class="right">
            <div class="top">
                <div class="theme-toggler" id="theme-toggler">
                    <!-- Dark and Light -->
                    <i><img class="icon_darkmode" src="image\icone\darkmode.svg" alt="Icone Dark Mode"></i>
                </div>
                <div class="profil">
                    <?php
                    $sql_req = "SELECT * FROM user WHERE id_user = " . $_SESSION['id_user'];
                    $statm = $pdo->prepare($sql_req);
                    $statm->execute();
                    $row = $statm->fetch();
                    ?>
                    <div class="profil-photot">
                        <!-- <img src="/SGRC/php/images/<?php echo $row['image']; ?>" alt=""> -->
                        <!-- <img src="/SGRC/image/img/source/profil.jpg" alt="Profil" /> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Script DarkMode -->
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
    header("Location: /SGRC/index.php");
    exit();
}
?>