<?php
session_start();
unset($_SESSION['client_id']);
session_destroy();
header('Location:../index.php');
?>
