<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/admin_panel_style.css"/>
    </head>
    <body>
        <div class="child-container-disable" id="hospital">
            <button onclick="togglehospitalregpopup();">+ &nbsp;Add Hospital</button>
            <form method="get" action="ap_admin_panel.php">
                <input type="text" name="searchHospital" id="searchHospital" value="<?php echo $keywordHospital; ?>" placeholder="Search"/>
                <button>Search</button>
            </form>
            <table>
                <tr>
                    <th>Hospital Id</th>
                    <th>Hospital Name</th>
                    <th>City</th>
                    <th>Contact No</th>
                </tr>
                <?php
                $query = "SELECT * FROM hospital WHERE (hospital_id LIKE '%" . $keywordHospital . "%' OR hospital_name LIKE '%" . $keywordHospital . "%' "
                        . "OR hospital_city LIKE '%" . $keywordHospital . "%' OR hospital_contact_no LIKE '%" . $keywordHospital . "%') AND hospital_status = '1'";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="child-content">
                            <td><?php echo $row["hospital_id"]; ?></td>
                            <td><?php echo $row["hospital_name"]; ?></td>
                            <td><?php echo $row["hospital_city"]; ?></td>
                            <td><?php echo $row["hospital_contact_no"]; ?></td>
                            <td class="remove"><a href="action/ap_hospital_remove.php?id=<?php echo $row["hospital_id"]; ?>">&cross;</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
        <?php include './ap_hospital_registration.php'; ?>
    </body>
</html>
