<?php
session_start();
include "../../include/connexion.php";

// recup de la liste des tickets
$statmt16 = $pdo->prepare('SELECT ticket.*,sgr_table.* FROM ticket,sgr_table,ligne_ticket,plat WHERE statut != "PAY" AND plat.type_plat = "boisson" AND ticket.id_table = sgr_table.id_table AND ticket.id_ticket = ligne_ticket.id_ticket AND ligne_ticket.id_plat = plat.id_plat GROUP BY ticket.id_ticket');
$statmt16->execute();
$ticketsBar = $statmt16->fetchAll(PDO::FETCH_ASSOC);

$statmt17 = $pdo->prepare('SELECT ticket.id_ticket, plat.id_plat, plat.nom_plat, COUNT(nom_plat) AS quantité, ligne_ticket.commentaire AS commentaires, ligne_ticket.Statuts AS Stat, categorie_plat.ordre_affichage_cat, sous_categorie.ordre_aff_sous_cat FROM ligne_ticket, plat, ticket,categorie_plat, sous_categorie  WHERE ticket.id_ticket = :id_ticket AND ticket.id_ticket = ligne_ticket.id_ticket AND plat.id_plat=ligne_ticket.id_plat AND type_plat = "boisson" AND categorie_plat.id_cat = sous_categorie.id_cat AND plat.id_sous_cat = sous_categorie.id_sous_cat GROUP BY nom_plat, ligne_ticket.commentaire, ligne_ticket.Statuts ORDER BY categorie_plat.ordre_affichage_cat, sous_categorie.ordre_aff_sous_cat');
$statmt17->bindParam(':id_ticket', $u, PDO::PARAM_INT);

$statmt22 = $pdo->prepare('SELECT * FROM ticket,sgr_table WHERE ticket.id_table = sgr_table.id_table ORDER BY ordre ASC, date_c DESC');
$statmt22->execute();
$sumtickets = $statmt22->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Ticket cuisine -->

    <div class="card_ticket">

        <?php
        //on affiche tous les tickets du bar
        foreach ($ticketsBar as $ticketBar) {
            foreach ($sumtickets as $sumticket) {
                if ($sumticket['id_ticket'] == $ticketBar['id_ticket']) {
                    $idticket_caisse = $ticketBar['id_ticket'];
                    $statmt22->execute();
                    $status_ticket = $statmt22->fetch();
                    ?>
                    <div class="ticket" id="load_ticket">
                        <table>
                            <caption>
                                <?php
                                echo "Table n° :" . "\n" . $ticketBar['numero_table'] . '<br/>';
                                echo "N° Ticket : #";
                                $numTicket = $ticketBar['id_ticket'];
                                while (strlen($numTicket) < 3) {
                                    $numTicket = '0' . $numTicket;
                                }
                                echo $numTicket . '<br>';
                                $status = "";
                                if ($sumticket['statut'] == 'PAY') {
                                    $status = "<p class='success'>PAY</p>";
                                } elseif ($sumticket['statut'] == 'VAL') {
                                    $status = "<p class='warning'>VALIDE</p>";
                                } else {
                                    $status = "<p class='danger'>SAISIE</p>";
                                }
                                echo "statut : " . $status;
                                ?>
                            </caption>
                            <thead>
                                <tr>
                                    <th>Quantite</th>
                                    <th>Nom Boissons</th>
                                    <th>Commentaires</th>
                                    <th>Statuts</th>
                                </tr>
                            </thead>
                            <?php

                            
                            $u = $ticketBar['id_ticket'];
                            $statmt17->execute();
                            $commandes = $statmt17->fetchAll();
                            foreach ($commandes as $commande) {
                                $idTicket = $commande['id_ticket'];
                                $id_p = $commande['id_plat'];
                                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $commande['quantité']; ?>
                                        </td>
                                        <td>
                                            <?php echo $commande['nom_plat']; ?>
                                        </td>
                                        <td>
                                            <?php echo $commande['commentaires']; ?>
                                        </td>
                                        <td>
                                            <?php echo $commande['Stat']; ?>
                                        </td>
                                        <td>
                                        <form method="POST">

                                            
                                            <input name="action" type="hidden" value="Pret">
                                            <input name="id_ticket" type="hidden" value=<?php echo $idTicket ?>> 
                                            <input name="id_plat" type="hidden" value=<?php echo $id_p ?>> 
                                            <input type="submit" name="Validez" value="Prêt"> 
                                        </form>

										</td>
                                    </tr>
                                </tbody>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    <?php
                }
            }
        } ?>
    </div>

    </div>

</body>

</html>