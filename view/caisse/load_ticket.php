<div class="card_ticket">
    <?php
    require_once("../../include/connexion.php");
    // Récupérer les données des requêtes SQL
    $ticketsBar = $_GET['ticketsBar'];
    list($statmt16, $statmt185, $statmt17, $statmt20) = $_GET['sqlQueries'];
    $dateDuJour = date("Y-m-d");
    $requetePrixMenu = $pdo->prepare("SELECT PU FROM menu WHERE date_menu = :dateDuJour;");
    $requetePrixMenu->bindParam(':dateDuJour', $dateDuJour);
    $requetePrixMenu->execute(); 
    $prixMenu = $requetePrixMenu->fetch();		
    		 
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
                    <th>Nom produit</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <tr>	
                    <td><?php echo $ticketBar['nb_couvert']; ?> </td>
                    <td><?php echo 'Menu'; ?> </td>
                    <td><?php echo $prixMenu['PU'] * $ticketBar['nb_couvert']; ?>€</td>
                </tr>
                <tr></tr>
            </tbody>

            <?php
            // recup de la liste des tickets non payé
            $statmt16 = $pdo->prepare('SELECT * FROM ticket,sgr_table WHERE statut != "PAY" AND ticket.id_table = sgr_table.id_table');
            $statmt16->execute();
            $ticketsBar = $statmt16->fetchAll(PDO::FETCH_ASSOC);

            // recup de la liste des tickets payé (pour l'historique)
            $statmt185 = $pdo->prepare('SELECT * FROM ticket,sgr_table WHERE statut = "PAY" AND ticket.id_table = sgr_table.id_table ORDER BY ticket.id_ticket DESC');
            $statmt185->execute();
            $ticketsBar2 = $statmt185->fetchAll(PDO::FETCH_ASSOC);

            // recup nom plat / quantite / prix unitaire
            $statmt17 = $pdo->prepare('SELECT DISTINCT ticket.id_ticket, plat.nom_plat, COUNT(nom_plat) AS quantite ,ligne_ticket.commentaire, (plat.PU_carte * COUNT(nom_plat)) as prix FROM ligne_ticket, plat, ticket, sous_categorie, categorie_plat WHERE ticket.id_ticket = :id_ticket and ticket.id_ticket = ligne_ticket.id_ticket and plat.id_plat=ligne_ticket.id_plat and plat.id_sous_cat = sous_categorie.id_sous_cat and sous_categorie.id_cat = categorie_plat.id_cat GROUP BY nom_plat ORDER BY ordre_affichage_cat, ordre_aff_sous_cat;');
            $statmt17->bindParam(':id_ticket', $idticket_caisse, PDO::PARAM_INT);

            //recup le prix total du ticket
            $statmt20 = $pdo->prepare('SELECT sum(plat.PU_carte) as TT FROM ligne_ticket, plat, ticket WHERE ligne_ticket.id_ticket = ticket.id_ticket AND ligne_ticket.id_plat = plat.id_plat AND ticket.id_ticket = :id_ticket ');
            $statmt20->bindParam(':id_ticket', $idticket_caisse, PDO::PARAM_INT);

           // Recuperation des commandes pour ce ticket
            $idticket_caisse = $ticketBar['id_ticket'];
            // Utiliser la méthode execute sur les objets de requête préparée
            $statmt17->bindParam(':id_ticket', $idticket_caisse, PDO::PARAM_INT);
            $statmt17->execute();
            $commandes = $statmt17->fetchAll();
            
            // Recuperation du prix total pour ce ticket
            $statmt20->bindParam(':id_ticket', $idticket_caisse, PDO::PARAM_INT);
            $statmt20->execute();
            $prixTT = $statmt20->fetch(PDO::FETCH_ASSOC);
            
            // Affichage des détails de chaque commande
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
        <tr>Prix Total : <?php echo $prixMenu['PU'] * $ticketBar['nb_couvert'] + $prixTT['TT']; ?>€</tr>

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