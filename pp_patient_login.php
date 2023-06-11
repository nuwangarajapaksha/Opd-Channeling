<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/login_style.css"/>
    </head>
    <body> 
        <div class="login-container login-popup" id="patientlogin">
            <img src="img/Close_Cross_Icon.png" onclick="togglepatientloginpopup();"/>
            <p>Patient Login</p>
            <form method="post" action="action/pp_patient_login_check.php">
                    <p>NIC</p>
                    <input type="text" name="nic" id="nic" placeholder="NIC"/>
                    <p>Password</p>
                    <input type="password" name="password" id="password" placeholder="Password"/>
                    <button>Login</button><label><?php echo $msgPatient; ?></label><br><br>
                    <p class="create-account">If you don't have an account,&nbsp;<span onclick="togglepatientregpopup();"><u>Create New Account</u></span></p>
            </form>
        </div>
        <?php
        include './pp_patient_registration.php';
        ?>
    </body>
</html>
