<?php
include ("../../../../db/db.php");

$id = $_GET['doc_id'];

delete($id);

function delete($id)
{
    $db = new DBConnection();
    $db_conn = $db->getDBConnection();

    $query = "DELETE FROM uploads WHERE upload_id=" . $id;
    $db_conn->query($query);
    navigate("../docs.php");
}

function navigate($url)
{
    header("Location: " . $url);
}
?>