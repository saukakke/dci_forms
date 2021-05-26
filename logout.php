<?php
    $_SESSION['user'] = null;
    $_SESSION['user'] = "";
    unset($_SESSION['user']);
    session_destroy();
    header("Location: index.php");
?>