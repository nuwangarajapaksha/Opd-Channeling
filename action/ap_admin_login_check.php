<?php
session_start();
include './db_connection.php';

$username = "";
$password = "";

if (isset($_SESSION["admin_is_login"])) {//check is login already setted(already logedin)
    if ($_SESSION["admin_is_login"] == true) {//logged in
        header("Location: ../ap_admin_panel.php");
        die();
    }
} else {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username == "") {
            header("Location: ../index.php?msgAdmin=Please enter the username !");
            die();
        } elseif ($password == "") {
            header("Location: ../index.php?msgAdmin=Please enter the password !");
            die();
        } else {
            $query = "SELECT * FROM admin WHERE admin_username = '" . $username . "' AND admin_status = '1'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $usernameDB = $row["admin_username"];
                $passwordDB = $row["admin_password"];
                $statusDB = $row["admin_status"];
                if ($username == $usernameDB && $password == $passwordDB && $statusDB == 1) {
                    $_SESSION["admin_is_login"] = true; //assign true into is_login
                    $_SESSION["activeAdminId"] = $row["admin_id"];
                    header("Location: ../ap_admin_panel.php");
                    die();
                    exit();
                } else {
                    header("Location: ../index.php?msgAdmin=Error,incorrect password !");
                    die();
                }
            } else {
                header("Location: ../index.php?msgAdmin=Error,invalid username !");
                die();
            }
        }
    }
}
?>

