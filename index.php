<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OPD Channeling</title>
        <link rel="stylesheet" type="text/css" href="css/index_style.css"/>
        <?php
        if (isset($_GET["msgAlertDoctorReg"])) { echo "<script>alert('" . $_GET["msgAlertDoctorReg"] . "');</script>";}
        $msgDoctorReg = "";
        if (isset($_GET["msgDoctorReg"])) {$msgDoctorReg = $_GET["msgDoctorReg"];echo '<BODY onLoad="toggledoctorregpopup();">';}
        $msgDoctor = "";
        if (isset($_GET["msgDoctor"])) {$msgDoctor = $_GET["msgDoctor"];echo '<BODY onLoad="toggledoctorloginpopup();">';}      
        
        
        if (isset($_GET["msgAlertPatientReg"])) { echo "<script>alert('" . $_GET["msgAlertPatientReg"] . "');</script>";}
        $msgPatientReg = "";
        if (isset($_GET["msgPatientReg"])) {$msgPatientReg = $_GET["msgPatientReg"];echo '<BODY onLoad="togglepatientregpopup();">';}
        $msgPatient = "";
        if (isset($_GET["msgPatient"])) {$msgPatient = $_GET["msgPatient"];echo '<BODY onLoad="togglepatientloginpopup();">';}

        
        $msgAdmin = "";
        if (isset($_GET["msgAdmin"])) {$msgAdmin = $_GET["msgAdmin"];echo '<BODY onLoad="toggleadminloginpopup();">';}
        ?>
    </head>
    <body>
        <?php include './index_header.php'; ?>
        <div class="shader" id="shader"></div>
<?php include './index_slider.php'; ?>

        <div class="index-container">
            <h1>OPD Channeling</h1>
            <h3>E-Channeling Platform</h3><br><br>
            <h4>Protect your Life in this Pandemic Situation</h4><br>
            <h5>Now, you no need to stay in long queues until our turn arrives, for a long time.<br>
                Use this Web Application and <u>channel your OPD doctor before easily</u>.</h5><br><br>
            <center>
                <p>
                    This is a National Project then,<br>
                    This channeling web application would be <u><b>free for any local citizen</b></u> 
                    and anyone can channel (add appointment) any OPD Doctor in a specific time slot.
                    <br><br>About More Details&nbsp;<a href="about.php">click hear</a>
                </p>
            </center>
        </div>

<?php include './index_footer.php'; ?>

        <script type="text/javascript" src="script.js"></script>
    </body>
</html>
