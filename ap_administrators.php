<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/admin_panel_style.css"/>
    </head>
    <body>
        <div class="child-container-disable" id="admin">
            <button onclick="toggleadminregpopup();">+ &nbsp;Add Administrator</button>
            <form method="get" action="ap_admin_panel.php">
                <input type="text" name="searchAdmin" id="searchAdmin" value="<?php echo $keywordAdmin; ?>" placeholder="Search"/>
                <button>Search</button>
            </form>
            <table>
                <tr>
                    <th>Administrator Id</th>
                    <th>Email</th>
                    <th>Username</th>
                </tr>
                <?php
                $query = "SELECT * FROM admin WHERE (admin_id LIKE '%" . $keywordAdmin . "%' OR admin_email LIKE '%" . $keywordAdmin . "%' "
                        . "OR admin_username LIKE '%" . $keywordAdmin . "%') AND admin_status = '1'";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="child-content">
                            <td><?php echo $row["admin_id"]; ?></td>
                            <td><?php echo $row["admin_email"]; ?></td>
                            <td><?php echo $row["admin_username"]; ?></td> 
                            <td class="remove"><a href="action/ap_admin_remove.php?id=<?php echo $row["admin_id"]; ?>">&cross;</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
        <?php include './ap_admin_registration.php'; ?>
    </body>
</html>
