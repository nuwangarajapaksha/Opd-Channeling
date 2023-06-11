<?php

include './db_connection.php';

$id = "";
$name = "";
$nic = "";
$contactNo = "";
$hospitalId = "";
$password = "";
$confirmPassword = "";
if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["nic"]) && isset($_POST["contactNo"]) && isset($_POST["hospitalId"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $nic = $_POST["nic"];
    $contactNo = $_POST["contactNo"];
    $hospitalId = $_POST["hospitalId"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($id == "") {
        header("Location: ../index.php?msgDoctorReg=Please enter the id !");
        die();
    } elseif ($name == "") {
        header("Location: ../index.php?msgDoctorReg=Please enter the name !");
        die();
    } elseif ($nic == "") {
        header("Location: ../index.php?msgDoctorReg=Please enter the NIC !");
        die();
    } elseif ($contactNo == "") {
        header("Location: ../index.php?msgDoctorReg=Please enter the contact no !");
        die();
    } elseif ($hospitalId == "") {
        header("Location: ../index.php?msgDoctorReg=Please enter the hospital !");
        die();
    } elseif ($password == "") {
        header("Location: ../index.php?msgDoctorReg=Please enter the password !");
        die();
    } elseif ($confirmPassword == "") {
        header("Location: ../index.php?msgDoctorReg=Please enter the confirm password !");
        die();
    } elseif ($confirmPassword != $password) {
        header("Location: ../index.php?msgDoctorReg=Confirm password not match !");
        die();
    } else {
        $queryUser = "SELECT * FROM doctor WHERE doctor_id = '" . $id . "' OR doctor_nic = '" . $nic . "'";
        $result = $connection->query($queryUser);
        if ($result->num_rows > 0) {
            header("Location: ../index.php?msgDoctorReg=Already registered !");
            die();
        } else {
            $query = "INSERT INTO doctor (doctor_id, doctor_name, doctor_nic, doctor_contact_no, doctor_password, hospital_id, doctor_status) "
                    . "VALUES ('" . $id . "','" . $name . "','" . $nic . "','" . $contactNo . "','" . $password . "','" . $hospitalId . "','1')";

            $isSaved = mysqli_query($connection, $query);

            if ($isSaved) {
                header("Location: ../index.php?msgAlertDoctorReg=Register Successful !");
                die();
            } else {
                header("Location: ../index.php?msgAlertDoctorReg=Error,Register Unsuccessful !");
                die();
            }
        }
    }
}
?>