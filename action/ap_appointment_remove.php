<?php
include './db_connection.php';

$id = "";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $query = "UPDATE appointment SET appointment_status = '0' WHERE appointment_id = '" . $id . "'";

    $isRemove = mysqli_query($connection, $query);

    if ($isRemove) {
        header("Location: ../ap_admin_panel.php?msgAlertAppointment=Remove Successful !");
        die();
    } else {
        header("Location: ../ap_admin_panel.php?msgAlertAppointment=Error,Remove Unsuccessful !");
        die();
    }
} 
    
?>