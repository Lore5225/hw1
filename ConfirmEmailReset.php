<?php
if (isset($_GET['status']) && isset($_GET['email']) && $_GET['status'] == 'success') {
    $message = "Abbiamo mandato una email all'indirizzo " . htmlspecialchars($_GET['email']);
} elseif (!isset($_GET['status']) || !isset($_GET['email'])) {
    header("Location: index.php");
    exit;
} else if (isset($_GET['status']) && isset($_GET['email']) && $_GET['status'] == 'error') {
    $message = "Errore durante l'invio dell'email di reset all'indirizzo, riprova più tardi " . htmlspecialchars($_GET['email']);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="confirm.css">
    <script src="confirm.js"></script>
    <title>Conferma</title>
</head>
<body>
    <div class="message-box">
       


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="confirm.css">
    <script src="confirm.js"></script>
    <title>Conferma</title>
</head>
<body>
    <div class="message-box">
    <h1> <?php echo $message ?> </h1>
        <p>Ti reindirizziamo alla home...</p>
    </div>
</body>
</html>
