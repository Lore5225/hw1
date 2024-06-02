<?php   
require_once 'dbconfig.php';
require_once 'LoggedCheck.php';

if (!$username = checkAuth()) {
    header("Location: index.php");
    exit;
}

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

$products = array();
$USERNAME = mysqli_real_escape_string($conn, $_SESSION["username"]);

$query = "
    SELECT 
        p.id AS id_prodotto,
        p.nome,
        p.immagine,
        pc.quantita_totale AS Quantità,
        pc.prezzo_totale AS Totale
    FROM prodotti p
    JOIN Prodotti_Carrello pc ON p.id = pc.id_prodotto
    JOIN Carrello c ON pc.id_carrello = c.id_carrello
    JOIN registrazioni r ON c.id_utente = r.id
    WHERE r.username = '$USERNAME'
";

$res = mysqli_query($conn, $query);

if (!$res) {
    echo json_encode(["error" => "Errore!"]);
    mysqli_close($conn);
    exit;
}

while ($row = mysqli_fetch_assoc($res)) {
    $products[] = $row;
}

mysqli_free_result($res);
mysqli_close($conn);

echo json_encode($products);
?>
