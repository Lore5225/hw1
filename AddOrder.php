<?php 
    require_once 'LoggedCheck.php';
    if (!$username = checkAuth()) {
        header("Location: index__logged.php");
        exit;
    }
?>

<?php
    require_once 'dbConfig.php';

    if (isset($_POST["Nome"]) && isset($_POST["Cognome"]) && isset($_POST["address"]) && isset($_POST["postal_code"]) && isset($_POST["phone_number"]) && isset($_POST["notes"]) ) {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $id_utente = $_SESSION["user_id"];
        
        $nome = mysqli_real_escape_string($conn, $_POST['Nome']);
        $cognome = mysqli_real_escape_string($conn, $_POST['Cognome']);
        $indirizzo = mysqli_real_escape_string($conn, $_POST['address']);
        $codice_postale = mysqli_real_escape_string($conn, $_POST['postal_code']);
        $numero_telefono = mysqli_real_escape_string($conn, $_POST['phone_number']);
        $note = mysqli_real_escape_string($conn, $_POST['notes']);
        $errore = array();

        if(empty($nome) || empty($cognome) || empty($indirizzo) || empty($codice_postale) || empty($numero_telefono)) {
            $errore[] = "Tutti i campi sono obbligatori.";
        }

        if(empty($errore)) {
            $query_add_order = "INSERT INTO Ordini(id_utente, nome, cognome, indirizzo, codice_postale, numero_telefono, note) 
                                VALUES ('$id_utente', '$nome', '$cognome', '$indirizzo', '$codice_postale', '$numero_telefono', '$note')";

            if (mysqli_query($conn, $query_add_order)) {
                $id_ordine = mysqli_insert_id($conn);

                $query_get_cart = "SELECT id_prodotto, quantita_totale, prezzo_totale FROM Prodotti_Carrello WHERE id_carrello IN (SELECT id_carrello FROM Carrello WHERE id_utente = $id_utente)";
                $result = mysqli_query($conn, $query_get_cart);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id_prodotto = $row['id_prodotto'];
                        $quantita_totale = $row['quantita_totale'];
                        $prezzo_totale = $row['prezzo_totale'];

                        $query_add_order_products = "INSERT INTO Ordini_Prodotti(id_ordine, id_prodotto, quantità, prezzo_totale) 
                                                    VALUES ('$id_ordine', '$id_prodotto', '$quantita_totale', '$prezzo_totale')";
                        mysqli_query($conn, $query_add_order_products);
                    }
                }

                $query_clear_cart = "DELETE FROM Prodotti_Carrello WHERE id_carrello IN (SELECT id_carrello FROM Carrello WHERE id_utente = $id_utente)";
                mysqli_query($conn, $query_clear_cart);

                $query_clear_main_cart = "DELETE FROM Carrello WHERE id_utente = $id_utente";
                mysqli_query($conn, $query_clear_main_cart);

                $_SESSION['id_ordine'] = $id_ordine;

                header("Location: conferma_ordine.php");
                exit;

            } else {
                $errore[] = "Errore durante l'inserimento dell'ordine: " . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
    } else header("Location: index.php");
?>
