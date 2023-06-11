<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/registration_style.css"/>
    </head>
    <body>
        <div class="reg-container reg-popup" id="patientprofile">
            <img src="img/Close_Cross_Icon.png" onclick="togglepatientprofilepopup();"/>
            <p>Patient Profile</p>
            <form method="post" action="action/pp_patient_profile_update.php">
                <div class="column">
                    <p>Patient Id<sup>*</sup></p>
                    <input type="text" name="id" id="id" value="<?php echo $activePatientId; ?>" placeholder="Patient Id" readonly/>
                    <p>Name<sup>*</sup></p>
                    <input type="text" name="name" id="name" value="<?php echo $activePatientName; ?>" placeholder="Name"/>
                    <p>NIC<sup>*</sup></p>
                    <input type="text" name="nic" id="nic" value="<?php echo $activePatientNic; ?>" placeholder="NIC" readonly/>
                    <p>Date Of Birth<sup>*</sup></p>
                    <input type="date" name="dob" id="dob" value="<?php echo $activePatientDob; ?>" placeholder="Date Of Birth"/>
                    <button>Save</button><label><?php echo $msgProfile; ?></label>
                </div>
                <div class="column">
                    <p>Address<sup>*</sup></p>
                    <input type="text" name="address" id="address" value="<?php echo $activePatientAddress; ?>" placeholder="Address"/>
                    <p>Contact No<sup>*</sup></p>
                    <input type="text" name="contactNo" id="contactNo" value="<?php echo $activePatientContactNo; ?>" placeholder="Contact No"/>
                    <p>Password<sup>*</sup></p>
                    <input type="hidden" name="password" id="password" placeholder="Password"/>
                </div>
            </form>
            <button class="password-change-button" onclick="togglepatientpasswordchangepopup();">Change Password</button>
            <?php include './pp_patient_password_change.php'; ?>
        </div>
    </body>
</html>
