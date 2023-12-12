<div class="card_ticket">
<?php
// Boucle pour chaque ticket en cours au bar
foreach ($ticketsBar as $ticketBar) {
?>
    <div class="ticket">
        <?php
        // Affichage du numero de la table et du numero de ticket
        ?>

        <!-- Tableau pour afficher les details de la commande -->
        <table>
            <caption>
                <?php
                // Affichage du numero de la table et du numero de ticket
                echo "Table n° :" . "\n" . $ticketBar['numero_table'] . '<br/>';
                echo "N° Ticket : #";

                // Formatage du numero de ticket avec des zeros a gauche
                $numTicket = $ticketBar['id_ticket'];
                while (strlen($numTicket) < 3) {
                    $numTicket = '0' . $numTicket;
                }

                // Affichage du numero de ticket formate
                echo $numTicket;
                ?>
            </caption>
            <thead>
                <tr>
                    <th>Quantit&eacute;</th>
                    <th>Nom du Produit</th>
                    <th>Prix</th>
                </tr>
            </thead>

            <?php
            // Recuperation des commandes pour ce ticket
            $idticket_caisse = $ticketBar['id_ticket'];
            $statmt17->execute();
            $commandes = $statmt17->fetchAll();

            // Recuperation du prix total pour ce ticket
            $statmt20->execute();
            $prixTT = $statmt20->fetch(PDO::FETCH_ASSOC);

            // Affichage des details de chaque commande
            foreach ($commandes as $commande) {
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $commande['quantite']; ?> </td>
                        <td><?php echo $commande['nom_plat']; ?> </td>
                        <td><?php echo number_format($commande['prix'], 2); ?>€</td>
                    </tr>
                    <tr></tr>
                </tbody>

            <?php
            }
            ?>

        </table>

        <!-- Affichage du prix total pour ce ticket -->
        <tr>Prix Total : <?php echo number_format($prixTT['TT'], 2); ?>€</tr>

        <!-- Formulaire pour payer le ticket -->
        <tr>
            <form method="POST">
                <input name="action" type="hidden" value="Payer">
                <input name="id_ticket" id="id_ticket" type="hidden" value=<?php echo $numTicket ?>>
                <input type="submit" name="Validez" value="Payer" onclick="return confirm('Comfirmer le paiement:') ">
            </form>
        </tr>
    </div>
<?php
}
?>
</div>