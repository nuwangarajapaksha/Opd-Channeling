<?php

include './db_connection.php';

$id = "";
$name = "";
$nic = "";
$dob = "";
$address = "";
$contactNo = "";
$password = "";
$confirmPassword = "";
if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["nic"]) && isset($_POST["dob"]) && isset($_POST["address"]) && isset($_POST["contactNo"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $nic = $_POST["nic"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $contactNo = $_POST["contactNo"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($id == "") {
        header("Location: ../index.php?msgPatientReg=Please enter the id !");
        die();
    } elseif ($name == "") {
        header("Location: ../index.php?msgPatientReg=Please enter the name !");
        die();
    } elseif ($nic == "") {
        header("Location: ../index.php?msgPatientReg=Please enter the NIC !");
        die();
    } elseif ($dob == "") {
        header("Location: ../index.php?msgPatientReg=Please enter the date of birth !");
        die();
    } elseif ($address == "") {
        header("Location: ../index.php?msgPatientReg=Please enter the address !");
        die();
    } elseif ($contactNo == "") {
        header("Location: ../index.php?msgPatientReg=Please enter the contact no !");
        die();
    } elseif ($password == "") {
        header("Location: ../index.php?msgPatientReg=Please enter the password !");
        die();
    } elseif ($confirmPassword == "") {
        header("Location: ../index.php?msgPatientReg=Please enter the confirm password !");
        die();
    } elseif ($confirmPassword != $password) {
        header("Location: ../index.php?msgPatientReg=Confirm password not match !");
        die();
    } else {
        $queryUser = "SELECT * FROM patient WHERE patient_id = '" . $id . "' OR patient_nic = '" . $nic . "'";
        $result = $connection->query($queryUser);
        if ($result->num_rows > 0) {
            header("Location: ../index.php?msgPatientReg=Already registered !");
            die();
        } else {
            $query = "INSERT INTO patient (patient_id, patient_name, patient_nic, patient_dob, patient_address, patient_contact_no, patient_password, patient_status) "
                    . "VALUES ('" . $id . "','" . $name . "','" . $nic . "','" . $dob . "','" . $address . "','" . $contactNo . "','" . $password . "','1')";

            $isSaved = mysqli_query($connection, $query);

            if ($isSaved) {
                header("Location: ../index.php?msgAlertPatientReg=Register Successful !");
                die();
            } else {
                header("Location: ../index.php?msgAlertPatientReg=Error,Register Unsuccessful !");
                die();
            }
        }
    }
}
?>