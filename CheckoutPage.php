<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CheckoutStyle.css">
    <title>Checkout</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="Checkout.js" defer></script>
</head>

<body>

    <header>
        <nav>
            <a href="index.php"> <img src="images/homeIcon.png" class="nav__icons" alt=""></a>
            <a href="ShoppingPage.php">
                <div class="nav__text">Torna allo shop</div>
            </a>
        </nav>
    </header>

    <div class="checkout__container">
        <h2>Checkout</h2>
        <form id="checkoutForm" action="AddOrder.php" method="post">
            <label for="Nome">Nome</label>
            <input type="text" id="Nome" name="Nome" required>
            <div id="nomeError" class="error-style"></div>

            <label for="Cognome">Cognome</label>
            <input type="text" id="Cognome" name="Cognome" required>
            <div id="cognomeError" class="error-style"></div>

            <label for="Indirizzo">Indirizzo</label>
            <input type="text" id="address" name="address" required>
            <div id="addressError" class="error-style"></div>

            <label for="Codice Postale">Codice Postale</label>
            <input type="text" id="postal_code" name="postal_code" required>
            <div id="postalCodeError" class="error-style"></div>

            <label for="Numero">Numero di Telefono</label>
            <input type="text" id="phone_number" name="phone_number" required>
            <div id="phoneNumberError" class="error-style"></div>

            <label for="Note">Note aggiuntive (Citofono,Condominio,ecc)</label>
            <input type="text" id="notes" name="notes">

            <button type="submit" class="checkout__button">Conferma Ordine</button>
        </form>

        <div class="order__summary">Riepilogo Ordine</div>
        <div class="cart__items__container"></div>
    </div>

</body>

</html>