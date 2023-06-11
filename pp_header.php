<!DOCTYPE html>
<?php
session_start();
include './action/db_connection.php';
$activePatientId = "";
$activePatientName = "";
$activePatientNic= "";
$activePatientDob= "";
$activePatientAddress= "";
$activePatientContactNo = "";
if (isset($_SESSION["patient_is_login"]) && isset($_SESSION["activePatientId"]) && $_SESSION["patient_is_login"] == true) {
    $activePatientId = $_SESSION["activePatientId"];
    $query = "SELECT * FROM patient WHERE patient_id = '" . $activePatientId . "'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $activePatientId = $row["patient_id"];
        $activePatientName = $row["patient_name"];
        $activePatientNic = $row["patient_nic"];
        $activePatientDob = $row["patient_dob"];
        $activePatientAddress = $row["patient_address"];
        $activePatientContactNo = $row["patient_contact_no"];
    }
}else {
    header("Location: index.php?msgPatient=Login First !");
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
                        <li class="account"><?php echo $activePatientName; ?>&nbsp;/Patient
                            <ul class="account-content">
                                <li onclick="togglepatientprofilepopup();">Profile</li>
                                <a href="action/pp_patient_logout.php"><li>Logout</li></a>    
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php
        include './pp_patient_profile.php';
        ?>
    </body>
</html>
