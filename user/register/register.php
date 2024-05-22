<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navb.ar navbar-expand-lg navbar-light bg-light" style="padding: 1rem">
        <div class="container-fluid">
            <a class="navbar-brand">Communication App</a>
        </div>
    </nav>
    <br>
    <div style="display: flex; align-items: center; flex-direction: column;">
        <div class="card" style="width: 40%;">
            <div class="card-body">
                <h4 class="card-title">Register</h4>
                <hr><br />
                <div class="section">
                    <form action="controller_register_user.php" method="post">
                        <div class="mb-3">
                            <label for="UserName" class="form-label">Username</label>
                            <input type="text" class="form-control" id="UserName" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="Email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="ConfirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="ConfirmPassword" name="confirmPassword">
                        </div>
                        <div class="mb-3 btn-right">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>