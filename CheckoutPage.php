<?php
     require_once 'LoggedCheck.php';
     if (!$username = checkAuth()) {
         header("Location: login__section.php");
         exit;
     }


     $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

     $username = $_SESSION['username'];
     $id_utente = $_SESSION["user_id"];
     
     $query_check_cart = "SELECT * FROM Carrello WHERE id_utente = $id_utente";
     $result_check_cart = mysqli_query($conn, $query_check_cart);
     
     if (mysqli_num_rows($result_check_cart) == 0) {
         header("Location: ShoppingPage.php");
         exit;
     }
?>

<?php
    require_once 'dbConfig.php';

    if (isset($_POST["Nome"]) && isset($_POST["Cognome"]) && isset($_POST["address"]) && isset($_POST["postal_code"]) && isset($_POST["phone_number"]) && isset($_POST["notes"]) ) {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $username = $_SESSION['username'];
    
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

                $query_get_cart = "SELECT product, quantità, prezzo_totale FROM Carrello WHERE id_utente = $id_utente";
                $result = mysqli_query($conn, $query_get_cart);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $product = $row['product'];
                        $quantità = $row['quantità'];
                        $prezzo_totale = $row['prezzo_totale'];

                        $query_add_order_products = "INSERT INTO Ordini_Prodotti(id_ordine, id_prodotto, quantità, prezzo_totale) 
                                                    VALUES ('$id_ordine', '$product', '$quantità', '$prezzo_totale')";
                        mysqli_query($conn, $query_add_order_products);
                    }
                }

                $query_clear_cart = "DELETE FROM Carrello WHERE id_utente = $id_utente";
                mysqli_query($conn, $query_clear_cart);

                $_SESSION['id_ordine'] = $id_ordine;

                header("Location: conferma_ordine.php");
                exit;

            } else {
                $errore[] = "Errore durante l'inserimento dell'ordine: " . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
    }
    ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "CheckoutStyle.css"></link>
    <title>Checkout</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src = "Checkout.js"></script>
</head>
<body>

<header>
    <nav>
        <a href= "index.php" > <img src="images/homeIcon.png" class ="nav__icons" alt=""></a>
        <a href = "ShoppingPage.php" > <div class ="nav__text">Torna allo shop</div> </a> 
        
    </nav>
    </header>
    <div class="checkout__container">
        <h2>Checkout</h2>
        <form action="" method="post">
            <label for="Nome">Nome</label>
            <input type="text" id="Nome" name="Nome" required>

            <label for="Cognome">Cognome</label>
            <input type="text" id="Cognome" name="Cognome" required>

            <label for="Indirizzo">Indirizzo</label>
            <input type="text" id="address" name="address" required>

            <label for="Codice Postale">Codice Postale</label>
            <input type="text" id="postal_code" name="postal_code" required>

            <label for="Numero">Numero di Telefono</label>
            <input type="text" id="phone_number" name="phone_number" required>

            <label for="Note">Note aggiuntive (Citofono,Condominio,ecc)</label>
            <input type="text" id="notes" name="notes">
            <button type="submit" class ="checkout__button">Conferma Ordine</button>
        </form>
        <div class ="order__summary">Riepilogo Ordine</div>
        <div class ="cart__items__container"></div>
    </div>
</body>
</html>