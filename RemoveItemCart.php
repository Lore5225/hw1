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

mysqli_autocommit($conn, false);


$id_user = $_SESSION["user_id"];

$query_check = "SELECT quantità FROM Carrello WHERE id_utente = '$id_user' AND product = '$id_product'";
$result_check = mysqli_query($conn, $query_check);

if (mysqli_num_rows($result_check) > 0) {
    $row = mysqli_fetch_assoc($result_check);
    $current_quantity = $row['quantità'];

    if ($current_quantity > 1) {
        $new_quantity = $current_quantity - 1;
        $query_update = "UPDATE Carrello SET quantità = '$new_quantity', prezzo_totale = '$new_quantity' * (SELECT prezzo FROM prodotti WHERE id = '$id_product') WHERE id_utente = '$id_user' AND product = '$id_product'";
        $result_update = mysqli_query($conn, $query_update);

        if ($result_update) {
            mysqli_commit($conn);
            echo json_encode(array('success' => true));
        } else {
            mysqli_rollback($conn);
            echo json_encode(array('error' => 'Errore durante l\'aggiornamento nel carrello'));
        }
    } else {
        $query_remove = "DELETE FROM Carrello WHERE id_utente = '$id_user' AND product = '$id_product'";
        $result_remove = mysqli_query($conn, $query_remove);

        if ($result_remove) {
            mysqli_commit($conn);
            echo json_encode(array('success' => true));
        } else {
            mysqli_rollback($conn);
            echo json_encode(array('error' => 'Errore durante la rimozione dal carrello'));
        }
    }
} else {
    echo json_encode(array('error' => 'L\'elemento non esiste nel carrello'));
}

mysqli_close($conn);
?>
