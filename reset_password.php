<?php
require_once 'LoggedCheck.php';


if (!isset($_GET['token']) || !isset($_GET['email'])) {
    header("Location: index.php");
    exit;
}

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

$email = mysqli_real_escape_string($conn, $_GET['email']);
$token = mysqli_real_escape_string($conn, $_GET['token']);


$queryToken = "SELECT * FROM password_reset WHERE email = '$email' AND token = '$token' AND expiration_date > NOW()";

$result = mysqli_query($conn, $queryToken);

if (mysqli_num_rows($result) == 0) {
    header("Location: index.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $errore = array();

    if (empty($password) || empty($repeat_password)) {
        $errore[] = "Tutti i campi sono obbligatori.";
    } elseif ($password !== $repeat_password) {
        $errore[] = "Le password non corrispondono.";
    } elseif (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/', $password)) {
        $errore[] = "La password deve contenere almeno 8 caratteri, di cui almeno una maiuscola, una minuscola, un numero e un simbolo tra !@#$%^&*";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $update_query = "UPDATE registrazioni SET password = '$hashed_password' WHERE email = '$email'";

        if (mysqli_query($conn, $update_query)) {
            $delete_query = "DELETE FROM password_reset WHERE email = '$email'";
            mysqli_query($conn, $delete_query);

            header("Location: changed__password.php?q=" . urlencode($email));
            exit;
        } else {
            $errore[] = "Errore nell'aggiornamento della password" . mysqli_error($conn);
        }
    }
}
?>




<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href='LogAndRegistrationStyle.css'>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
    <script src="ResetPassword.js" defer></script>
</head>

<body>
    <div class="login-transition-left-to-right">
        <div id="login-wrap">
            <img src="logo.jpeg" id="logo-img" alt="">
            <h1>Inserisci le nuove credenziali.</h1>

            <?php if (isset($errore)) {
                foreach ($errore as $err) {
                    echo "<p class='query-error'>";
                    echo $err;
                    echo "</p>";
                }
            } ?>

            <form name="login_form" method="post" id="form-style">
            <label for="password">Password</label>
                <div class="pswrd-wrap">
                    <input type="password" required name="password" id="password" class="input-style" placeholder="Inserisci Password">
                    <img src="images/eye.png" id="toggle-pswrd" alt="">
                </div>
                <div id="password-error" class="error-style"></div>

                <label for="repeat_password">Ripeti Password</label>
                <input type="password" required name="repeat_password" id="repeat_password" class="input-style" placeholder="Ripeti Password">
                <div id="repeat_password-error" class="error-style"></div>

                <input type="submit" value="Resetta" id="send-button">
            </form>
            <a href="index.php">Torna alla home...</a>
        </div>
    </div>
</body>
</html>
