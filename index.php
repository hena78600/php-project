<?php
include 'function.php';
$con = connect_db();

$check = mysqli_query($con, "Select id from employee");
if(mysqli_num_rows($check) == 0){
    header("Location: setup.php");
}else{
    header("Location: login.php");
}   