<!DOCTYPE html>
<?php
include './action/db_connection.php';
$query = "SELECT * FROM appointment ORDER BY appointment_id DESC";
$result = $connection->query($query);
$appointmentId = 1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $appointmentId = $row["appointment_id"]+1;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OPD Channeling Patient Dashboard</title>
        <link rel="stylesheet" type="text/css" href="css/index_style.css"/>
        <link rel="stylesheet" type="text/css" href="css/dashboard_style.css"/>
        <?php
        if (isset($_GET["msgAlertProfile"])) {echo "<script>alert('" . $_GET["msgAlertProfile"] . "');</script>";echo '<BODY onLoad="header();togglepatientprofilepopup();">';}
        $msgProfile = "";if (isset($_GET["msgProfile"])) {$msgProfile = $_GET["msgProfile"];echo '<BODY onLoad="header();togglepatientprofilepopup();">';}


        if (isset($_GET["msgAlertPassword"])) {echo "<script>alert('" . $_GET["msgAlertPassword"] . "');</script>";echo '<BODY onLoad="header();togglepatientprofilepopup();">';}
        $msgPassword = "";
        if (isset($_GET["msgPassword"])) {$msgPassword = $_GET["msgPassword"]; echo '<BODY onLoad="header();togglepatientprofilepopup();togglepatientpasswordchangepopup();">';}
        
        
        if (isset($_GET["msgAlertAppointment"])) {echo "<script>alert('" . $_GET["msgAlertAppointment"] . "');</script>"; echo '<BODY onLoad="header();">';}
        $keywordAppointment = "";
        if (isset($_GET["searchAppointment"])) {$keywordAppointment = $_GET["searchAppointment"]; echo '<BODY onLoad="header();">';}
        $msgAppointment = "";
        if (isset($_GET["msgAppointment"])) {$msgAppointment = $_GET["msgAppointment"];echo '<BODY onLoad="header();">';}
        
        
        $msgAdmin = "";
        ?>
    </head>
    <body onload="header();">
        <div class="shader" id="shader"></div>
        <?php include './pp_header.php'; ?>
        
        
        
        <div class="dashboard-container">
            <table>
                <tr>
                    <th>Create New Appointment</th>
                </tr>
            </table>
            <br><br><br>
            <div class="dashboard-child-container">
                <form method="post" action="action/pp_appointment_creator.php">
                <div class="column">
                    <p>Appointment Id<sup>*</sup></p>
                    <input type="text" name="id" id="id" value="<?php echo $appointmentId; ?>" placeholder="Appointment Id" readonly/>
                    <p>Appointment Date<sup>*</sup></p>
                    <input type="date" name="date" id="date" placeholder="Date"/>
                    <p>Start Time<sup>*</sup></p>
                    <input type="time" name="startTime" id="startTime" placeholder="Start Time"/>
                    <p>End Time<sup>*</sup></p>
                    <input type="time" name="endTime" id="endTime" placeholder="End Time"/>
                    <button>Submit</button><label><?php echo $msgAppointment; ?></label>
                </div>
                <div class="column">
                    <p>Doctor<sup>*</sup></p>   
                    <select name="doctorId" id="doctorId">
                        <?php
                        $query = "SELECT * FROM doctor WHERE doctor_status = 1";
                        $result = $connection->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row["doctor_id"]; ?>"><?php echo $row["doctor_name"]; ?></option>
                            <?php }
                        }
                        ?>
                    </select>
                    <input type="hidden" name="patientId" id="patientId" value="<?php echo $activePatientId?>"/>
                    <label class="animi">Create<br>Appointment</label>
                </div>
            </form>
                </div>
            <br><br><br>
            <table>
                <tr>
                    <th>Your Appointments</th>
                </tr>
            </table>
            <br><br><br>
            <form method="get" action="pp_patient_dashboard.php">
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
                        . "OR doctor_name LIKE '%" . $keywordAppointment . "%' OR hospital_name LIKE '%" . $keywordAppointment . "%') "
                        . " AND patient.patient_id = '".$activePatientId."' AND appointment_status = '1'";
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
                            <td class="remove"><a href="action/pp_appointment_remove.php?id=<?php echo $row["appointment_id"]; ?>">&cross;</a></td>
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
