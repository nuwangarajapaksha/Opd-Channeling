<?php
include './db_connection.php';

$id = "";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $query = "UPDATE admin SET admin_status = '0' WHERE admin_id = '" . $id . "'";

    $isRemove = mysqli_query($connection, $query);

    if ($isRemove) {
        header("Location: ../ap_admin_panel.php?msgAlertAdmin=Remove Successful !");
        die();
    } else {
        header("Location: ../ap_admin_panel.php?msgAlertAdmin=Error,Remove Unsuccessful !");
        die();
    }
} 
    
?>