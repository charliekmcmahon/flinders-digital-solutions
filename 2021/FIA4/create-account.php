<?php

// Form input handling for the creation of an account
// This input will CREATE data and insert into the db.

session_start();

// Import global functions

require('elements/functions.php');

// Execute desired code if data is posted 

if (isset($_POST["user-submit"])) {

    // Set the POSTED input as vars, and sanitise

    $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST["lastName"], FILTER_SANITIZE_STRING);
    $birthdate = preg_replace("([^0-9/] | [^0-9-])","",htmlentities($_POST["dateOfBirth"]));
    $licenseCRN = filter_var($_POST["licenseNumber"], FILTER_SANITIZE_NUMBER_INT);
    $state = filter_var($_POST["state"], FILTER_SANITIZE_STRING); 
    $gender = filter_var($_POST["gender"], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
    $vehicleType = filter_var($_POST["vehicleType"], FILTER_SANITIZE_STRING);
    $vehiclePlate = filter_var($_POST["vehiclePlate"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    // Update the license & state into a separate UUID

    $licenceUUID = $licenseCRN . $state;

    // Debugging -> output posted values

    echo($firstName.$lastName.$birthdate.$licenseCRN.$state.$gender.$address.$vehicleType.$vehiclePlate.$email);

    echo "<br>";

    // Check whether the data is already in the db; if not, then insert.

    $userInDBOne = runQuery(("SELECT * FROM `tblclientdata` WHERE `licenseUUID` = '" . $licenceUUID . "'"));
    $isUserInDB = sizeof($userInDBOne);

    echo "<br> working, " . $isUserInDB;

    if ($isUserInDB < 1) {
        // User is not already in the DB, INSERT them
        $insertSQL = "INSERT INTO `tblclientdata` (`firstName`, `lastName`, `dateOfBirth`, `licenseUUID`, `gender`, `address`, `vehicleType`, `vehiclePlate`, `email`) VALUES ('". $firstName ."', '". $lastName ."', '". $birthdate ."', '". $licenceUUID ."', '". $gender ."', '". $address ."', '". $vehicleType ."', '". $vehiclePlate ."', '". $email . "')";
        echo "<br>" . $insertSQL;
        runQuery($insertSQL);
        echo "<script>alert('Account created');</script>";


    }
    else {
        // User is already in the DB, alert them
         echo "<script>alert('You have already created an account with us!');</script>";
    }

}


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Driving School</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1> Dream Driving School </h1>
    <section>
        <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-5 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <h2 class="fw-bold mb-0">Enter your details</h2>
                    </div>

                    <div class="modal-body p-5 pt-0">
                        <form class="" action="create-account.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="floatingFirstName" name="firstName" placeholder="John">
                                <label for="floatingFirstName">First Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="floatingLastName" name="lastName"  placeholder="Smith">
                                <label for="floatingLastName">Last Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control rounded-4" id="floatingDOB"  name="dateOfBirth"  placeholder="12/12/2004">
                                <label for="floatingDOB">Birthdate</label><span class="glyphicon glyphicon-calendar"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="floatingLicenseNumber"  name="licenseNumber" placeholder="101 202 303">
                                <label for="floatingLicenseNumber">License Number (CRN)</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select"  name="state" id="floatingStateSelect">
                                    <option value="QLD" selected>Queensland</option>
                                    <option value="NSW">New South Wales</option>
                                    <option value="NT">Northern Territory</option>
                                    <option value="WA">Western Australia</option>
                                    <option value="TAS">Tasmania</option>
                                    <option value="SA">South Australia</option>
                                </select>
                                <label for="floatingStateSelect">State</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select"  name="gender"  id="floatingGender">
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <label for="floatingGender">Gender</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="floatingAddress"  name="address" placeholder="123 Main Street">
                                <label for="floatingAddress">Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select"  name="vehicleType"  id="vehicleType">
                                    <option value="Car" selected>Car</option>
                                    <option value="Motorbike">Motorbike</option>
                                    <option value="Truck">Truck</option>
                                </select>
                                <label for="vehicleType">Your Vehicle Type</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="floatingVehiclePlate"  name="vehiclePlate"  placeholder="123ABC">
                                <label for="floatingVehiclePlate">Your vehicle's number plate</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit" name="user-submit">Sign up</button>
                            <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>

</html>