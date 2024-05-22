<?php
session_start();
$_GLOBAL['app_root_host'] = "http://" . $_SERVER['HTTP_HOST'] . "/training/php/project/communication/user/";

if (!$_SESSION['email'] && !$_SESSION['token']) {
    header("location: " . $_GLOBAL['app_root_host'] . "../home/welcome.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navb.ar navbar-expand-lg navbar-light bg-light" style="padding: 1rem">
        <div class="container-fluid">
            <a class="navbar-brand">Communication App</a>
        </div>
    </nav>
    <br>
    <div style="display: flex; align-items: center; flex-direction: column;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_GLOBAL['app_root_host'] ?>mgmt/home/home.php">
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_GLOBAL['app_root_host'] ?>mgmt/chat/chat.php">Group
                            Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_GLOBAL['app_root_host'] ?>mgmt/list/list.php">Manage
                            Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_GLOBAL['app_root_host'] ?>mgmt/docs/docs.php">Manage
                            Documents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_GLOBAL['app_root_host'] ?>logout/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
<!-- 
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>

</html>