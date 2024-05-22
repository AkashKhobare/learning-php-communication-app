<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navb.ar navbar-expand-lg navbar-light bg-light" style="padding: 1rem">
        <div class="container-fluid">
            <a class="navbar-brand">Communication App</a>
        </div>
    </nav>
    <br>
    <div style="display: flex; align-items: center; flex-direction: column;">
        <div class="card" style="width: 50%;">
            <div class="card-body">
                <h4 class="card-title">Welcome to Users Module</h4>
                <hr><br />
                <div class="section">
                    <h6>Existing Users</h6>
                    <a class="card-link btn btn-primary" href="../user/login/login.php">Login</a>
                </div>
                <br />
                <div class="section">
                    <h6>New Users</h6>
                    <a class="card-link btn btn-primary" href="../user/register/register.php">Register</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>