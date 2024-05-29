<?php
if (!isset($_GET['q'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="confirm.css">
    <script src="confirm.js"></script>
    <title>Reset Password</title>
</head>
<body>
    <div class="message-box">
    <h1>Gentile utente, la password corrispondente all'email <?php echo $_GET['q'] ?> è stata cambiata con successo</h1>
        <p>Ti reindirizziamo alla home...</p>
    </div>
</body>
</html>

