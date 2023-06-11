<?php

include './db_connection.php';

$id = "";
$name = "";
$dob = "";
$address = "";
$contactNo = "";

if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["dob"]) && isset($_POST["address"]) && isset($_POST["contactNo"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $contactNo = $_POST["contactNo"];

    if ($id == "") {
        header("Location: ../pp_patient_dashboard.php?msgProfile=Please enter the patient id !");
        die();
    } elseif ($name == "") {
        header("Location: ../pp_patient_dashboard.php?msgProfile=Please enter the name !");
        die();
    } elseif ($dob == "") {
        header("Location: ../pp_patient_dashboard.php?msgProfile=Please enter the date of birth !");
        die();
    } elseif ($address == "") {
        header("Location: ../pp_patient_dashboard.php?msgProfile=Please enter the address !");
        die();
    } elseif ($contactNo == "") {
        header("Location: ../pp_patient_dashboard.php?msgProfile=Please enter the contact no !");
        die();
    } else {

        $query = "UPDATE patient SET patient_name = '" . $name . "', patient_dob = '" . $dob . "', patient_address= '" . $address . "', "
                . "patient_contact_no = '" . $contactNo . "' WHERE patient_id = '" . $id . "'";

        $isSaved = mysqli_query($connection, $query);

        if ($isSaved) {
            header("Location: ../pp_patient_dashboard.php?msgAlertProfile=Update Successful !");
            die();
        } else {
            header("Location: ../pp_patient_dashboard.php?msgAlertProfile=Error,Update Unsuccessful !");
            die();
        }
    }
}
?>