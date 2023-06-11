<!DOCTYPE html>
<?php
$query = "SELECT * FROM doctor ORDER BY doctor_id DESC";
$result = $connection->query($query);
$doctorId = 1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $doctorId = $row["doctor_id"]+1;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/registration_style.css"/>
    </head>
    <body>
        <div class="reg-container reg-popup" id="doctorreg">
            <img src="img/Close_Cross_Icon.png" onclick="toggledoctorregpopup();"/>
            <p>Doctor Registration</p>
            <form method="post" action="action/dd_doctor_register.php">
                <div class="column">
                    <p>Doctor Id<sup>*</sup></p>
                    <input type="text" name="id" id="id" value="<?php echo $doctorId; ?>" placeholder="Doctor Id" readonly/>
                    <p>Name<sup>*</sup></p>
                    <input type="text" name="name" id="name" placeholder="Name"/>
                    <p>NIC<sup>*</sup></p>
                    <input type="text" name="nic" id="nic" placeholder="NIC"/>
                    <p>Contact No<sup>*</sup></p>
                    <input type="text" name="contactNo" id="contactNo" placeholder="Contact No"/>
                    <button>Register</button><label><?php echo $msgDoctorReg; ?></label>
                </div>
                <div class="column">
                    <p>Hospital<sup>*</sup></p>   
                    <select name="hospitalId" id="hospitalId">
                        <?php
                        $query = "SELECT * FROM hospital WHERE hospital_status = 1";
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
                    <input type="password" name="password" id="password" placeholder="Password"/>
                    <p>Confirm Password<sup>*</sup></p>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password"/>
                </div>
            </form>
        </div>
    </body>
</html>
