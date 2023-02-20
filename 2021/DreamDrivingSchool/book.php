<?php

// Form input handling for the creation of an account
// This input will CREATE data and insert into the db. asdasd

session_start();

// Import global functions

require('elements/functions.php');

// Execute desired code if data is posted 

if (isset($_POST["user-create-submit"])) {

    // Set the POSTED input as vars, and sanitise

    $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST["lastName"], FILTER_SANITIZE_STRING);
    $birthdate = preg_replace("([^0-9/] | [^0-9-])","",htmlentities($_POST["dateOfBirth"]));
    $licenseCRN = filter_var($_POST["licenseNumber"], FILTER_SANITIZE_NUMBER_INT);
    $state = filter_var($_POST["state"], FILTER_SANITIZE_STRING); 
    $gender = filter_var($_POST["gender"], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);

    if (isset($_POST["medicalCondition"])) {
        $medical = 1;
    }
    else {
        $medical = 0;
    }

    // Update the license & state into a separate UUID

    $licenceUUID = $licenseCRN . $state;
    
    // Debugging -> output posted values

    //echo($firstName.$lastName.$birthdate.$licenseCRN.$state.$gender.$address.$vehicleType.$vehiclePlate.$email);

    echo "<br>";

    // Check whether the data is already in the db; if not, then insert.

    $userInDBOne = runQuery(("SELECT * FROM `tblClientData` WHERE `licenseUUID` = '" . $licenceUUID . "'"));
    $isUserInDB = sizeof($userInDBOne);

    echo "<br> working, " . $isUserInDB;

    // Set a session variable to the user's first name and email
    $_SESSION["userFirstName"] = $firstName;
    $_SESSION["userEmail"] = $email;

    if ($isUserInDB < 1) {
        // User is not already in the DB, INSERT them
        $insertSQL = "INSERT INTO `tblClientData` (`firstName`, `lastName`, `dateOfBirth`, `licenseUUID`, `gender`, `address`, `hasMedicalCondition`, `phoneNumber`, `email`) VALUES ('". $firstName ."', '". $lastName ."', '". $birthdate ."', '". $licenceUUID ."', '". $gender ."', '". $address ."', '". $medical ."', '". $phone ."', '". $email . "')";
        echo "<br>" . $insertSQL;
        runQuery($insertSQL);
        $_SESSION["bookingState"] = 2;
        $_POST = array(); // Clear the POST array

    }
    else {
        // User is already in the DB, alert them
         $_SESSION["bookingState"] = 1;
         $_POST = array(); // Clear the POST array
    }

}
else if (isset($_POST["continue-to-book"])) {
    // User has completed the account creation process, and is ready to book
    $_SESSION["bookingState"] = 3;
}
else if (isset($_POST["instructor-select"])) {
    // User has selected instructor
    $_SESSION["bookingState"] = 4;
    $_SESSION["selectedInstructorID"] = $_POST["instructor-select"];
    $_POST = array(); // Clear the POST array
}
else if (isset($_POST["book-final-submit"])) {
    $_SESSION["bookingState"] = 5;

    $lessonDate = $_POST["lessonDate"];
    $startTime = $_POST["startTime"];
    $duration = $_POST["duration"];
    $lessonType = $_POST["lessonType"];
    $pickUpAddress = $_POST["pickUpAddress"];
    $dropOffAddress = $_POST["dropOffAddress"];
    $instructor = $_SESSION["selectedInstructorID"];

    $_POST = array(); // Clear the POST array
}
else if (isset($_POST["try-book-again"])) {
    $_SESSION["bookingState"] = 4;
    $_POST = array(); // Clear the POST array
}
else if (isset($_POST["back-to-index"])) {
    $_SESSION["bookingState"] = 0;
    header("Location: index.php");
    $_POST = array(); // Clear the POST array
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Dream Driving School - Book</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navbar -->
            <?php include 'elements/navbar.php'; ?>            
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-secondary bg-gradient text-white rounded-3 mb-3"><i class="fi fi-rr-car"></i></div>
                            <h1 class="fw-bolder">Book a Driving Lesson</h1>
                            <p class="lead fw-normal text-muted mb-0">You're moments away from driving perfectly.</p>
                        </div>
                    <!-- Booking form -->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <?php 
                        if ($_SESSION["bookingState"] == 1) {
                            // You already have an account with us
                            require("existing-account.php"); 
                        }
                        else if ($_SESSION["bookingState"] == 2) {
                            // Account has been created, show next page
                            require("account-created.php");
                        }
                        else if ($_SESSION["bookingState"] == 3) {
                            // Show list of instructors to choose from
                            require("instructor-select.php");
                        }
                        else if ($_SESSION["bookingState"] == 4) {
                            // Show available times
                            $selectedInstructorID = $_POST["instructor-select"];
                            require("available-times.php");
                        }
                        else if ($_SESSION["bookingState"] == 5) {
                            // Confirm Booking
                            require("confirm-booking.php");
                        }
                        else if ($_SESSION["bookingState"] == 6) {
                            
                        }
                        else {
                            // Show the create acc booking form
                            $_SESSION["bookingState"] == 0;
                            require("create-account.php"); 
                        }
                        
                        ?>
                    </div>
                    <!-- Metric Cards -->
                    <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5">
                        <div class="col">
                            <div class="feature bg-secondary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people"></i></div>
                            <div class="h5 mb-2">Over 11,000 Clients</div>
                            <p class="text-muted mb-0">We're the popular choice!</p>
                        </div>
                        <div class="col">
                            <div class="feature bg-secondary bg-gradient text-white rounded-3 mb-3"><i class="fi fi-rs-shield-plus"></i></div>
                            <div class="h5">Certified Drivers</div>
                            <p class="text-muted mb-0">Our drivers are all certifed by the Queensland Government.</p>
                        </div>
                        <div class="col">
                            <div class="feature bg-secondary bg-gradient text-white rounded-3 mb-3"><i class="fi fi-rr-syringe"></i></div>
                            <div class="h5">COVID-19 Fully Vaccinated</div>
                            <p class="text-muted mb-0">All of our drivers and staff are fully vaccinated.</p>
                        </div>
                        <div class="col">
                            <div class="feature bg-secondary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-telephone"></i></div>
                            <div class="h5">Questions?</div>
                            <p class="text-muted mb-0">Call us during normal business hours at (+61) 432 089 147</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Dream Driving School, 2021. Website by <a href="www.maccastech.com.au">Charlie</a></div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
