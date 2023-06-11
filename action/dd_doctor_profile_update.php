<?php

include './db_connection.php';

$id = "";
$name = "";
$contactNo = "";
$hospitalId = "";

if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["contactNo"]) && isset($_POST["hospitalId"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $contactNo = $_POST["contactNo"];
    $hospitalId = $_POST["hospitalId"];

    if ($id == "") {
        header("Location: ../dd_doctor_dashboard.php?msgProfile=Please enter the doctor id !");
        die();
    } elseif ($name == "") {
        header("Location: ../dd_doctor_dashboard.php?msgProfile=Please enter the name !");
        die();
    } elseif ($contactNo == "") {
        header("Location: ../dd_doctor_dashboard.php?msgProfile=Please enter the contact no !");
        die();
    } elseif ($hospitalId == "") {
        header("Location: ../dd_doctor_dashboard.php?msgProfile=Please enter the hospital !");
        die();
    } else {

        $query = "UPDATE doctor SET doctor_name = '" . $name . "', doctor_contact_no = '" . $contactNo . "', hospital_id = '" . $hospitalId . "' WHERE doctor_id = '" . $id . "'";

        $isSaved = mysqli_query($connection, $query);

        if ($isSaved) {
            header("Location: ../dd_doctor_dashboard.php?msgAlertProfile=Update Successful !");
            die();
        } else {
            header("Location: ../dd_doctor_dashboard.php?msgAlertProfile=Error,Update Unsuccessful !");
            die();
        }
    }
}
?>