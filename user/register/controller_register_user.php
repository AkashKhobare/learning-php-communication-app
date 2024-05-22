<?php
include ("../../db/db.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirmPassword'];

register($username, $email, $password, $confirm_password);

function register($username, $email, $password, $confirm_password)
{
    validate($username, $email, $password, $confirm_password);

    $db = new DBConnection();
    $db_conn = $db->getDBConnection();

    $query = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $db_conn->prepare($query);
    $encoded_pass = md5($password);
    $stmt->execute([':username' => $username, ':email' => $email, ':password' => $encoded_pass]);

    navigate("success.php");
}

function validate($username, $email, $password, $confirm_password)
{
    if (
        !$username || !$email || !$password || !$confirm_password
        || $password != $confirm_password
    ) {
        navigate("failure.php");
        exit();
    }
}

function navigate($url)
{
    header("Location: " . $url);
}
?>