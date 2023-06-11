<?php
include './db_connection.php';

$id = "";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $query = "UPDATE hospital SET hospital_status = '0' WHERE hospital_id = '" . $id . "'";

    $isRemove = mysqli_query($connection, $query);

    if ($isRemove) {
        header("Location: ../ap_admin_panel.php?msgAlertHospital=Remove Successful !");
        die();
    } else {
        header("Location: ../ap_admin_panel.php?msgAlertHospital=Error,Remove Unsuccessful !");
        die();
    }
} 

?>