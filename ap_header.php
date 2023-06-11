<!DOCTYPE html>
<?php
session_start();
include './action/db_connection.php';
$activeId = "";
$activeEmail = "";
$activeUsername = "Account";
if (isset($_SESSION["admin_is_login"]) && isset($_SESSION["activeAdminId"]) && $_SESSION["admin_is_login"] == true) {
    $activeAdminId = $_SESSION["activeAdminId"];
    $query = "SELECT * FROM admin WHERE admin_id = '" . $activeAdminId . "'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $activeId = $row["admin_id"];
        $activeEmail = $row["admin_email"];
        $activeUsername = $row["admin_username"];
    }
} else {
    header("Location: index.php?msgAdmin=Login First !");
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/admin_panel_headerfooter_style.css"/>
    </head>
    <body>
        <header>
            <nav>
                <div class="header-container">
                    <p><a href="ap_admin_panel.php">OPD&nbsp;<span>Channeling</span></a></p>
                    <ul>
                        <li class="account"><?php echo $activeUsername; ?>&nbsp;/Admin
                            <ul class="account-content">
                                <li onclick="toggleadminprofilepopup();">Profile</li>
                                <a href="action/ap_admin_logout.php"><li>Logout</li></a>    
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php include './ap_admin_profile.php'; ?>
    </body>
</html>
