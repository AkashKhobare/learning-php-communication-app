<?php
require ("../helper.php");
include ("../../../../db/db.php");

session_start();

if (!$_SESSION['email'] && !$_SESSION['token']) {
    header("location: " . $_GLOBAL['app_root_host'] . "../home/welcome.php");
}

$_GLOBAL['app_root'] = $_SERVER['DOCUMENT_ROOT'] . "/training/php/project/communication";

if ($_FILES['userfile']['error'] > 0) {
    switch ($_FILES['userfile']['error']) {
        case 1:
            echo "File exceeded upload_max_file_size";
            break;

        case 2:
            echo "File exceeded upload max_file_size";
            break;

        case 3:
            echo "File only partially uploaded";
            break;

        case 4:
            echo "no file uploaded";
            break;
    }
}

// MIME Type
if ($_FILES['userfile']['type'] != 'image/png') {
    echo "Problem: File is not a PNG file";
    exit;
}

$uploaded_file_path = $_GLOBAL['app_root'] . "/data/uploads/" . $_FILES['userfile']['name'];
$filename = $_FILES['userfile']['name'];
$label = $_POST['file_label'];
$email = $_SESSION['email'];

uploadFile($uploaded_file_path);

$db = new DBConnection();
$db_conn = $db->getDBConnection();

$query = "INSERT INTO uploads (label, filename, user_email) VALUES (:label, :filename, :email)";
$stmt = $db_conn->prepare($query);
$stmt->execute(['label' => $label, 'filename' => $filename, 'email' => $email]);

header("Location: ../docs.php");
