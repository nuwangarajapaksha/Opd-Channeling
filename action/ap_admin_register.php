<?php
include './db_connection.php';

$id = "";
$email = "";
$username = "";
$password = "";
$confirmPassword = "";
if (isset($_POST["id"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"])) {

    $id = $_POST["id"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($id == "") {
        header("Location: ../ap_admin_panel.php?msgAdmin=Please enter the admin id !");
        die();
    } elseif ($email == "") {
        header("Location: ../ap_admin_panel.php?msgAdmin=Please enter the email !");
        die();
    } elseif ($username == "") {
        header("Location: ../ap_admin_panel.php?msgAdmin=Please enter the username !");
        die();
    } elseif ($password == "") {
        header("Location: ../ap_admin_panel.php?msgAdmin=Please enter the password !");
        die();
    } elseif ($confirmPassword == "") {
        header("Location: ../ap_admin_panel.php?msgAdmin=Please enter the confirm password !");
        die();
    } elseif ($confirmPassword != $password) {
        header("Location: ../ap_admin_panel.php?msgAdmin=Confirm password not match !");
        die();
    } else {
        $queryUser = "SELECT * FROM admin WHERE admin_id = '" . $id . "' OR admin_username = '" . $username . "'";
        $result = $connection->query($queryUser);
        if ($result->num_rows > 0) {
            header("Location: ../ap_admin_panel.php?msgAdmin=Already registered !");
            die();
        } else {
            $query = "INSERT INTO admin (admin_id, admin_email, admin_username, admin_password, admin_status) "
                    . "VALUES ('" . $id . "','" . $email . "','" . $username . "','" . $password . "','1')";

            $isSaved = mysqli_query($connection, $query);

            if ($isSaved) {
                header("Location: ../ap_admin_panel.php?msgAlertAdmin=Register Successful !");
                die();
            } else {
                header("Location: ../ap_admin_panel.php?msgAlertAdmin=Error,Register Unsuccessful !");
                die();
            }
        }
    }
}
?>