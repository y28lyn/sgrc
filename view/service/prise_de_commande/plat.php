<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["role"] == "service") {
    $Table_selec = $_SESSION['tables']; //le numero de la table à afficher
    // Code pour afficher le nombre de couvert
    $idTable = $_SESSION['idT'];//l'identifiant de la table à afficher

    $recupTicket = $pdo->prepare('SELECT id_ticket,nb_couvert FROM ticket WHERE id_table = :id_table AND statut != "PAY"');
    $recupTicket->bindParam(":id_table", $idTable, PDO::PARAM_INT);
    $recupTicket->execute();
    $idTicket = $recupTicket->fetch();

    //Récup nombre de couvert
    $nb_couverts_recup = $idTicket['nb_couvert'];//le nombre de couvert à afficher

    //Récup des catégorie de plat
    $statmt28 = $pdo->prepare('SELECT * FROM categorie_plat');
   
    //Récup des sous catégories des catégories
    $statmt29 = $pdo->prepare('SELECT * FROM sous_categorie inner join plat on plat.id_sous_cat = sous_categorie.id_sous_cat where id_cat = :idcat AND (SELECT COUNT(P.id_plat) FROM menu M, plat P, menu_contient_plat MP,sous_categorie SC WHERE P.id_plat=MP.id_plat AND M.id_menu=MP.id_menu and P.id_sous_cat=SC.id_sous_cat and P.id_sous_cat = :idsouscat and P.vu = 0 and M.date_menu = CURDATE()) is not null GROUP BY nom_sous_cat ORDER BY ordre_aff_sous_cat'); /*  */
    $statmt29->bindParam(':idcat', $cat, PDO::PARAM_INT);
    $statmt29->bindParam(':idsouscat', $sous_cat, PDO::PARAM_INT);

    //Récup des plats des sous catégories
    $statmt30 = $pdo->prepare('SELECT P.* FROM menu M, plat P, menu_contient_plat MP,sous_categorie SC WHERE P.id_plat=MP.id_plat AND M.id_menu=MP.id_menu and P.id_sous_cat=SC.id_sous_cat and P.id_sous_cat = :id_sous_cat and P.vu = 0 and M.date_menu = CURDATE()'); /*  */
    $statmt30->bindParam(':id_sous_cat', $sous_cat, PDO::PARAM_INT);
 
    //Récup des lignes de ticket du ticket
    $statmt31 = $pdo->prepare('SELECT * FROM ligne_ticket LT, plat P, sous_categorie SC, categorie_plat C WHERE LT.id_plat = P.id_plat  AND P.id_sous_cat = SC.id_sous_cat AND SC.id_cat = C.id_cat AND id_ticket = :idTicket AND P.vu = 0 ORDER BY C.ordre_affichage_cat ASC , SC.ordre_aff_sous_cat ASC'); /*  */
    $statmt31->bindParam(':idTicket', $idTicket, PDO::PARAM_INT);
    ?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/SGRC/css/style_service/plat.css">
        <link rel="stylesheet" href="/SGRC/css/common.css">
        <title>Plat a prendre</title>
        <!-- BOXICONS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        
    </head>

    <body>
        <div class="texte1">
            <p> Table sélectionné :
                <?php echo $Table_selec ?>
            </p>
            <form>
                <input type="hidden" name="action" value="oublier_table">
                <input type="hidden" name="id_t" value="<?php echo $idTicket['id_ticket']; ?>">
                <a href="index.php" class="back_btn"> Retour</a>
                
                
            </form>
        </div>
        <p class="texte2"> Nombre de couvert :
            <?php echo $nb_couverts_recup; ?> &nbsp; <a
                href="index.php?page=nbcouv_modif"><i class="fa-solid fa-pen-to-square"></i></a>
        </p>
        <p class="texte3"> numero du ticket :
            <?php echo $_SESSION['id_ticket']; ?>
        </p>
        <div class="plat">
            <div class="container">
                <div class="tabs">
                    <?php
                    $statmt28->execute();
                    $categories = $statmt28->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($categories as $categorie){
                        $cat = $categorie['id_cat'];
                        ?>
                        <button class="tab-button" id="tab-button-<?php echo $cat; ?>"><?php echo $categorie['nom_cat']; ?></button>
                        <?php
                    } ?>
                </div>
                <?php
                $statmt28->execute();
                $categories = $statmt28->fetchAll(PDO::FETCH_ASSOC);
                foreach ($categories as $categorie){
                
                    $cat = $categorie['id_cat'];
                    ?>
                    <div class="tab-content" id="tab-content-<?php echo $cat; ?>">
                    <?php
                        $statmt29->execute();
                        $souscats = $statmt29->fetchAll(PDO::FETCH_ASSOC);
                        foreach($souscats as $souscat){
                            $sous_cat = $souscat['id_sous_cat'];
                            ?>
                            <button class="sub-tab-button" onclick="toggleSubTabContent('<?php echo $sous_cat; ?>')"><?php echo $souscat['nom_sous_cat']; ?></button>
                            <div class="sub-tab-content" id="sub-tab-content-<?php echo $sous_cat; ?>" style="display: none;">
                                <?php
                                $statmt30->execute();
                                $plats = $statmt30->fetchAll(PDO::FETCH_ASSOC);
                                echo '<table border="0">';
                                foreach($plats as $plat){
                                    $id_p = $plat['id_plat'];
                                    echo '<tr><td>' . $plat['nom_plat'] . '</td><td>' . $plat['description'] . '</td>';
                                    echo '<td>';
                                    // boutons +
                                    echo '<form method="POST">';
                                    echo '<input type="hidden" name="action" value="cree_ligne_ticket">';
                                    echo '<input type="hidden" name="id_plat" value="' . $id_p . '">';
                                    echo '<input type="hidden" name="id_ticket" value="' . $_SESSION['id_ticket'] . '">';
                                    echo '<div class="quantity">';
                                        echo'<button type="button" class="quantity-minus" onclick="decrementValue(this)">-</button>';
                                        echo'<input type="number" name="nb_plat" id="quantity" value="' . $nb_couverts_recup . '">';
                                        echo'<button type="button" class="quantity-plus" onclick="incrementValue(this)">+</button>';
                                    echo '</div>';
                                    echo '<input type="submit" value="Valider"  id="valider">';
                                    echo '</form>';
                                    echo '</td></tr>';
                                }
                                echo '</table>';
                                ?>
                            </div>
                            <?php
                        }

                    ?>
                    </div>
                    <?php
                }
                ?>
                <?php
                $idTicket = $_SESSION['id_ticket'] ;
                $statmt31->execute();
                $mes_lignes_tickets = $statmt31->fetchAll(PDO::FETCH_ASSOC);

                //Calcul du nombre de plat par ticket

                // Créez un tableau pour suivre les plats et leurs quantités
                $platsConsolides = array();

                // Parcourez toutes les lignes du ticket
                foreach ($mes_lignes_tickets as $ligne) {
                    $id_plat = $ligne['id_plat'];
                    $nomDuPlat = $ligne['nom_plat'];
                    $commentaire = $ligne['commentaire'];
                    $id_ticket = $ligne['id_ticket'];
                    $id_ligne_ticket = $ligne['id_ligne_ticket'];
                    // Si le plat est déjà dans le tableau, incrémente simplement la quantité
                    if (isset($platsConsolides[$id_plat]) && $commentaire==null) {
                        $platsConsolides[$id_plat]['quantite']+= 1;
                    } else {
                        if($commentaire!=null){
                                // Sinon, ajoutez le plat au tableau avec une quantité initiale de 1
                                $platsConsolides[$id_plat.$id_ligne_ticket] = array(
                                'id_ligne_ticket' => $id_ligne_ticket,
                                'id_plat' => $id_plat,
                                'nom_plat' => $nomDuPlat,
                                'id_ticket'=> $id_ticket,
                                'commentaire' => $commentaire,
                                'quantite' => 1
                                );      
                        }
                        else{
                            // Sinon, ajoutez le plat au tableau avec une quantité initiale de 1
                            $platsConsolides[$id_plat] = array(
                            'id_plat' => $id_plat,
                            'nom_plat' => $nomDuPlat,
                            'id_ticket'=> $id_ticket,
                            'commentaire' => $commentaire,
                            'quantite' => 1
                            ); 
                        }
                    }
                }

                ?>
                <br>
                <br>
                <br>
            </div>


            <script>
                function toggleSubTabContent(subTabId) {
                    var subTabContent = document.getElementById('sub-tab-content-' + subTabId);
                    if (subTabContent.style.display === 'none') {
                        subTabContent.style.display = 'block';
                    } else {
                        subTabContent.style.display = 'none';
                    }
                }
            </script>
        </div>

        <!--Affichage de la commande-->
        <div class="ticket_de_caisse">
            <table>
                <?php
                foreach ($platsConsolides as $plat) {
                    $id_p = $plat['id_plat'];
                    $quantite = $plat['quantite'];
                    $nomDuPlat = $plat['nom_plat'];
                    ?>
                    
                    <div class="container_ticket">
                        <tr>
                             
                            <?php 
                            if(isset($plat['id_ligne_ticket'])){?>

                                <!--Affichage nom du palt-->
                                <td class="titre" style="color:black">
                                    <?php echo $plat['nom_plat']; ?>
                                </td>

                                <!--Affichez quantite du palt-->
                                <td>
                                    <?php echo $plat['quantite']; ?>
                                </td>
                                <!--Affichage form commentaire-->
                                <td>
                                <form method="POST">
                                    <input type="text" name="commentaire" size="5" value="<?php echo $plat['commentaire'];?>">
                                
                                    <input type="hidden" name="action" value="modifier_commentaire">

                                    <input type="hidden" name="id_ligne_ticket" value="<?php echo $plat['id_ligne_ticket']; ?>">

                                </td>
                                <!--Affichage bouton validation form commentaire-->
                                <td>
                                        <button type="submit" value="modifier" class="btn btn-primary"> <i class="fa-solid fa-file-pen"></i></button>
                                    </form>
                                </td>

                                
                                <!--Form et bouton suppression d'un plat-->
                                <td>
                                    <form method="POST">
                                    <button type="submit"> <i class="fa-solid fa-trash-can"></i></button>
                                        <input type="hidden" name="action" value="supprimer_ligne_ticket">
                                        <input type="hidden" name="id_ligne_ticket" value="<?php echo $plat['id_ligne_ticket']; ?>">
                                    </form>
                                </td>

                                <!--Form et bouton suppression d'une itération d'un plats-->
                                <td>
                                    <form class="quantity-ticket" method="POST">
                                        <button class="quantity-minus" type="submit">-</button>
                                            <input type="hidden" name="action" value="diminue_ligne_ticket">
                                            <input type="hidden" name="id_ligne_ticket" value="<?php echo $plat['id_ligne_ticket']; ?>">
                                    </form>
                                </td>

                            <?php } 
                            else{
                            ?>
                            

                            <!--Affichage nom du palt-->
                            <td class="titre" style="color:black">
                                <?php echo $plat['nom_plat']; ?>
                            </td>

                             <!--Affichez quantite du palt-->
                            <td>
                                <?php echo $plat['quantite']; ?>
                            </td>

                            <td>
                                <form method="POST">
                                    <input type="text" name="commentaire" size="5">
                                
                                    <input type="hidden" name="action" value="modifier_commentaire">
                        
                                    <input type="hidden" name="quantite" value="<?php echo $plat['quantite']; ?>">
                                    <input type="hidden" name="id_ticket" value="<?php echo $plat['id_ticket']; ?>">
                                    <input type="hidden" name="id_plat" value="<?php echo $plat['id_plat']; ?>">

                            </td>
                            <!--Affichage bouton validation form commentaire-->
                            <td>
                                    <button type="submit" value="modifier" class="btn btn-primary"> <img class="icon_size" src="image\icone\pen-to-square.svg" alt="Icone Edit Categorie"></button>
                                </form>
                            </td>

                            

                            <!--Form et bouton suppression d'un plat-->
                            <td>
                                <form method="POST">
                                <button type="submit"> <img class="icon_size" src="image\icone\trash.svg" alt="Icone Delete Categorie"></button>
                                    <input type="hidden" name="action" value="supprimer_ligne_ticket">
                                    <input type="hidden" name="id_ticket" value="<?php echo $plat['id_ticket']; ?>">
                                    <input type="hidden" name="id_plat" value="<?php echo $plat['id_plat']; ?>">
                                </form>
                            </td>

                            <!--Form et bouton suppression d'une itération d'un plats-->
                            <td>
                                <form class="quantity-ticket" method="POST">
                                    <button class="quantity-minus" type="submit">-</button>
                                        <input type="hidden" name="action" value="diminue_ligne_ticket">
                                        <input type="hidden" name="id_ticket" value="<?php echo $plat['id_ticket']; ?>">
                                        <input type="hidden" name="id_plat" value="<?php echo $plat['id_plat']; ?>">
                                        
                                </form>
                            </td>
                            <?php } ?>     
                        </tr>
                    <?php

                }   
                ?>
            </table>
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

    

    <script>
    function incrementValue(button) {
        var input = button.previousElementSibling;
        var value = parseInt(input.value);
        input.value = isNaN(value) ? 1 : value + 1;
    }

    function decrementValue(button) {
        var input = button.nextElementSibling;
        var value = parseInt(input.value);
        if (value > 1) {
            input.value = isNaN(value) ? 1 : value - 1;
        }
    }
    </script>
    
    <script>
        const tabButtons = document.querySelectorAll('.tab-button'); //Cuisine/Bar/Sommelier
        const tabContents = document.querySelectorAll('.tab-content');//mise en bouche /entrée /plat principal /dessert
        function handleTabButtonClick(event) {
            // Masquer tous les contenus d'onglet
            tabContents.forEach(tabContent => {
                tabContent.style.display = 'none';
            });

            // Afficher le contenu de l'onglet sélectionné
            const tabContentId = event.target.id.replace('tab-button-', 'tab-content-');
            document.getElementById(tabContentId).style.display = 'flex';
        }

        // Ajouter un gestionnaire d'événement de clic sur chaque bouton d'onglet
        tabButtons.forEach(tabButton => {
            tabButton.addEventListener('click', handleTabButtonClick);
        });  

        
    </script>
    <script>
        const affichageCuisine = document.getElementById("tab-button-1");
        affichageCuisine.click();
    </script>  


</body>
    </html>
    <?php
} else {
    echo ("vous n'avez pas le droit d'être là");
    header("Location: /SGRC/index.php");
    exit();
}
?>