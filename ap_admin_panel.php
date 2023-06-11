<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OPD Channeling Admin Panel</title>
        <link rel="stylesheet" type="text/css" href="css/admin_panel_style.css"/>
         <?php
        if (isset($_GET["msgAlertProfile"])) {echo "<script>alert('" . $_GET["msgAlertProfile"] . "');</script>"; echo '<BODY onLoad="toggleadministrators();toggleadminprofilepopup();">';}
        $msgProfile = "";
        if (isset($_GET["msgProfile"])) {$msgProfile = $_GET["msgProfile"]; echo '<BODY onLoad="toggleadministrators();toggleadminprofilepopup();">';}
        
        if (isset($_GET["msgAlertPassword"])) {echo "<script>alert('" . $_GET["msgAlertPassword"] . "');</script>"; echo '<BODY onLoad="toggleadministrators();toggleadminprofilepopup();">';}
        $msgPassword = "";
        if (isset($_GET["msgPassword"])) {$msgPassword = $_GET["msgPassword"]; echo '<BODY onLoad="toggleadministrators();toggleadminprofilepopup();toggleadminpasswordchangepopup();">';}
        
        
        if (isset($_GET["msgAlertAdmin"])) {echo "<script>alert('" . $_GET["msgAlertAdmin"] . "');</script>"; echo '<BODY onLoad="toggleadministrators();">';}
        $msgAdmin = "";
        if (isset($_GET["msgAdmin"])) {$msgAdmin = $_GET["msgAdmin"]; echo '<BODY onLoad="toggleadministrators();toggleadminregpopup();">';}
        $keywordAdmin = "";
        if (isset($_GET["searchAdmin"])) {$keywordAdmin = $_GET["searchAdmin"]; echo '<BODY onLoad="toggleadministrators();">';}
        
        
        if (isset($_GET["msgAlertDoctor"])) {echo "<script>alert('" . $_GET["msgAlertDoctor"] . "');</script>"; echo '<BODY onLoad="toggledoctors();">';}
        $msgDoctor = "";
        if (isset($_GET["msgDoctor"])) {$msgDoctor = $_GET["msgDoctor"]; echo '<BODY onLoad="toggledoctors();toggledoctorregpopup();">';}
        $keywordDoctor = "";
        if (isset($_GET["searchDoctor"])) {$keywordDoctor = $_GET["searchDoctor"]; echo '<BODY onLoad="toggledoctors();">';}
        

        if (isset($_GET["msgAlertPatient"])) {echo "<script>alert('" . $_GET["msgAlertPatient"] . "');</script>"; echo '<BODY onLoad="togglepatients();">';}
        $msgPatient = "";
        if (isset($_GET["msgPatient"])) {$msgPatient = $_GET["msgPatient"]; echo '<BODY onLoad="togglepatients(); togglepatientsregpopup();">';}
        $keywordPatient = "";
        if (isset($_GET["searchPatient"])) {$keywordPatient = $_GET["searchPatient"]; echo '<BODY onLoad="togglepatients();">';}
        
        
        if (isset($_GET["msgAlertHospital"])) {echo "<script>alert('" . $_GET["msgAlertHospital"] . "');</script>"; echo '<BODY onLoad="togglehospitals();">';}
        $msgHospital = "";
        if (isset($_GET["msgHospital"])) {$msgHospital = $_GET["msgHospital"]; echo '<BODY onLoad="togglehospitals();togglehospitalregpopup();">';}
        $keywordHospital = "";
        if (isset($_GET["searchHospital"])) {$keywordHospital = $_GET["searchHospital"]; echo '<BODY onLoad="togglehospitals();">';}
        
        
        if (isset($_GET["msgAlertAppointment"])) {echo "<script>alert('" . $_GET["msgAlertAppointment"] . "');</script>"; echo '<BODY onLoad="toggleappointments();">';}
        $keywordAppointment = "";
        if (isset($_GET["searchAppointment"])) {$keywordAppointment = $_GET["searchAppointment"]; echo '<BODY onLoad="toggleappointments();">';}
        
        ?>
    </head>
    <body>   
        <?php include './ap_header.php'; ?>
        <div class="shader" id="shader"></div>
        <div class="dashboard-container">
            <ul>
                <li onclick="toggleadministrators();" id="adminchild">Administrators</li>
                <li onclick="toggledoctors();" id="doctorchild">Doctors</li>
                <li onclick="togglepatients();" id="patientchild">Patients</li>
                <li onclick="togglehospitals();" id="hospitalchild">Hospitals</li>
                <li onclick="toggleappointments();" id="appointmentchild">Appointments</li>
                
            </ul>
        </div>

        <?php
        include './ap_administrators.php';
        include './ap_doctors.php';
        include './ap_patients.php';
        include './ap_hospitals.php';
        include './ap_appointments.php';
        ?>


        <?php include './ap_footer.php'; ?>

        <script type="text/javascript" src="script.js"></script>
    </body>
</html>
