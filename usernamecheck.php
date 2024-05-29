<?php 
    require_once 'dbconfig.php';

    if (!isset($_GET["q"])) {
        echo json_encode(array('error' => 'Parametro mancante'));
        exit;
    }

    
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);



    $username = mysqli_real_escape_string($conn, $_GET["q"]);

    $query = "SELECT username FROM registrazioni
                WHERE username = '$username'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $exists = mysqli_num_rows($res) > 0 ? true : false;
    
    echo json_encode($exists);

    mysqli_close($conn);
?>
