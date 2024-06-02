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
    $new_quantity = $row['quantita_totale'] + 1;
    
    $query_update = "UPDATE Prodotti_Carrello SET quantita_totale = '$new_quantity', prezzo_totale = '$new_quantity' * (SELECT prezzo FROM prodotti WHERE id = '$id_product') WHERE id_carrello IN (SELECT id_carrello FROM Carrello WHERE id_utente = '$id_user') AND id_prodotto = '$id_product'";
    $result_update = mysqli_query($conn, $query_update);

    if ($result_update) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('error' => 'Errore durante l\'aggiornamento nel carrello'));
    }
} else {
    $query_cart_check = "SELECT id_carrello FROM Carrello WHERE id_utente = '$id_user'";
    $result_cart_check = mysqli_query($conn, $query_cart_check);
    
    if ($result_cart_check && mysqli_num_rows($result_cart_check) == 0) {
        $query_create_cart = "INSERT INTO Carrello (id_utente) VALUES ('$id_user')";
        $result_create_cart = mysqli_query($conn, $query_create_cart);
        
        if (!$result_create_cart) {
            echo json_encode(array('error' => 'Errore durante l\'aggiunta al carrello carrello'));
            exit;
        }
    }
    

    $query_add = "INSERT INTO Prodotti_Carrello (id_carrello, id_prodotto, quantita_totale, prezzo_totale) SELECT id_carrello, '$id_product', 1, (SELECT prezzo FROM prodotti WHERE id = '$id_product') FROM Carrello WHERE id_utente = '$id_user'";
    $result_add = mysqli_query($conn, $query_add);

    if ($result_add) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('error' => 'Errore durante l\'inserimento nel carrello'));
    }
}

mysqli_close($conn);
?>
