<?php
include './db_connection.php';

$id = "";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $query = "UPDATE doctor SET doctor_status = '0' WHERE doctor_id = '" . $id . "'";

    $isRemove = mysqli_query($connection, $query);

    if ($isRemove) {
        header("Location: ../ap_admin_panel.php?msgAlertDoctor=Remove Successful !");
        die();
    } else {
        header("Location: ../ap_admin_panel.php?msgAlertDoctor=Error,Remove Unsuccessful !");
        die();
    }
} 
    
?>