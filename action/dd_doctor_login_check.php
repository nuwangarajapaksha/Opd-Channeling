<?php
session_start();
include './db_connection.php';

$nic = "";
$password = "";

if (isset($_SESSION["doctor_is_login"])) {//check is login already setted(already logedin)
    if ($_SESSION["doctor_is_login"] == true) {//logged in
        header("Location: ../dd_doctor_dashboard.php");
        die();
    }
} else {
    if (isset($_POST["nic"]) && isset($_POST["password"])) {
        $nic = $_POST["nic"];
        $password = $_POST["password"];

        if ($nic == "") {
            header("Location: ../index.php?msgDoctor=Please enter the NIC !");
            die();
        } elseif ($password == "") {
            header("Location: ../index.php?msgDoctor=Please enter the password !");
            die();
        } else {
            $query = "SELECT * FROM doctor WHERE doctor_nic = '" . $nic . "' AND doctor_status = '1'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nicDB = $row["doctor_nic"];
                $passwordDB = $row["doctor_password"];
                $statusDB = $row["doctor_status"];
                if ($nic == $nicDB && $password == $passwordDB && $statusDB == 1) {
                    $_SESSION["doctor_is_login"] = true; //assign true into is_login
                    $_SESSION["activeDoctorId"] = $row["doctor_id"];
                    header("Location: ../dd_doctor_dashboard.php");
                    die();
                    exit();
                } else {
                    header("Location: ../index.php?msgDoctor=Error,incorrect password !");
                    die();
                }
            } else {
                header("Location: ../index.php?msgDoctor=Error,invalid NIC !");
                die();
            }
        }
    }
}
?>