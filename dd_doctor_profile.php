<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/registration_style.css"/>
    </head>
    <body>
        <div class="reg-container reg-popup" id="doctorprofile">
            <img src="img/Close_Cross_Icon.png" onclick="toggledoctorprofilepopup();"/>
            <p>Doctor Profile</p>
            <form method="post" action="action/dd_doctor_profile_update.php">
                <div class="column">
                    <p>Doctor Id<sup>*</sup></p>
                    <input type="text" name="id" id="id" value="<?php echo $activeDoctorId; ?>" placeholder="Doctor Id" readonly/>
                    <p>Name<sup>*</sup></p>
                    <input type="text" name="name" id="name" value="<?php echo $activeDoctorName; ?>" placeholder="Name"/>
                    <p>NIC<sup>*</sup></p>
                    <input type="text" name="nic" id="nic" value="<?php echo $activeDoctorNic; ?>" placeholder="NIC" readonly/>
                    <p>Contact No<sup>*</sup></p>
                    <input type="text" name="contactNo" id="contactNo" value="<?php echo $activeDoctorContactNo; ?>" placeholder="Contact No"/>
                    <button>Save</button><label><?php echo $msgProfile; ?></label>
                </div>
                <div class="column">
                    <p>Hospital<sup>*</sup></p>   
                    <select name="hospitalId" id="hospitalId">
                        <?php
                        $query = "SELECT * FROM hospital WHERE hospital_id = '".$activeHospitalId."' AND hospital_status = 1";
                        $result = $connection->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row["hospital_id"]; ?>"><?php echo $row["hospital_name"]; ?></option>
                            <?php }
                        }
                        ?>
                        <?php
                        $query = "SELECT * FROM hospital WHERE hospital_id != '".$activeHospitalId."' AND hospital_status = 1";
                        $result = $connection->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row["hospital_id"]; ?>"><?php echo $row["hospital_name"]; ?></option>
                            <?php }
                        }
                        ?>
                    </select>
                    <p>Password<sup>*</sup></p>
                    <input type="hidden" name="password" id="password" placeholder="Password"/>
                </div>
            </form>
            <button class="password-change-button" onclick="toggledoctorpasswordchangepopup();">Change Password</button>
            <?php include './dd_doctor_password_change.php'; ?>
        </div>
    </body>
</html>
