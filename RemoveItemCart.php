<?php
require_once 'dbconfig.php';
require_once 'LoggedCheck.php';

if (!$username = checkAuth()) {
    header("Location: index.php");
    exit;
}

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

$id_product = mysqli_real_escape_string($conn, $_POST['id']);
$username = $_SESSION["username"];
$id_user = $_SESSION["user_id"];

$query_check = "SELECT quantita_totale FROM Prodotti_Carrello WHERE id_carrello IN (SELECT id_carrello FROM Carrello WHERE id_utente = '$id_user') AND id_prodotto = '$id_product'";
$result_check = mysqli_query($conn, $query_check);

if ($result_check && mysqli_num_rows($result_check) > 0) {
    $row = mysqli_fetch_assoc($result_check);
    $current_quantity = $row['quantita_totale'];
    if ($current_quantity > 1) {
        $new_quantity = $current_quantity - 1;
        $query_update = "UPDATE Prodotti_Carrello SET quantita_totale = '$new_quantity', prezzo_totale = '$new_quantity' * (SELECT prezzo FROM prodotti WHERE id = '$id_product') WHERE id_carrello IN (SELECT id_carrello FROM Carrello WHERE id_utente = '$id_user') AND id_prodotto = '$id_product'";
        $result_update = mysqli_query($conn, $query_update);

        if ($result_update) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('error' => 'Errore durante l\'aggiornamento nel carrello'));
        }
    } else {
        $query_remove = "DELETE FROM Prodotti_Carrello WHERE id_carrello IN (SELECT id_carrello FROM Carrello WHERE id_utente = '$id_user') AND id_prodotto = '$id_product'";
        $result_remove = mysqli_query($conn, $query_remove);

        if ($result_remove) {
            $query_check_empty = "SELECT COUNT(*) as total FROM Prodotti_Carrello WHERE id_carrello IN (SELECT id_carrello FROM Carrello WHERE id_utente = '$id_user')";
            $result_check_empty = mysqli_query($conn, $query_check_empty);
            $row_empty = mysqli_fetch_assoc($result_check_empty);
            $total_items = $row_empty['total'];

            if ($total_items == 0) {
                $query_remove_cart = "DELETE FROM Carrello WHERE id_utente = '$id_user'";
                $result_remove_cart = mysqli_query($conn, $query_remove_cart);
            }
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('error' => 'Errore durante la rimozione dal carrello'));
        }
    }
} else {
    echo json_encode(array('error' => 'Il prodotto non è presente nel carrello'));
}

mysqli_close($conn);
?>
