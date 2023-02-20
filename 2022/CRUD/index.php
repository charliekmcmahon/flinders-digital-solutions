<?php

// Start session
session_start();

// Include the database configuration file
include_once 'dbSetup.php';

if (isset($_GET['type'])) {
    $type = $_GET['type'];
} else {
    $type = 'create';
}

if ($type == 'create') {
    $formSubmit = 'submit';
    $formTitle = 'Create Account';
} else if ($type == 'update') {
    $formSubmit = 'update';
    $formTitle = 'Update Account';
    $formDisabled = 'readonly disabled value="' . $_GET['username'] . '"';
    $_SESSION['username'] = $_GET['username'];
} else if ($type == 'delete') {
    $formTitle = 'Create a New Account';
    $formSubmit = 'delete';
    $delete = $_GET['id'];
} else {
    $formTitle = 'Create Account';
    $formSubmit = 'submit';
}

// pass data from POST form
$username = $_POST['username'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$birthday = $_POST['birthday'];

$update = $_POST['update'];
$updateSubmit = $_POST['update'];

$submit = $_POST['submit'];

if (isset($submit)) {
    $formDisabled = '';

    // sanitise variables
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
    $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $birthday = filter_var($birthday, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // insert data into database
    $query = "INSERT INTO users (username, first_name, last_name, email, phone, password, birthday) VALUES ('$username', '$first_name', '$last_name', '$email', '$phone', '$password', '$birthday')";
    $result = $result = $db->query($query);

    // check if data is inserted
    if ($result) {
        echo "<script>alert('Account Successfully Created.');</script>";
        echo '<script src="confetti.min.js"></script>';
    }
}
else if (isset($updateSubmit)) {
    // sanitise variables
    $username = $_SESSION['username'];
    $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
    $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $birthday = filter_var($birthday, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // update data into database
    $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', password = '$password', birthday = '$birthday' WHERE username = '$username'";
    $result = $result = $db->query($query);

    // check if data is updated
    if ($result) {
        echo "<script>alert('Account Successfully Updated.');</script>";
    }
}
else if (isset($delete)) {
    // delete data from database
    $query = "DELETE FROM users WHERE id = '$delete'";
    $result = $result = $db->query($query);

    // check if data is deleted
    if ($result) {
        echo "<script>alert('Account Successfully Deleted.');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CRUD Cycle</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <!-- Boostrap Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light m-2 ms-5 ps-5 me-5 ps-5">
            <a class="navbar-brand" href="#">CRUD Cycle</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Create</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End of Bootstrap Navbar -->
        <div class="container">
            <div class="row">
                <!-- Form to add data to database -->
                <div class="col-md-6 mt-5">
                    <h1 id="demo"><?php echo $formTitle; ?></h1> <?php include('confetti.php'); ?>
                    <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="form-group p-1">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" <?php echo $formDisabled; ?> placeholder="Username">
                        </div>
                        <div class="form-group p-1">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                        </div>
                        <div class="form-group p-1">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                        </div>
                        <div class="form-group p-1">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group p-1">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                        </div>
                        <div class="form-group p-1">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group p-1">
                            <label for="birthday">Birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday">
                        </div>
                        <br>
                        <button type="submit" name="<?php echo $formSubmit; ?>" class="btn btn-primary m-1">Submit</button>
                    </form>
                </div>

                <div class="col-md-12 mt-5">
                    <h1>Read, Update, Delete Data</h1>
                    <h6>(Data sorted as newest first)</h3>
                    <hr>
                    <?php
                    // Get records from the database
                    $query = "SELECT * FROM users ORDER BY id DESC";
                    $stmt = $db->query($query);
                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($users)) {
                                foreach ($users as $user) {
                                    echo '<tr>';
                                    echo '<td>' . $user['id'] . '</td>';
                                    echo '<td>' . $user['first_name'] . '</td>';
                                    echo '<td>' . $user['email'] . '</td>';
                                    echo '<td>';
                                    echo '<a href="'. basename($_SERVER['PHP_SELF']) .'?id=' . $user['id'] . '&type=update&username=' . $user['username'] . '" class="btn btn-primary">Edit</a>';
                                    echo ' ';
                                    echo '<a href="' . basename($_SERVER['PHP_SELF']) . '?id=' . $user['id'] . '&type=delete' . '" class="btn btn-danger">Delete</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="4">No data found</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>