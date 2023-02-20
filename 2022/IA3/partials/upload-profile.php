<?php

if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['photo']['tmp_name'];
    $fileName = $_FILES['photo']['name'];
    $fileSize = $_FILES['photo']['size'];
    $fileType = $_FILES['photo']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $allowedfileExtensions = array('jpg', 'jpeg', 'gif', 'png');
    if (in_array($fileExtension, $allowedfileExtensions)) {
        // directory in which the uploaded file will be moved
        $uploadFileDir = '../userProfiles/';
        $dest_path = $uploadFileDir . $newFileName;
        
        if(move_uploaded_file($fileTmpPath, $dest_path))
        {
            $message ='File was successfully uploaded.';
            $uploadOk = 1;
        }
        else
        {
            $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            $uploadOk = 0;
        }
        echo $message;
    } else {
        $uploadOk = 0;
        echo "Your file type is not supported. Please use png/jpg/jpeg/gif ";
    }
}

?>