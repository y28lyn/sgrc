<?php
require_once("../../../include/connexion.php");
// Récupérer les données des requêtes SQL
$idTicket = $_GET['idTicket'];
list($statmt31) = $_GET['sqlQueries'];
$dateDuJour = date("Y-m-d");
$requetePrixMenu = $pdo->prepare("SELECT PU FROM menu WHERE date_menu = :dateDuJour;");
$requetePrixMenu->bindParam(':dateDuJour', $dateDuJour);
$requetePrixMenu->execute();
$prixMenu = $requetePrixMenu->fetch();

$statmt31 = $pdo->prepare('SELECT * FROM ligne_ticket LT, plat P, sous_categorie SC, categorie_plat C WHERE LT.id_plat = P.id_plat  AND P.id_sous_cat = SC.id_sous_cat AND SC.id_cat = C.id_cat AND id_ticket = :idTicket AND P.vu = 0 ORDER BY C.ordre_affichage_cat ASC , SC.ordre_aff_sous_cat ASC'); /*  */
$statmt31->bindParam(':idTicket', $idTicket, PDO::PARAM_INT);
$statmt31->execute();
$mes_lignes_tickets = $statmt31->fetchAll(PDO::FETCH_ASSOC);

//Calcul du nombre de plat par ticket

// Créez un tableau pour suivre les plats et leurs quantités
$platsConsolides = array();

// Parcourez toutes les lignes du ticket
foreach ($mes_lignes_tickets as $ligne) {
    $id_plat = $ligne['id_plat'];
    $nomDuPlat = $ligne['nom_plat'];
    $id_ticket = $ligne['id_ticket'];
    $commentaire = $ligne['commentaire'];
    $etat = $ligne['Etat'];

    $cleUnique =  $id_plat . '|' . $etat . '|' . $commentaire;
    // Si le plat est déjà dans le tableau, incrémente simplement la quantité
    if (isset($platsConsolides[$cleUnique])) {
        $platsConsolides[$cleUnique]['quantite'] += 1;
    } else {
        // Sinon, ajoutez le plat au tableau avec une quantité initiale de 1
        $platsConsolides[$cleUnique] = array(
            'id_plat' => $id_plat,
            'nom_plat' => $nomDuPlat,
            'id_ticket' => $id_ticket,
            'commentaire' => $commentaire,
            'Etat' => $etat,
            'quantite' => 1
        );
    }
}

?>
<div class="ticket_de_caisse">
    <table>
        <thead>
            <tr>
                <th>Plat</th>
                <th>Quantité</th>
                <th>Commentaire</th>
                <th>Etat</th>
                <th>Supprimer</th>
                <th>Diminuer</th>
                <th>Demander</th>
                <th>Servi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($platsConsolides as $plat) {

                $id_p = $plat['id_plat'];
                $quantite = $plat['quantite'];
                $nomDuPlat = $plat['nom_plat'];

            ?>

                <div class="container_ticket">
                    <tr>

                        <!--Affichage nom du palt-->
                        <td class="titre">
                            <?php echo $plat['nom_plat']; ?>
                        </td>

                        <!--Affichez quantite du palt-->
                        <td>
                            <?php echo $plat['quantite']; ?>
                        </td>

                        <!--Affichage commentaire du plat-->
                        <td>
                            <?php echo $plat['commentaire']; ?>
                        </td>

                        <!--Affichage etat du plat-->
                        <td>
                            <?php echo $plat['Etat']; ?>
                        </td>


                        <!--Form gestion Affichage et gestion des états-->
                        <?php
                        if ($plat['Etat'] == "En saisie") {
                        ?>
                            <!--Affichage form commentaire-->
                            <td>

                                <form method="POST">

                                    <input type="hidden" name="action" value="modifier_commentaire">

                                    <input type="text" name="commentaire" size="5" value="<?php echo isset($_POST['commentaire']) ? htmlspecialchars($_POST['commentaire']) : $plat['commentaire']; ?>" placeholder="<?php echo $plat['commentaire'] ?>">

                                    <input type="hidden" name="old_commentaire" value="<?php echo $plat['commentaire']; ?>">

                                    <input type="hidden" name="id_plat" value="<?php echo $plat['id_plat']; ?>">

                                    <input type="hidden" name="Etat" value="<?php echo $plat['Etat']; ?>">

                                    <input type="hidden" name="id_ticket" value="<?php echo $plat['id_ticket']; ?>">


                            </td>

                            <!--Affichage bouton validation form commentaire-->
                            <td>
                                <button class="logo" type="submit" value="modifier" class="btn btn-primary"> <i class="fa-solid fa-file-pen"></i></button>
                                </form>
                            </td>


                            <!--Form et bouton suppression d'un plat-->
                            <td>
                                <form method="POST">
                                    <button class="logo" type="submit"> <i class="fa-solid fa-trash-can"></i></button>
                                    <input type="hidden" name="action" value="supprimer_ligne_ticket">
                                    <input type="hidden" name="id_plat" value="<?php echo $plat['id_plat']; ?>">
                                    <input type="hidden" name="commentaire" value="<?php echo $plat['commentaire']; ?>">
                                    <input type="hidden" name="Etat" value="<?php echo $plat['Etat']; ?>">
                                    <input type="hidden" name="id_ticket" value="<?php echo $plat['id_ticket']; ?>">
                                </form>
                            </td>

                            <!--Form et bouton suppression d'une itération d'un plats-->
                            <td>
                                <form class="quantity-ticket" method="POST">
                                    <button class="quantity-minus" type="submit">-</button>
                                    <input type="hidden" name="action" value="diminue_ligne_ticket">
                                    <input type="hidden" name="id_plat" value="<?php echo $plat['id_plat']; ?>">
                                    <input type="hidden" name="commentaire" value="<?php echo $plat['commentaire']; ?>">
                                    <input type="hidden" name="Etat" value="<?php echo $plat['Etat']; ?>">
                                    <input type="hidden" name="id_ticket" value="<?php echo $plat['id_ticket']; ?>">
                                </form>
                            </td>


                            <td>
                                <form method="POST">
                                    <input type="hidden" name="action" value="etatDemande">
                                    <input type="hidden" name="id_ticket" value="<?php echo $plat['id_ticket']; ?>">
                                    <input type="hidden" name="id_plat" value="<?php echo $plat['id_plat']; ?>">
                                    <input type="hidden" name="commentaire" value="<?php echo $plat['commentaire'] ?>">
                                    <input type="hidden" name="etat" value="<?php echo $plat['Etat']; ?>">
                                    <input type="submit" value="Demander">
                                </form>
                            </td>
                            <?php
                        } else {

                            if ($plat['Etat'] == "Prêt") { ?>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="action" value="etatServi">
                                        <input type="hidden" name="id_ticket" value="<?php echo $plat['id_ticket']; ?>">
                                        <input type="hidden" name="id_plat" value="<?php echo $plat['id_plat']; ?>">
                                        <input type="hidden" name="commentaire" value="<?php echo $plat['commentaire']; ?>">
                                        <input type="hidden" name="etat" value="<?php echo $plat['Etat']; ?>">
                                        <input type="submit" value="Servi">
                                    </form>
                                </td>

                            <?php  } else { ?>
                                <td>

                                </td>
                    <?php }
                        }
                    }

                    ?>

                    </tr>
                </div>
        </tbody>
    </table>
</div>