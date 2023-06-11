<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/registration_style.css"/>
    </head>
    <body>
        <div class="reg-container reg-popup" id="adminprofile">
            <img src="img/Close_Cross_Icon.png" onclick="toggleadminprofilepopup();"/>
            <p>Administrator Profile</p>
            <form method="post" action="action/ap_admin_profile_update.php">
                <div class="column">
                    <p>Administrator Id<sup>*</sup></p>
                    <input type="text" name="id" id="id" value="<?php echo $activeId; ?>" placeholder="Administrator Id" readonly/>
                    <p>Email<sup>*</sup></p>
                    <input type="text" name="email" id="email" value="<?php echo $activeEmail; ?>" placeholder="Email"/>
                    <button>Save</button><label><?php echo $msgProfile; ?></label>
                </div>
                <div class="column">
                    <p>Username<sup>*</sup></p>
                    <input type="text" name="username" id="username" value="<?php echo $activeUsername; ?>" placeholder="Username"/>
                    <p>Password<sup>*</sup></p>
                    <input type="hidden" name="password" id="password" placeholder="Password"/>
                </div>
            </form>
            <button class="password-change-button" onclick="toggleadminpasswordchangepopup();">Change Password</button>
            <?php include './ap_admin_password_change.php'; ?>
        </div>
    </body>
</html>
