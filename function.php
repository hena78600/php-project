<?php

//Session Start
session_start();

//Connect to db
function connect_db(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "identity";
    $con = mysqli_connect($host, $user, $password, $db);
    if($con){
        return $con;
    }else{
        die('Database Connectivity Error');
    }
}

//Filter the values
function sanitizeString($var){
    $var = stripslashes($var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    return $var;
}

//Restrict inner access
//Check Login
function loggedin(){
    if(isset($_COOKIE['emp']) || isset($_SESSION['emp'])){
        $loggedin= TRUE;
        return $loggedin;
    }
}