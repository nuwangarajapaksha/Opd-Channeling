<?php
session_start();
$_SESSION["patient_is_login"] = false;
header("Location: ../index.php");
session_destroy();
?>