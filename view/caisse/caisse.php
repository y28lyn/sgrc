<?php
if (!isset($_SESSION)) {
	session_start();
}

if ($_SESSION["role"] == "caisse") {
	//ini_set('display_errors', 'off');  // Bloque les erreur php

?>
	<!DOCTYPE html>
	<html lang="fr">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Commande</title>
		<!-- Lien CSS -->
		<link rel="stylesheet" href="/SGRC/css/style_admin/tableau_de_bord/tableau_de_bord.css" />
		<link rel="stylesheet" href="/SGRC/css/style_bar/bar.css">
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
					<!-- Ticket -->
					<a href="?page=encours" class="active">
					<img class="icon_size_sidebar" src="image\icone\basket.svg" alt="Icone Commande">
						<h3>Commande en cour</h3>
					</a>
					<a href="?page=historique" class="">
					<img class="icon_size_sidebar" src="image\icone\history.svg" alt="Icone History">
						<h3>Historique</h3>
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
				<!-- Titre de la page -->
				<h1>Commande en cours</h1>
				<br>

				<?php 
				 $dateDuJour = date("Y-m-d");
				 $requetePrixMenu = $pdo->prepare("SELECT PU FROM menu WHERE date_menu = :dateDuJour;");
				 $requetePrixMenu->bindParam(':dateDuJour', $dateDuJour);
				 $requetePrixMenu->execute(); 
				 $prixMenu = $requetePrixMenu->fetch();				 
				 ?>

				 

				<!-- Section des tickets -->
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
										<th>Nom produit</th>
										<!-- <th>Nom du Produit</th> -->
										<th>Prix</th>
									</tr>
								</thead>

								<?php
								// Recuperation des commandes pour ce ticket
								$idticket_caisse = $ticketBar['id_ticket'];
								$statmt17->execute();
								$commandes = $statmt17->fetchAll();
								?>
								<tbody>
								<tr>	
									<td><?php echo $ticketBar['nb_couvert']; ?> </td>
									<td><?php echo 'Menu'; ?> </td>
									<td><?php echo $prixMenu['PU'] * $ticketBar['nb_couvert']; ?>€</td>
								</tr>
								<tr></tr>
							</tbody>
							<?php
									
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
								// var_dump($prixMenu)
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
							<p style="text-transform: uppercase;"><b><?php echo $_SESSION['role'] ?></b></p>
						</div>
						<div class="profil-photot">
							<img src="/SGRC/php/image/profils/<?php echo $row['image']; ?>" alt="">
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
		<!-- SCRIPT JQUERY POUR FONTION LOADER NOTIFICATION -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

		<script>
			function load_tickets() {
    		// Récupérer les nouveaux tickets sans recharger la page entière en AJAX
				$.ajax({
					url: "/SGRC/view/caisse/load_ticket.php",
					type: "GET",
					data: {
						ticketsBar: <?php echo json_encode($ticketsBar); ?>,
						sqlQueries: <?php echo json_encode(array($statmt16, $statmt185, $statmt17, $statmt20)); ?>
					}, // Passer les ticketsBar et les requêtes SQL via AJAX
					success: function(data) {
						// Mettre à jour seulement la partie nécessaire
						$(".card_ticket").html(data);
					}
				});
			}	
	
			// Appeler la fonction toutes les 2 secondes
			setInterval(load_tickets, 2000);

		</script>
	</body>

	</html>

	
<?php
} else {
	echo ("vous n'avez pas le droit d'être là");
	header("Location:../../../index.php");
	exit();
}
?>