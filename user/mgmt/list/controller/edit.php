<?php
include ("../../../../db/db.php");

$username = $_POST['username'];
$email = $_POST['email'];
$id = $_GET['user_id'];

edit($username, $email, $id);

function edit($username, $email, $id)
{
    $db = new DBConnection();
    $db_conn = $db->getDBConnection();

    $query = "UPDATE user SET username='".$username."', email='".$email."' WHERE id=".$id;
    $db_conn->query($query);
    navigate("../list.php");
}

function navigate($url)
{
    header("Location: " . $url);
}
?>