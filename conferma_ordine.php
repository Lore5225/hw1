<?php
session_start();


if (!isset($_SESSION['id_ordine'])) {
    header("Location: index.php");
    exit;
}

require_once 'dbConfig.php';
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

$id_ordine = mysqli_real_escape_string($conn, $_SESSION['id_ordine']);


$query_order_information = "SELECT o.nome, o.cognome, o.indirizzo, o.codice_postale, o.numero_telefono, op.quantità, op.prezzo_totale, p.nome AS nome_prodotto
        FROM Ordini o
        INNER JOIN Ordini_Prodotti op ON o.id_ordine = op.id_ordine
        INNER JOIN Prodotti p ON op.id_prodotto = p.id
        WHERE o.id_ordine = $id_ordine";

$result = mysqli_query($conn, $query_order_information);

if (mysqli_num_rows($result) > 0) {
    $order_details = "";
    $total_price = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $order_details .= $row["nome_prodotto"] . " " . $row["quantità"] . " " .'€'. $row["prezzo_totale"] . "\n";
        $total_price += $row["prezzo_totale"];
    }

    $query_order_information = "SELECT email FROM Registrazioni r
            INNER JOIN Ordini o ON r.id = o.id_utente
            WHERE o.id_ordine = $id_ordine";
    $result = mysqli_query($conn, $query_order_information);
    $row = mysqli_fetch_assoc($result);
    $cliente_email = $row["email"];

    ini_set('SMTP', 'smtp.gmail.com');
    ini_set('smtp_port', 25);

    $message = "Gentile Cliente,\n\n";
    $message .= "Le confermiamo la ricezione dell'ordine numero '$id_ordine'. Di seguito i dettagli dell'ordine:\n\n";
    $message .= $order_details . "\n";
    $message .= "Totale: €$total_price";
    $subject = "Conferma ordine";

    $resultEmail = mail($cliente_email, $subject, $message, "From: tecnovagroup@gmail.com");

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="confirm.css">
    <script src="confirm.js"></script>
    <title>Conferma Ordine</title>
</head>
<body>
    <div class="message-box">
    <h1> <?php     
    if ($resultEmail) {
        $query_update_flag = "UPDATE Ordini SET email_inviata = 1 WHERE id_ordine = $id_ordine";
        mysqli_query($conn, $query_update_flag);
        unset($_SESSION['id_ordine']);
        mysqli_close($conn);
        echo "<h1 class='confirm__message'>";
        echo "Email di conferma inviata con successo a $cliente_email per l'ordine numero:" . $id_ordine;
        echo "</h1>";
    } else {
        echo "<h1 class='confirm__message'>";
        echo "Errore di invio dell'email all'indirizzo $cliente_email";
        echo "</h1>";
    }
} else {
    echo "Errore.";
}
 ?></h1>
        <p>Ti reindirizziamo alla home...</p>
    </div>
</body>
</html>
