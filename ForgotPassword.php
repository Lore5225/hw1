<?php

function generateToken($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

require_once 'dbconfig.php'; 
require_once 'LoggedCheck.php';

$email = '';
$status = '';
if (checkAuth()) {
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    
    $user_id = $_SESSION['user_id'];
    $query = "SELECT email FROM registrazioni WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
    }
    mysqli_close($conn);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];
    $token = generateToken();
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $queryToken = "INSERT INTO password_reset (email, token, expiration_date) VALUES ('$email', '$token', NOW() + INTERVAL 15 MINUTE)";
    if (mysqli_query($conn, $queryToken)) {
        ini_set('SMTP', 'smtp.gmail.com');
        ini_set('smtp_port', 25);
        $reset_password_link = "https://localhost/reset_password.php?token=" . urlencode($token) . "&email=" . urlencode($email);
        $subject = "Reset Password";
        $message = "Gentile cliente,\n\nPer reimpostare la tua password, utilizza il seguente link: $reset_password_link";
        $headers = "From: tecnovagroup@gmail.com"; 
    
        if (mail($email, $subject, $message, $headers)) {
            header("Location: ConfirmEmailReset.php?status=success&email=" . urlencode($email));
            exit;
        } else {
            header("Location: ConfirmEmailReset.php?status=error&email=" . urlencode($email));
            exit;
        }

    } else {
        header("Location: ConfirmEmailReset.php?status=error&email=" . urlencode($email));
        exit;
    }
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="LogAndRegistrationStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
    <script src="ForgotPassword.js" defer></script>
</head>

<body>
    <div class="login-transition-left-to-right">
        <div id="login-wrap">
            <img src="logo.jpeg" id="logo-img" alt="">
            <h1>Inserisci l'email dell'account</h1>
            <h1>Ti manderemo un'email di reset della password</h1>
            <form name="login_form" method="post" id="form-style">
                <label for="email">Email</label>
                <input type="email" required name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" class="input-style" placeholder="Inserisci Email">
                <div id="email-error" class="error-style"></div>
                <input type="submit" value="Invia" id="send-button">
            </form>
            <a href="index.php">Torna alla home...</a>
        </div>
    </div>
</body>
</html>
