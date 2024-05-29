<?php 
    require_once 'LoggedCheck.php';
    if ($username = checkAuth()) {
        header("Location: index__logged.php");
        exit;
    }
?>


<?php
 $errore = array();
if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["repeat_password"]) && isset($_POST["terms"]))
{
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $repeat_password = mysqli_real_escape_string($conn, $_POST["repeat_password"]);

    if(empty($username) || empty($email) || empty($password) || empty($repeat_password)) {
        $errore[] = "Tutti i campi sono obbligatori.";
    } else if ($password !== $repeat_password) {
        $errore[] = "Le password non corrispondono.";
    } 
    else if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/', $password)) {
            $errore[] = "La password deve contenere almeno 8 caratteri, di cui almeno una maiuscola, una minuscola, un numero e un simbolo tra !@#$%^&*";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errore[] = "E-mail non valida!";
    } else if (!isset($_POST["terms"])) {
        $errore[] = "Devi accettare le condizioni per procedere.";
    }
    

    else {
        $query_check1 = "SELECT * FROM registrazioni WHERE username = '$username'";
        $res = mysqli_query($conn, $query_check1);

        if(mysqli_num_rows($res) > 0) {
            $errore[] = "Username già in uso.";
        } 

        $query_check2 = "SELECT * FROM registrazioni WHERE email = '$email'";
        if(mysqli_num_rows($res) > 0) {
            $errore[] = "Email già in uso.";
        }
        else {
            $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
            $query_add = "INSERT INTO registrazioni(username, email, password) VALUES ('$username', '$email', '$passwordHashed')";
            if(mysqli_query($conn, $query_add)) {
                $id = mysqli_insert_id($conn);
                $_SESSION["user_id"] = $id;
                $_SESSION["username"] = $username;
                header("Location: index__logged.php");
                exit;
            } else {
                $errore[] = "Errore nell'esecuzione della query: " . mysqli_error($conn);
            }
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
    <script src="Registration.js" defer></script>
</head>

<body>
    <div class="login-transition-left-to-right">
        <div id="login-wrap">
            <img src="logo.jpeg" id="logo-img" alt="">
            <h1>Effettua la Registrazione!</h1>
            <?php if (isset($errore)) {
                foreach ($errore as $err) {
                    echo "<p class='query-error'>";
                    echo $err;
                    echo "</p>";
                }
            } ?>
            <form name="login_form" method="post" id="form-style">
                <label for="username">Username</label>
                <input type="text" required name="username" id="username" class="input-style" placeholder="Inserisci Username">
                <div id="username-error" class="error-style"></div>

                <label for="email">Email</label>
                <input type="email" required name="email" id="email" class="input-style" placeholder="Inserisci Email">
                <div id="email-error" class="error-style"></div>

                <label for="password">Password</label>
                <div class="pswrd-wrap">
                    <input type="password" required name="password" id="password" class="input-style" placeholder="Inserisci Password">
                    <img src="images/eye.png" id="toggle-pswrd" alt="">
                </div>
                <div id="password-error" class="error-style"></div>

                <label for="repeat_password">Ripeti Password</label>
                <input type="password" required name="repeat_password" id="repeat_password" class="input-style" placeholder="Ripeti Password">
                <div id="repeat_password-error" class="error-style"></div>
                <input type="checkbox" name = "terms" required id="terms-checkbox">
                <label for="terms-checkbox">Accetto le condizioni di TecnovaGroup</label>
                <div id="terms-error" class="error-style"></div>

                <input type="submit" value="Registrati" id="send-button">
            </form>
            <a href="login__section.php">Sei già registrato? Clicca qui!</a>
            <a href = "ForgotPassword.php"> Hai dimenticato la password? </a>
            <a href="index.php">Torna alla home...</a>
        </div>
    </div>
</body>
</html>
