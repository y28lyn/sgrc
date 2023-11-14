<?php
// Connexion à la base de données
include "../../../include/connexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_ligne_ticket'])) {
    $idLigneTicket = $_POST['id_ligne_ticket'];

    // Préparez la requête de suppression
    $deleteQuery = $pdo->prepare('DELETE FROM ligne_ticket WHERE id_ligne_ticket = :id_ligne_ticket');

    // Liez les paramètres
    $deleteQuery->bindParam(':id_ligne_ticket', $idLigneTicket, PDO::PARAM_INT);

    // Exécutez la requête de suppression
    if ($deleteQuery->execute()) {
        // Suppression réussie
        $response = array('success' => true);
    } else {
        // Échec de la suppression
        $response = array('success' => false, 'message' => 'Échec de la suppression de la ligne.');
    }

    // Fermez la connexion à la base de données
    $pdo = null;

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('success' => false, 'message' => 'Requête invalide.'));
}
?>
