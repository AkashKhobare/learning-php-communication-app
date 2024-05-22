<?php
session_start();
include ("../../db/db.php");

$email = $_POST['email'];
$password = $_POST['password'];
$encoded_pass = md5($password);

$db = new DBConnection();
$db_conn = $db->getDBConnection();

$query = "SELECT password FROM user WHERE email='$email'";
$res = $db_conn->query($query);

if ($res->rowCount() > 0) {
    $row = $res->fetch();
    if ($row['password'] != '' && $row['password'] == $encoded_pass) {
        $_SESSION["email"] = $email;
        $_SESSION["token"] = $encoded_pass;
        header("Location: ../mgmt/home/home.php");
    } else {
        header("Location: failure.php");
    }
} else {
    header("Location: failure.php");
}
?>