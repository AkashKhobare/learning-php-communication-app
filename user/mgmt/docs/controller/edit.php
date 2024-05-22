<?php
include ("../../../../db/db.php");

$label = $_POST['file_label'];
$id = $_GET['doc_id'];

edit($label, $id);

function edit($label, $id)
{
    $db = new DBConnection();
    $db_conn = $db->getDBConnection();

    $query = "UPDATE uploads SET label='" . $label . "' WHERE upload_id=" . $id;
    $db_conn->query($query);
    navigate("../docs.php");
}

function navigate($url)
{
    header("Location: " . $url);
}
?>