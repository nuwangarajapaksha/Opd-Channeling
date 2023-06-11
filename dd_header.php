<!DOCTYPE html>
<?php
session_start();
include './action/db_connection.php';
$activeDoctorId = "";
$activeDoctorName = "";
$activeDoctorNic= "";
$activeDoctorContactNo = "";
$activeHospitalId = "";
if (isset($_SESSION["doctor_is_login"]) && isset($_SESSION["activeDoctorId"]) && $_SESSION["doctor_is_login"] == true) {
    $activeDoctorId = $_SESSION["activeDoctorId"];
    $query = "SELECT * FROM doctor WHERE doctor_id = '" . $activeDoctorId . "'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $activeDoctorId = $row["doctor_id"];
        $activeDoctorName = $row["doctor_name"];
        $activeDoctorNic = $row["doctor_nic"];
        $activeDoctorContactNo = $row["doctor_contact_no"];
        $activeHospitalId = $row["hospital_id"];
    }
}else {
    header("Location: index.php?msgDoctor=Login First !");
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/index_headerfooter_style.css"/>
<!--        <link rel="stylesheet" type="text/css" href="css/admin_panel_headerfooter_style.css"/>-->
    </head>
    <body>
        <header>
            <nav>
                <div class="header-container">
                    <p><a href="index.php">OPD&nbsp<span>Channeling</span></a></p>
                    <ul>
                        <li class="account"><?php echo $activeDoctorName; ?>&nbsp;/Doctor
                            <ul class="account-content">
                                <li onclick="toggledoctorprofilepopup();">Profile</li>
                                <a href="action/dd_doctor_logout.php"><li>Logout</li></a>    
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php
        include './dd_doctor_profile.php';
        ?>
    </body>
</html>
