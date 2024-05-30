<?php
require_once 'LoggedCheck.php';
if (!$username = checkAuth()) {
    header("Location: login__section.php");
    exit;
}

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
$username = mysqli_real_escape_string($conn, $_SESSION["username"]);

$query_user = "SELECT id, username, email FROM registrazioni WHERE username = '$username'";
$res_user = mysqli_query($conn, $query_user);
$user_info = mysqli_fetch_assoc($res_user);
$id_utente = $user_info['id'];

$query_orders_count = "SELECT COUNT(*) as total_orders FROM Ordini WHERE id_utente = '$id_utente'";
$res_orders_count = mysqli_query($conn, $query_orders_count);
$total_orders = mysqli_fetch_assoc($res_orders_count)['total_orders'];

$query_orders = "SELECT * FROM Ordini WHERE id_utente = '$id_utente'";
$res_orders = mysqli_query($conn, $query_orders);
$orders = [];
while ($row = mysqli_fetch_assoc($res_orders)) {
    $id_ordine = $row['id_ordine'];
    $query_order_items = "SELECT op.*, p.nome as nome_prodotto FROM Ordini_Prodotti op JOIN prodotti p ON op.id_prodotto = p.id WHERE id_ordine = '$id_ordine'";
    $res_order_items = mysqli_query($conn, $query_order_items);
    $order_items = [];
    while ($item = mysqli_fetch_assoc($res_order_items)) {
        $order_items[] = $item;
    }
    $row['items'] = $order_items;
    $orders[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <script src="profile.js" defer></script>
    <title>Profilo</title>
</head>
<body>
    <div class="container">
        <nav>
            <button id="profile__information__button">Informazioni Profilo</button>
            <button id="order__information__button">Ordini</button>
            <a href="index.php"><button>Torna alla Home</button></a>
        </nav>
        <div class="profile-info">
            <h2>Informazioni Profilo</h2>
            <p>ID Utente:</strong> <?php echo $user_info['id']; ?></p>
            <p>Username:</strong> <?php echo $user_info['username']; ?></p>
            <p>Email:</strong> <?php echo $user_info['email']; ?></p>
            <p>Numero di Ordini:</strong> <?php echo $total_orders; ?></p>
            <a href="ForgotPassword.php"> <button>Cambia Password </button></a>
        </div>

        <div class="orders-info hidden">
            <h2>Ordini</h2>
            <?php if (count($orders) > 0): ?>
                <ul class="orders-list">
                    <?php foreach ($orders as $order): ?>
                        <li>
                            <p>ID Ordine:</strong> <?php echo $order['id_ordine']; ?></p>
                            <p>Data:</strong> <?php echo $order['data_ordine']; ?></p>
                            <p>Nome:</strong> <?php echo $order['nome']; ?></p>
                            <p>Cognome:</strong> <?php echo $order['cognome']; ?></p>
                            <p>Indirizzo:</strong> <?php echo $order['indirizzo']; ?></p>
                            <p>Codice Postale:</strong> <?php echo $order['codice_postale']; ?></p>
                            <p>Numero di Telefono:</strong> <?php echo $order['numero_telefono']; ?></p>
                            <p>Note:</strong> <?php echo $order['note']; ?></p>
                            <button class="order-details-button">Dettagli ordine</button>
                            <div class="order__text">
                                <?php foreach ($order['items'] as $item): ?>
                                    <div class="order__item">
                                        <p>Prodotto:</strong> <?php echo $item['nome_prodotto']; ?></p>
                                        <p>Quantità:</strong> <?php echo $item['quantità']; ?></p>
                                        <p>Prezzo Totale:</strong> <?php echo $item['prezzo_totale']; ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Non hai effettuato ordini.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

