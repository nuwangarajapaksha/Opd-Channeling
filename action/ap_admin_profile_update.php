<?php
include './db_connection.php';

$id = "";
$email = "";
$username = "";

if (isset($_POST["id"]) && isset($_POST["email"]) && isset($_POST["username"])) {

    $id = $_POST["id"];
    $email = $_POST["email"];
    $username = $_POST["username"];

    if ($id == "") {
        header("Location: ../ap_admin_panel.php?msgProfile=Please enter the admin id !");
        die();
    } elseif ($email == "") {
        header("Location: ../ap_admin_panel.php?msgProfile=Please enter the email !");
        die();
    } elseif ($username == "") {
        header("Location: ../ap_admin_panel.php?msgProfile=Please enter the username !");
        die();
    } else {

        $query = "UPDATE admin SET admin_email = '" . $email . "', admin_username = '" . $username . "' WHERE admin_id = '" . $id . "'";

        $isSaved = mysqli_query($connection, $query);

        if ($isSaved) {
            header("Location: ../ap_admin_panel.php?msgAlertProfile=Update Successful !");
            die();
        } else {
            header("Location: ../ap_admin_panel.php?msgAlertProfile=Error,Update Unsuccessful !");
            die();
        }
    }
}
?>