<?php
require './function.php';
$con = connect_db();
if (isset($_FILES["file"])) {
    $id = $_SESSION['emp'];
    $fileName = $_FILES["file"] ["name"];
    $tempName = $_FILES["file"] ["tmp_name"];
    $ext = $_FILES["file"]["type"];
    $localImage = "uploaded/";
    if($ext !== 'image/jpeg' && $ext !== 'image/jpg' && $ext !== 'image/png'){
        echo 'Unsupported File Type';
    }else{
        $newName = $id.".jpg";
        move_uploaded_file($tempName, $localImage.$newName);
        if(mysqli_query($con, "Update employee set pic = '1' where id = '$id'")){
            echo 'Profile Photo Uploaded';
        }else{
            echo 'Some Error Occured. Please try again';
        }
    }
    
}