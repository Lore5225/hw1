<?php
     require_once 'LoggedCheck.php';
     if (!$username = checkAuth()) {
         header("Location: login__section.php");
         exit;
     }

?>




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
    <script src="Shopping.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ShoppingStyle.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    <title>Shopping</title>
</head>
<body>
    <header>
        <nav>
            <a href="index.php"><img src="images/homeIcon.png" class="nav__icons" alt="Home"></a>
            <a href="ShoppingCart.php"><img src="images/shopping-cart.png" class="nav__icons" alt="Cart"></a>
        </nav>
    </header>
    <div class="container__grid">
        <div class="grid__products__container"></div>
    </div>
    <div class="modal__container"></div>
    
    <footer>
      <div class="footer-container">
        <p>© Copyright Tecnova Group Srl - P.IVA IT05086260873</p>
        <div>
          <img src="images/facebook.png" alt="" />
          <img src="images/pngegg (1).png" alt="" />
        </div>
      </div>
    </footer>
</body>
</html>
