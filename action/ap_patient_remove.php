<?php
include './db_connection.php';

$id = "";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $query = "UPDATE patient SET patient_status = '0' WHERE patient_id = '" . $id . "'";

    $isRemove = mysqli_query($connection, $query);

    if ($isRemove) {
        header("Location: ../ap_admin_panel.php?msgAlertPatient=Remove Successful !");
        die();
    } else {
        header("Location: ../ap_admin_panel.php?msgAlertPatient=Error,Remove Unsuccessful !");
        die();
    }
} 
    
?>