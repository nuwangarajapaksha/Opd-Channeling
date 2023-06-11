<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/registration_style.css"/>
    </head>
    <body>
        <div class="reg-container reg-popup" id="adminpasswordchange">
            <img src="img/Close_Cross_Icon.png" onclick="toggleadminpasswordchangepopup();"/>
            <p>Change Password</p>
            <form method="post" action="action/ap_admin_password_changer.php">
                <input type="hidden" name="id" id="id" value="<?php echo $activeId; ?>" placeholder="Administrator Id" readonly/>
                <p>Current Password<sup>*</sup></p>
                <input type="password" name="currentPassword" id="currentPassword" placeholder="Current Password"/>
                <p>New Password<sup>*</sup></p>
                <input type="password" name="newPassword" id="newPassword" placeholder="New Password"/><br>
                <p>Confirm Password<sup>*</sup></p>
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password"/><br>
                <button>Save</button><label><?php echo $msgPassword; ?></label>
            </form>
        </div>
    </body>
</html>
