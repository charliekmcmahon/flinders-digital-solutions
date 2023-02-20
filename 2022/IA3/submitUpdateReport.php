<?php
session_start();
// Get all of the POST data from the form below and add it to the report database
$userNick = $_POST["name"];
$location = $_POST['location'];
$damage = $_POST['damage'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["location"])) {
  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["photo"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
    // Redirect to the dashboard --> with success
    // Upload the data to the query
    $query = "UPDATE reports (Authorusername, LocationID, DamageDescription, DamagePicture) VALUES ('$userNick', '$location', '$damage', '$target_file') WHERE ReportID = " . $_POST["ReportID"];
    require('connectDB.php');
    $result = $mysqli->query($query);
    echo $query;
    // Close the connection
    $mysqli->close();

    header("Location: dashboard/index.php?uploadSuccess=true");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

?>