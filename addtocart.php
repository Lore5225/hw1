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

$query_check = "SELECT quantità FROM Carrello WHERE id_utente = '$id_user' AND product = '$id_product'";
$result_check = mysqli_query($conn, $query_check);

if (mysqli_num_rows($result_check) > 0) {
    $row = mysqli_fetch_assoc($result_check);
    $new_quantity = $row['quantità'] + 1;
    $query_update = "UPDATE Carrello SET quantità = '$new_quantity', prezzo_totale = '$new_quantity' * (SELECT prezzo FROM prodotti WHERE id = '$id_product') WHERE id_utente = '$id_user' AND product = '$id_product'";
    $result_update = mysqli_query($conn, $query_update);

    if ($result_update) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('error' => 'Errore durante l\'aggiornamento nel carrello'));
    }
} else {
    $query_add = "INSERT INTO Carrello (id_utente, product, quantità, prezzo_totale) VALUES ('$id_user', '$id_product', 1, (SELECT prezzo FROM prodotti WHERE id = '$id_product'))";
    $result_add = mysqli_query($conn, $query_add);

    if ($result_add) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('error' => 'Errore durante l\'inserimento nel carrello'));
    }
}

mysqli_close($conn);
?>
