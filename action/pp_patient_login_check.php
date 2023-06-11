<?php
session_start();
include './db_connection.php';

$nic = "";
$password = "";

if (isset($_SESSION["patient_is_login"])) {//check is login already setted(already logedin)
    if ($_SESSION["patient_is_login"] == true) {//logged in
        header("Location: ../pp_patient_dashboard.php");
        die();
    }
} else {
    if (isset($_POST["nic"]) && isset($_POST["password"])) {
        $nic = $_POST["nic"];
        $password = $_POST["password"];

        if ($nic == "") {
            header("Location: ../index.php?msgPatient=Please enter the NIC !");
            die();
        } elseif ($password == "") {
            header("Location: ../index.php?msgPatient=Please enter the password !");
            die();
        } else {
            $query = "SELECT * FROM patient WHERE patient_nic = '" . $nic . "' AND patient_status = '1'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nicDB = $row["patient_nic"];
                $passwordDB = $row["patient_password"];
                $statusDB = $row["patient_status"];
                if ($nic == $nicDB && $password == $passwordDB && $statusDB == 1) {
                    $_SESSION["patient_is_login"] = true; //assign true into is_login
                    $_SESSION["activePatientId"] = $row["patient_id"];
                    header("Location: ../pp_patient_dashboard.php");
                    die();
                    exit();
                } else {
                    header("Location: ../index.php?msgPatient=Error,incorrect password !");
                    die();
                }
            } else {
                header("Location: ../index.php?msgPatient=Error,invalid NIC !");
                die();
            }
        }
    }
}
?>