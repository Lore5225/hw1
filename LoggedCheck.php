<?php
    session_start();
    require_once 'dbconfig.php';
    function checkAuth() {
        if(isset($_SESSION["username"])) {
            return $_SESSION["username"];
        } else 
            return 0;
    }
?>