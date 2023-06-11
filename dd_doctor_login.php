<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/login_style.css"/>
    </head>
    <body> 
        <div class="login-container login-popup" id="doctorlogin">
            <img src="img/Close_Cross_Icon.png" onclick="toggledoctorloginpopup();"/>
            <p>Doctor Login</p>
            <form method="post" action="action/dd_doctor_login_check.php">
                    <p>NIC</p>
                    <input type="text" name="nic" id="nic" placeholder="NIC"/>
                    <p>Password</p>
                    <input type="password" name="password" id="password" placeholder="Password"/>
                    <button>Login</button><label><?php echo $msgDoctor; ?></label><br><br>
                    <p class="create-account">If you don't have an account,&nbsp;<span onclick="toggledoctorregpopup();"><u>Create New Account</u></span></p>
            </form>
        </div>
        <?php
        include './dd_doctor_registration.php';
        ?>
    </body>
</html>
