<?php
include './db_connection.php';

$id = "";
$name = "";
$city = "";
$contactNo = "";
if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["city"]) && isset($_POST["contactNo"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $city = $_POST["city"];
    $contactNo = $_POST["contactNo"];


    $data = array($no, $hospital, $description);

    if ($id == "") {
        header("Location: ../ap_admin_panel.php?msgHospital=Please enter the hospital id !");
        die();
    } elseif ($name == "") {
        header("Location: ../ap_admin_panel.php?msgHospital=Please enter the hospital name !");
        die();
    } elseif ($city == "") {
        header("Location: ../ap_admin_panel.php?msgHospital=Please enter the city !");
        die();
    } elseif ($contactNo == "") {
        header("Location: ../ap_admin_panel.php?msgHospital=Please enter the contact no !");
        die();
    }else {
        $queryUser = "SELECT * FROM hospital WHERE hospital_id = '" . $id . "'";
        $result = $connection->query($queryUser);
        if ($result->num_rows > 0) {
            header("Location: ../ap_admin_panel.php?msgHospital=Already registered !");
            die();
        } else {
            $query = "INSERT INTO hospital (hospital_id, hospital_name, hospital_city, hospital_contact_no, hospital_status) "
                    . "VALUES ('" . $id . "','" . $name . "','" . $city . "','" . $contactNo . "','1')";

            $isSaved = mysqli_query($connection, $query);

            if ($isSaved) {
                header("Location: ../ap_admin_panel.php?msgAlertHospital=Register Successful !");
                unset($data);
                die();
            } else {
                header("Location: ../ap_admin_panel.php?msgAlertHospital=Error,Register Unsuccessful !");
                die();
            }
        }
    }
}
?>