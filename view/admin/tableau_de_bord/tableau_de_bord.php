<?php
if ($_SESSION["role"] == "admin") {



?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Tableau de bord</title>
        <!-- Lien CSS -->
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
                    <a href="?page=tableau" class="active">
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
            <main>
                <h1>Tableau de bord</h1>

                <div class="statistical">
                    <!-- tl-commande -->
                    <div class="tl-commande">
                        <img class="big_icon_size" src="image\icone\magnifying-glass.svg" alt="Icone loupe">
                        <!-- middle -->
                        <div class="middle">
                            <div class="left">
                                <h3>Total des commandes</h3>
                                <h1><?php echo $nbtickets['nb_tickets'] ?></h1>
                            </div>

                        </div>
                    </div>
                    <!------------Fin statistical commande -------->


                    <!-- tl-connexion -->
                    <div class="tl-connexion">
                        <img class="big_icon_size" src="image\icone\stats.svg" alt="Icone Stats">
                        <!-- middle -->
                        <div class="middle">
                            <div class="left">
                                <h3>Utilisateurs</h3>
                                <h1><?php echo $nbusers['nb_users'] ?></h1>
                            </div>
                        </div>
                    </div>
                    <!------------Fin statistical Total de connexion  -------->

                </div>
                <div class="Commande-rencent">
                    <h2>Commandes récentes</h2>



                    <table>
                        <thead>
                            <th>Numéro de ticket</th>
                            <th>Numéro de table</th>
                            <th>Statut</th>
                            <th>Date de commande</th>
                            <th>Heure</th>
                            <th>Prix</th>
                        </thead>

                        <?php


                        foreach ($sumtickets as $sumticket) {
                            $idticket_caisse = $sumticket['id_ticket'];
                            //$statmt20->execute();
                            //$prixticket = $statmt20->fetch(PDO::FETCH_ASSOC);

                            $statmt24->execute();
                            $date_heure_T = $statmt24->fetch(PDO::FETCH_ASSOC);

                        ?>

                            <!-- Couleurs des lignes selon statut -->
                            <tbody>
                                <?php
                                if ($sumticket['statut'] == 'PAY') { ?>
                                    <tr>
                                        <td class="success"><?php echo  " # " . "\n" . $sumticket['id_ticket'] ?></td>
                                        <td class="success"><?php echo  " n° " . "\n" . $sumticket['numero_table'] ?></td>
                                        <td class="success"><?php echo  " " . "\n" . $sumticket['statut'] ?></td>
                                        <td class="success"><?php echo $date_heure_T['D'] ?></td>
                                        <td class="success"><?php echo $date_heure_T['H'] ?></td>
                                        <!--<td class="success"><?php //echo  " " . "\n" . number_format($prixticket['TT'], 2); ?> €</td>-->
                                        <td class="success">0€</td>
                                    </tr>
                                <?php
                                } elseif ($sumticket['statut'] == 'VAL') { ?>
                                    <tr>
                                        <td class="warning"><?php echo  " # " . "\n" . $sumticket['id_ticket'] ?></td>
                                        <td class="warning"><?php echo  " n° " . "\n" . $sumticket['numero_table'] ?></td>
                                        <td class="warning"><?php echo  " " . "\n" . $sumticket['statut'] ?></td>
                                        <td class="warning"><?php echo $date_heure_T['D'] ?></td>
                                        <td class="warning"><?php echo $date_heure_T['H'] ?></td>
                                        <!--<td class="warning"><?php //echo  " " . "\n" . number_format($prixticket['TT'], 2); ?> €</td>-->
                                        <td class="warning">0€</td>
                                    </tr>

                                <?php } else { ?>
                                    <tr>
                                        <td class="danger"><?php echo  " # " . "\n" . $sumticket['id_ticket'] ?></td>
                                        <td class="danger"><?php echo  " n° " . "\n" . $sumticket['numero_table'] ?></td>
                                        <td class="danger"><?php echo  " " . "\n" . $sumticket['statut'] ?></td>
                                        <td class="danger"><?php echo $date_heure_T['D'] ?></td>
                                        <td class="danger"><?php echo $date_heure_T['H'] ?></td>
                                        <!--<td class="danger"><?php echo  " " . "\n" . number_format($prixticket['TT'], 2); ?> €</td>-->
                                        <td class="danger">0€</td>
                                    </tr>
                                <?php } ?>


                                <!-- Ligne 1 -->


                            </tbody>
                        <?php } ?>
                    </table>



                    <a href="#">Afficher tout</a>
                    <style>
                        /* Style pour l'input */
                        #qrForm input[type="text"] {
                            width: 150px;
                            /* Ajustez la largeur souhaitée */
                            height: 20px;
                            /* Ajustez la hauteur souhaitée */
                            font-size: 12px;
                            /* Ajustez la taille de la police souhaitée */
                            padding: 5px;
                            /* Ajustez l'espacement intérieur souhaité */
                        }


                        #qrcode {
                            width: 150px;
                            height: 150px;
                            margin-top: 15px;
                            margin-left: 70px;
                        }
                    </style>


                    <script src="qrcodejs/qrcode.min.js"></script>
                    <h1>Générateur de QR code</h1>

                    <!-- Modifiez votre balise img pour appeler la fonction handleImageClick lors du clic -->
                    <form id="qrForm">
                        <label for="ip">Adresse IP : </label>
                        <input type="text" id="ip" value="<?php echo $_SERVER["SERVER_NAME"] ?>" name="ip" readonly>
                        <img class="big_icon_size" src="image\icone\qrcode.svg" alt="Générer le QR code" onclick="handleImageClick()">
                    </form>
                    <div id="qrcode"></div>

                    <script>
                        // Lorsque le formulaire est soumis, générer le QR code
                        document.getElementById("qrForm").addEventListener("submit", function(event) {
                            event.preventDefault(); // Empêcher la soumission du formulaire
                            var ip = document.getElementById("ip").value;
                            generateQRCode(ip);
                        });

                        // Fonction pour générer le QR code
                        function generateQRCode(ip) {
                            document.getElementById('qrcode').innerHTML = ""; // Vide la div qrcode
                            var qrCode = new QRCode(document.getElementById("qrcode"), {
                                text: "https://<?php echo $_SERVER["SERVER_NAME"] ?>", // Mettez le chemin vers votre page de connexion ici
                                width: 256,
                                height: 256
                            });
                        }

                        // Fonction appelée lors du clic sur l'image
                        function handleImageClick() {
                            var ip = document.getElementById("ip").value;
                            generateQRCode(ip);
                        }
                    </script>


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
                            <p style="text-transform: uppercase;"><b><?php echo $_SESSION['role'] ?></b></p>
                        </div>
                        <?php
                        $sql = mysqli_query($link, "SELECT * FROM user WHERE id_user = {$_SESSION['id_user']}");
                        if (mysqli_num_rows($sql) > 0) {
                            $row = mysqli_fetch_assoc($sql);
                        }
                        ?>
                        <div class="profil-photot">

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