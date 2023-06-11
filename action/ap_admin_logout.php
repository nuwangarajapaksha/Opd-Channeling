<?php
session_start();
$_SESSION["admin_is_login"] = false;
header("Location: ../index.php");
session_destroy();
?>