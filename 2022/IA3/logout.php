<?php
session_start();
// unset session vars
unset($_SESSION['username']);
// Redirect to the login page

session_destroy();
header("Location: ./login");
?>