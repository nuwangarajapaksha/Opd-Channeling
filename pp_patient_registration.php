<!DOCTYPE html>
<?php
$query = "SELECT * FROM patient ORDER BY patient_id DESC";
$result = $connection->query($query);
$patientId = 1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $patientId = $row["patient_id"]+1;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/registration_style.css"/>
    </head>
    <body>
        <div class="reg-container reg-popup" id="patientreg">
            <img src="img/Close_Cross_Icon.png" onclick="togglepatientregpopup();"/>
            <p>Patient Registration</p>
            <form method="post" action="action/pp_patient_register.php">
                <div class="column">
                    <p>Patient Id<sup>*</sup></p>
                    <input type="text" name="id" id="id" value="<?php echo $patientId; ?>" placeholder="Patient Id" readonly/>
                    <p>Name<sup>*</sup></p>
                    <input type="text" name="name" id="name" placeholder="Name"/>
                    <p>NIC<sup>*</sup></p>
                    <input type="text" name="nic" id="nic" placeholder="NIC"/>
                    <p>Date Of Birth<sup>*</sup></p>
                    <input type="date" name="dob" id="dob" placeholder="Date Of Birth"/>
                    <button>Register</button><label><?php echo $msgPatientReg; ?></label>
                </div>
                <div class="column">
                    <p>Address<sup>*</sup></p>
                    <input type="text" name="address" id="address" placeholder="Address"/>
                    <p>Contact No<sup>*</sup></p>
                    <input type="text" name="contactNo" id="contactNo" placeholder="Contact No"/>
                    <p>Password<sup>*</sup></p>
                    <input type="password" name="password" id="password" placeholder="Password"/>
                    <p>Confirm Password<sup>*</sup></p>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password"/>
                </div>
            </form>
        </div>
    </body>
</html>
