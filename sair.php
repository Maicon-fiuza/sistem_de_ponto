<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['number']);
    header("Location: login.php");
?>