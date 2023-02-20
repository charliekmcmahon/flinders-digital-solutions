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
                        <h1 class="fw-bolder">Check your booking information</h1>
                        <p class="lead fw-normal text-muted mb-0">Data live as of now.</p>
                    </div>
                    <!-- form -->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                    
                    <?php

                    if (isset($_POST["booking-read-submit"])) {
                        require('elements/functions.php');
                        $bookingID = $_POST["bookingID"];

                        $sql = "SELECT * FROM `tblBookingData` WHERE `bookingID` = '". $bookingID . "'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        
                        echo '<h2 class="fw-bolder">Here is your booking information:</h2>';
                        echo "Booking ID: " . $row["bookingID"] . "<br>";
                        echo "Booking Date: " . $row["date"] . "<br>";
                        echo "Booking Start Time: " . $row["startTime"] . "<br>";
                        echo "Booking Duration: " . $row["duration"] . " hours <br>";
                        echo "Lesson Type: " . $row["lessonType"] . "<br>";
                        echo "Pickup Location: " . $row["pickupLocation"] . "<br>";
                        echo "Drop Off Location: " . $row["dropOffLocation"] . "<br>";

                        // Get instructor's name
                        $sql = "SELECT `firstName` FROM `tblInstructorData` WHERE `instructorID` = '". $row["instructorID"] . "'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);

                        echo "Instructor: " . $row["firstName"] . "<br>";


                    }


                    ?>

                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <h2 class="fw-bold mb-0">Enter your booking ID</h2>
                    </div>
                <div class="modal-body p-5 pt-0">
                    <form class="" action="bookingStatus.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-4" id="floatingBookingID" name="bookingID" placeholder="1">
                            <label for="floatingBookingID">Booking ID</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit" name="booking-read-submit">Check booking</button>
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