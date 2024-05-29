<?php
require_once 'dbconfig.php';

if (isset($_GET["q"])) {
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    if (!$conn) {
        die(json_encode(["error" => "Errore di connessione: " . mysqli_connect_error()]));
    }
    
    $searchData = mysqli_real_escape_string($conn, $_GET["q"]);
    $query = "
    SELECT 
        schedaProdotti.contenuto
    FROM 
        prodotti
    INNER JOIN 
        schedaProdotti ON prodotti.id = schedaProdotti.prodotto_id
    WHERE 
        prodotti.nome = '$searchData'";

    $res = mysqli_query($conn, $query);
    
    if (!$res) {
        die(json_encode(["error" => "Errore: " . mysqli_error($conn)]));
    }
    

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        
        $content = $row['contenuto'];
        
        $contentArray = json_decode($content, true);
        
        $indexedContent = [];
        
        $indexedContent['titoli'] = array_values($contentArray['titoli']);
        $indexedContent['paragrafi'] = array_values($contentArray['paragrafi']);
        $indexedContent['immagini'] = array_values($contentArray['immagini']);
        
        mysqli_free_result($res);
        mysqli_close($conn);
        
        echo json_encode($indexedContent);
    } else {
        echo json_encode(["error" => "Nessun risultato trovato."]);
    }
} else {
    header("Location: index.php");
}
?>
