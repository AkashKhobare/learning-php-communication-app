<?php
include ("../../../../db/db.php");

$id = $_GET['user_id'];

delete($id);

function delete($id)
{
    $db = new DBConnection();
    $db_conn = $db->getDBConnection();

    $query = "DELETE FROM user WHERE id=".$id;
    $db_conn->query($query);
    navigate("../list.php");
}

function navigate($url)
{
    header("Location: " . $url);
}
?>