<?php
     require_once 'LoggedCheck.php';
     if (!$username = checkAuth()) {
         header("Location: login__section.php");
         exit;
     }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="ShoppingCart.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ShoppingCart.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>ShoppingCart</title>
</head>
<body>
    <header>
        <nav>
            <a href="index.php"><img src="images/homeIcon.png" class="nav__icons" alt=""></a>
            <a href="ShoppingPage.php"><div class="nav__text">Torna allo shop</div></a>
        </nav>
    </header>
    <div class="cart__container">
        <div class="title__cart"><p>Carrello</p></div>
        <div class="products__wrap"></div>
    </div>
</body>
</html>
