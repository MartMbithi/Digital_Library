<?php
    session_start();
    unset($_SESSION['s_id']);
    session_destroy();

    header("Location: pages_std_index.php");
    exit;
?>