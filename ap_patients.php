<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/admin_panel_style.css"/>
    </head>
    <body>
        <div class="child-container-disable" id="patient">
            <form method="get" action="ap_admin_panel.php">
                <input type="text" name="searchPatient" id="searchPatient" value="<?php echo $keywordPatient; ?>" placeholder="Search"/>
                <button>Search</button>
            </form>
            <table>
                <tr>
                    <th>Patient Id</th>
                    <th>Name</th>
                    <th>NIC</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Contact No</th>
                </tr>
                <?php
                $query = "SELECT * FROM patient WHERE (patient_id LIKE '%" . $keywordPatient . "%' OR patient_name LIKE '%" . $keywordPatient . "%' "
                        . "OR patient_nic LIKE '%" . $keywordPatient . "%' OR patient_dob LIKE '%" . $keywordPatient . "%' OR patient_contact_no LIKE '%" . $keywordPatient . "%') AND patient_status = '1'";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="child-content">
                            <td><?php echo $row["patient_id"]; ?></td>
                            <td><?php echo $row["patient_name"]; ?></td>
                            <td><?php echo $row["patient_nic"]; ?></td>
                            <td><?php echo $row["patient_dob"]; ?></td>
                            <td><?php echo $row["patient_address"]; ?></td>
                            <td><?php echo $row["patient_contact_no"]; ?></td>
                            <td class="remove"><a href="action/ap_patient_remove.php?id=<?php echo $row["patient_id"]; ?>">&cross;</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </body>
</html>
