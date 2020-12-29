<?php
    session_start();

    $_SESSION["id_user"]='';

    unset($_SESSION["id_user"]);
    session_unset();
    session_destroy();

    header('Location:index.php');
?>