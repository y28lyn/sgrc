<?php
//session_start();
//include "../../include/connexion.php"; // Inclure le fichier de connexion à la base de données

if ($_SESSION["role"] == "cuisine" && isset($_POST['submit_plats_prets'])) {
    $id_ticket = $_POST['id_ticket'];
    if (isset($_POST['plats_prets']) && is_array($_POST['plats_prets'])) {
        foreach ($_POST['plats_prets'] as $id_plat) {
            // Mettez à jour la base de données pour marquer le plat comme prêt en cuisine
            $sql = "UPDATE ligne_ticket SET plat_pret_cuisine = 1 WHERE id_ticket = :id_ticket AND id_plat = :id_plat";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_ticket', $id_ticket, PDO::PARAM_INT);
            $stmt->bindParam(':id_plat', $id_plat, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
    // Redirigez l'utilisateur vers la page précédente après le traitement
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit;
} else {
    echo "Vous n'avez pas le droit d'accéder à cette page.";
}
?>
