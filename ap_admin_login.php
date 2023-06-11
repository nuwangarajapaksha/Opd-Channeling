<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/login_style.css"/>
    </head>
    <body>
        <div class="login-container login-popup" id="adminlogin">
            <img src="img/Close_Cross_Icon.png" onclick="toggleadminloginpopup();"/>
            <p>Administrator Login</p>
            <form method="post" action="action/ap_admin_login_check.php">
                    <p>Username</p>
                    <input type="text" name="username" id="username" placeholder="Username"/>
                    <p>Password</p>
                    <input type="password" name="password" id="password" placeholder="Password"/>
                    <button>Login</button><label><?php echo $msgAdmin; ?></label>
            </form>
        </div>
    </body>
</html>
