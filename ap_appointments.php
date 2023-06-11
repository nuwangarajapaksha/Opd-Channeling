<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/admin_panel_style.css"/>
    </head>
    <body onload="toggleappointments()">
        <div class="child-container-disable" id="appointment">
            <form method="get" action="ap_admin_panel.php">
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
                        <tr class="child-content">
                            <td><?php echo $row["appointment_id"]; ?></td>
                            <td><?php echo $row["appointment_date"]; ?></td>
                            <td><?php echo $row["appointment_start_time"]; ?></td>
                            <td><?php echo $row["appointment_end_time"]; ?></td>
                            <td><?php echo $row["hospital_name"]; ?></td>
                            <td><?php echo $row["doctor_name"]; ?></td>
                            <td><?php echo $row["patient_name"]; ?></td>
                            <td class="remove"><a href="action/ap_appointment_remove.php?id=<?php echo $row["appointment_id"]; ?>">&cross;</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </body>
</html>
