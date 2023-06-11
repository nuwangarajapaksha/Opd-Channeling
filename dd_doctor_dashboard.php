<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OPD Channeling Doctor Dashboard</title>
        <link rel="stylesheet" type="text/css" href="css/index_style.css"/>
        <link rel="stylesheet" type="text/css" href="css/dashboard_style.css"/>
        <?php
        if (isset($_GET["msgAlertProfile"])) {echo "<script>alert('" . $_GET["msgAlertProfile"] . "');</script>";echo '<BODY onLoad="header();toggledoctorprofilepopup();">';}
        $msgProfile = "";if (isset($_GET["msgProfile"])) {$msgProfile = $_GET["msgProfile"];echo '<BODY onLoad="header();toggledoctorprofilepopup();">';}


        if (isset($_GET["msgAlertPassword"])) {echo "<script>alert('" . $_GET["msgAlertPassword"] . "');</script>";echo '<BODY onLoad="header();toggledoctorprofilepopup();">';}
        $msgPassword = "";
        if (isset($_GET["msgPassword"])) {$msgPassword = $_GET["msgPassword"]; echo '<BODY onLoad="header();toggledoctorprofilepopup();toggledoctorpasswordchangepopup();">';}
        
        
        if (isset($_GET["msgAlertAppointment"])) {echo "<script>alert('" . $_GET["msgAlertAppointment"] . "');</script>"; echo '<BODY onLoad="header();">';}
        $keywordAppointment = "";
        if (isset($_GET["searchAppointment"])) {$keywordAppointment = $_GET["searchAppointment"]; echo '<BODY onLoad="header();">';}
        
        $msgAdmin = "";
        ?>
    </head>
    <body onload="header();">
        <div class="shader" id="shader"></div>
        <?php include './dd_header.php'; ?>
        
        <div class="dashboard-container">
            
            <table>
                <tr>
                    <th>Appointments</th>
                </tr>
            </table>
            <br><br><br>
            <form method="get" action="dd_doctor_dashboard.php">
                <input type="text" name="searchAppointment" id="searchAppointment" value="<?php echo $keywordAppointment; ?>" placeholder="Search"/>
                <button>Search</button>
            </form>
            <table>
                <tr>
                    <th>Appointment Id</th>
                    <th>Appointment Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Hospital</th>
                    <th>Doctor</th>
                    <th>Patient</th>
                    
                </tr>
                <?php
                $query = "SELECT * FROM appointment INNER JOIN doctor INNER JOIN patient INNER JOIN hospital "
                        . "ON appointment.doctor_id = doctor.doctor_id AND appointment.patient_id = patient.patient_id AND doctor.hospital_id = hospital.hospital_id "
                        . "WHERE (appointment_id LIKE '%" . $keywordAppointment . "%' OR appointment_date LIKE '%" . $keywordAppointment . "%' "
                        . "OR doctor_name LIKE '%" . $keywordAppointment . "%' OR patient_name LIKE '%" . $keywordAppointment . "%' OR hospital_name LIKE '%" . $keywordAppointment . "%') "
                        . "AND appointment_status = '1'";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="dashboard-content">
                            <td><?php echo $row["appointment_id"]; ?></td>
                            <td><?php echo $row["appointment_date"]; ?></td>
                            <td><?php echo $row["appointment_start_time"]; ?></td>
                            <td><?php echo $row["appointment_end_time"]; ?></td>
                            <td><?php echo $row["hospital_name"]; ?></td>
                            <td><?php echo $row["doctor_name"]; ?></td>
                            <td><?php echo $row["patient_name"]; ?></td>
                            <td class="remove"><a href="action/dd_appointment_remove.php?id=<?php echo $row["appointment_id"]; ?>">&cross;</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
        <br><br><br><br>
        <?php include './index_footer.php'; ?>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>
