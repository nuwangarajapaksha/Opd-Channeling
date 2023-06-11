<!DOCTYPE html>
<?php
$query = "SELECT * FROM admin ORDER BY admin_id DESC";
$result = $connection->query($query);
$adminId = 1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $adminId = $row["admin_id"]+1;
}
?>
<html>
    <head>
        <meta charset=(UTF-8">
        <link rel="stylesheet" type="text/css" href="css/registration_style.css"/>     
    </head>
    <body> 
        <div class="reg-container reg-popup" id="adminreg">
            <img src="img/Close_Cross_Icon.png" onclick="toggleadminregpopup();"/>
            <p>Administrator Registration</p>
            <form method="post" action="action/ap_admin_register.php">
                <div class="column">
                    <p>Administrator Id<sup>*</sup></p>
                    <input type="text" name="id" id="id" value="<?php echo $adminId; ?>" placeholder="Administrator Id" readonly/>
                    <p>Email<sup>*</sup></p>
                    <input type="text" name="email" id="email" placeholder="Email"/>
                    <p>Username<sup>*</sup></p>
                    <input type="text" name="username" id="username" placeholder="Username"/>
                    <button>Register</button><label><?php echo $msgAdmin; ?></label>

                </div>
                <div class="column">
                    <p>Password<sup>*</sup></p>
                    <input type="password" name="password" id="password" placeholder="Password"/>
                    <p>Confirm Password<sup>*</sup></p>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password"/>
                </div>
            </form>
        </div>
    </body>
</html>


