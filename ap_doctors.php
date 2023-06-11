<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/admin_panel_style.css"/>
    </head>
    <body>
        <div class="child-container-disable" id="doctor">
            <form method="get" action="ap_admin_panel.php">
                <input type="text" name="searchDoctor" id="searchDoctor" value="<?php echo $keywordDoctor; ?>" placeholder="Search"/>
                <button>Search</button>
            </form>
            <table>
                <tr>
                    <th>Doctor Id</th>
                    <th>Name</th>
                    <th>NIC</th> 
                    <th>Contact No</th>
                    <th>Hospital</th>
                </tr>
                <?php
                $query = "SELECT * FROM doctor INNER JOIN hospital ON doctor.hospital_id = hospital.hospital_id  WHERE (doctor_id LIKE '%" . $keywordDoctor . "%' "
                        . "OR doctor_name LIKE '%" . $keywordDoctor . "%' OR doctor_nic LIKE '%" . $keywordDoctor . "%' "
                        . "OR doctor_contact_no LIKE '%" . $keywordDoctor . "%' OR doctor.hospital_id LIKE '%" . $keywordDoctor . "%' "
                        . "OR hospital.hospital_name LIKE '%" . $keywordDoctor . "%') AND doctor_status = '1'";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="child-content">
                            <td><?php echo $row["doctor_id"]; ?></td>
                            <td><?php echo $row["doctor_name"]; ?></td>
                            <td><?php echo $row["doctor_nic"]; ?></td>
                            <td><?php echo $row["doctor_contact_no"]; ?></td>
                            <td><?php echo $row["hospital_name"]; ?></td>
                            <td class="remove"><a href="action/ap_doctor_remove.php?id=<?php echo $row["doctor_id"]; ?>">&cross;</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </body>
</html>
