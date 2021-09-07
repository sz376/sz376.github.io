<?php

ob_start();
session_start();

$user = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$priority = $_POST['priority'];
$category = $_POST['category'];
$txt = $_POST['textmsg'];
$now = date('Y-m-d H:i:s');

$con = mysqli_connect("sql1.njit.edu", "sz376", SECRET_KEY, "sz376");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    $query =
        "INSERT into `auth` (username, pass, email)
        VALUES ('$user', '$password', '$email')";
    $result = mysqli_query($con, $query);
    $query =
        "INSERT into `incident` (user, priority, category, incident_description, datetime)
        VALUES ('$user', '$priority', '$category', '$txt', '$now')";
    $result = mysqli_query($con, $query);
    echo "Data inserted. Thank you for your contribution!";
}

?>
