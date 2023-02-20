<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Dream Driving School - delete account</title>
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
                        <h1 class="fw-bolder">Delete your Account</h1>
                    </div>
                    <!-- form -->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                    
                    <?php

                    if (isset($_POST["acc-delete-submit"])) {
                        require('elements/functions.php');
                        $clientID = $_POST["clientID"];

                        $sql = "DELETE FROM `tblClientData` WHERE `clientID` = '" . $clientID . "'";
                        $result = mysqli_query($conn, $sql);
                        
                        echo "Success! Your account has been deleted.";


                    }


                    ?>
                    </div>
                <div class="modal-body p-5 pt-0">
                    <form class="" action="delete-account.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-4" id="floatingBookingID" name="clientID" placeholder="1">
                            <label for="floatingBookingID">Client ID</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit" name="acc-delete-submit">Delete Account</button>
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