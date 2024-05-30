<?php
function generateToken($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

require_once 'dbconfig.php'; 
if (isset($_POST['email'])) {
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
        $headers = "From:tecnovagroup@gmail.com"; 
    
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
} else header("Location: index.php")
?>

?>