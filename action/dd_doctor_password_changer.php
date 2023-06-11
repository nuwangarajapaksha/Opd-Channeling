<?php
include './db_connection.php';

$id = "";
$currentPassword = "";
$newPassword = "";
$confirmPassword = "";


if (isset($_POST["id"]) && isset($_POST["currentPassword"]) && isset($_POST["newPassword"]) && isset($_POST["confirmPassword"])) {

    $id = $_POST["id"];
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];


    if ($id == "") {
        header("Location: ../dd_doctor_dashboard.php?msgPassword=Please enter the doctor id !");
        die();
    } elseif ($currentPassword == "") {
        header("Location: ../dd_doctor_dashboard.php?msgPassword=Please enter the current password !");
        die();
    } elseif ($newPassword == "") {
        header("Location: ../dd_doctor_dashboard.php?msgPassword=Please enter the new password !");
        die();
    } elseif ($confirmPassword == "") {
        header("Location: ../dd_doctor_dashboard.php?msgPassword=Please enter the confirm password !");
        die();
    } elseif ($confirmPassword != $newPassword) {
        header("Location: ../dd_doctor_dashboard.php?msgPassword=Confirm password not match !");
        die();
    } else {

        $queryUser = "SELECT * FROM doctor WHERE doctor_id = '" . $id . "'";
        $result = $connection->query($queryUser);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentPasswordDB = $row["doctor_password"];

            if ($currentPasswordDB == $currentPassword) {
                $query = "UPDATE doctor SET doctor_password = '" . $newPassword . "' WHERE doctor_id = '" . $id . "'";

                $isSaved = mysqli_query($connection, $query);

                if ($isSaved) {
                    header("Location: ../dd_doctor_dashboard.php?msgAlertPassword=Update Successful !");
                    die();
                } else {
                    header("Location: ../dd_doctor_dashboard.php?msgAlertPassword=Error,Update Unsuccessful !");
                    die();
                }
            } else {
                header("Location: ../dd_doctor_dashboard.php?msgPassword=Current password not match !");
                die();
            }
        }
    }
}
?>