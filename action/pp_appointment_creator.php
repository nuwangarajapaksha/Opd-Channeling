<?php

include './db_connection.php';

$id = "";
$date = "";
$startTime = "";
$endTime = "";
$doctorId = "";
$patientId = "";
if (isset($_POST["id"]) && isset($_POST["date"]) && isset($_POST["startTime"]) && isset($_POST["endTime"]) && isset($_POST["doctorId"]) && isset($_POST["patientId"])) {

    $id = $_POST["id"];
    $date = $_POST["date"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];
    $doctorId = $_POST["doctorId"];
    $patientId = $_POST["patientId"];

    if ($id == "") {
        header("Location: ../pp_patient_dashboard.php?msgAppointment=Please enter the id !");
        die();
    } elseif ($date == "") {
        header("Location: ../pp_patient_dashboard.php?msgAppointment=Please enter the appointment date !");
        die();
    } elseif ($startTime == "") {
        header("Location: ../pp_patient_dashboard.php?msgAppointment=Please enter the start time !");
        die();
    } elseif ($endTime == "") {
        header("Location: ../pp_patient_dashboard.php?msgAppointment=Please enter the end time !");
        die();
    } elseif ($doctorId == "") {
        header("Location: ../pp_patient_dashboard.php?msgAppointment=Please enter the doctor id !");
        die();
    } elseif ($patientId == "") {
        header("Location: ../pp_patient_dashboard.php?msgAppointment=Please enter the patient id !");
        die();
    }  else {
        $queryUser = "SELECT * FROM appointment WHERE appointment_id = '" . $id . "'";
        $result = $connection->query($queryUser);
        if ($result->num_rows > 0) {
            header("Location: ../pp_patient_dashboard.php?msgAppointment=Already registered !");
            die();
        } else {
            $query = "INSERT INTO appointment (appointment_id, appointment_date, appointment_start_time, appointment_end_time, doctor_id, patient_id, appointment_status) "
                    . "VALUES ('" . $id . "','" . $date . "','" . $startTime . "','" . $endTime . "','" . $doctorId . "','" . $patientId . "','1')";

            $isSaved = mysqli_query($connection, $query);

            if ($isSaved) {
                header("Location: ../pp_patient_dashboard.php?msgAlertAppointment=Register Successful !");
                die();
            } else {
                header("Location: ../pp_patient_dashboard.php?msgAlertAppointment=Error,Register Unsuccessful !");
                die();
            }
        }
    }
}
?>