<?php 
    require_once 'LoggedCheck.php';
    if ($username = checkAuth()) {
        header("Location: index__logged.php");
        exit;
    }
?>


<?php
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        $username_or_email = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        if (filter_var($username_or_email, FILTER_VALIDATE_EMAIL)) {
            $query_check = "SELECT * FROM registrazioni WHERE email = '$username_or_email'";
        } else {
            $query_check = "SELECT * FROM registrazioni WHERE username = '$username_or_email'";
        }
        $res = mysqli_query($conn, $query_check);
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if(password_verify($password, $row["password"]))
            {
                $_SESSION["username"] = $row["username"];
                $_SESSION["user_id"] = $row["id"];
                header("Location: index__logged.php");
                exit;
            }
            else
            {
                $errore = true;
            }
        } else {
            $errore = true;
        }
    } 
?>




<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href='LogAndRegistrationStyle.css'>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
    <script src="loginScript.js" defer></script>
</head>

<body>
    <div class="login-transition-left-to-right">
        <div id="login-wrap">
            <img src="logo.jpeg" id="logo-img" alt="">
            <h1>Effettua la Registrazione!</h1>
            <?php if (isset($errore)) {
                    echo "<p class='query-error'>";
                    echo "Errore: username o password errati.";
                    echo "</p>";
                }
                ?>
            <form name="login_form" method="post" id="form-style">
                <label for="username">Username</label>
                <input type="text" required name="username" id="username" class="input-style" placeholder="Inserisci Username">
                <div id="username-error" class="error-style"></div>

                <label for="password">Password</label>
                <div class="pswrd-wrap">
                    <input type="password" required name="password" id="password" class="input-style" placeholder="Inserisci Password">
                    <img src="images/eye.png" id="toggle-pswrd" alt="">
                </div>
                <div id="password-error" class="error-style"></div>

                <input type="submit" value="Login" id="send-button">
            </form>
            <a href="registration__section.php">Non hai un account? Clicca qui!</a>
            <a href = "ForgotPassword.php"> Hai dimenticato la password? </a>
            <a href="index.php">Torna alla home...</a>
        </div>
    </div>
</body>
</html>

