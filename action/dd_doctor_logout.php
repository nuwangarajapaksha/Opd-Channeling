<?php
session_start();
$_SESSION["doctor_is_login"] = false;
header("Location: ../index.php");
session_destroy();
?>