<?php
session_start();
unset($_SESSION['lib_id']);
session_destroy();
header('Location:../index.php');
?>
