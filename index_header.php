<!DOCTYPE html>
<?php
include './action/db_connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/index_headerfooter_style.css"/>
    </head>
    <body>
        <header>
            <nav>
                <div class="header-container">
                    <p><a href="index.php">OPD&nbsp;<span>Channeling</span></a></p>
                    <ul>
                        <li onclick="toggledoctorloginpopup();">Doctors</li>
                        <li onclick="togglepatientloginpopup();">Patients</li>
                        <li><a href="index_about.php">About</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php
        include './dd_doctor_login.php';
        include './pp_patient_login.php';
        ?>

    </body>
</html>
