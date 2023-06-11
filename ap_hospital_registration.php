<!DOCTYPE html>
<?php
$query = "SELECT * FROM hospital ORDER BY hospital_id DESC";
$result = $connection->query($query);
$hospitalId = 1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hospitalId = $row["hospital_id"]+1;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/registration_style.css"/>
    </head>
    <body>
         <div class="reg-container reg-popup" id="hospitalreg">
            <img src="img/Close_Cross_Icon.png" onclick="togglehospitalregpopup();"/>
            <p>Hospital Registration</p>
            <form method="post" action="action/ap_hospital_register.php">
                    <p>Hospital Id<sup>*</sup></p>
                    <input type="text" name="id" id="id" value="<?php echo $hospitalId; ?>" placeholder="Hospital No" readonly/>
                    <p>Hospital Name<sup>*</sup></p>
                    <input type="text" name="name" id="name" placeholder="Hospital Name"/>
                    <p>City<sup>*</sup></p>
                    <input type="text" name="city" id="city" placeholder="City"/>
                    <p>Contact No<sup>*</sup></p>
                    <input type="text" name="contactNo" id="contactNo" placeholder="Contact No"/>
                    <button>Register</button><br><label><?php echo $msgHospital; ?></label>
            </form>
        </div>
    </body>
</html>
