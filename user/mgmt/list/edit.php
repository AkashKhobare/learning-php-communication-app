<div>
    <?php
    include ("../mgmt.php");
    include ("../../../db/db.php");

    $user_id = $_GET['user_id'];

    $db = new DBConnection();
    $db_conn = $db->getDBConnection();

    $query = "SELECT * FROM user WHERE id = '$user_id'";
    $res = $db_conn->query($query);

    $user_data = [];
    $index = 0;
    if ($res->rowCount() > 0) {
        $row = $res->fetch();
        
        $user_data['email'] = $row['email'];
        $user_data['username'] = $row['username'];
    }
    ?>
    <br>
    <div style="display: flex; align-items: center; flex-direction: column;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <div class="section">
                    <h5>Edit User</h5>
                    <hr>
                </div>
                <div class="section">
                    <form action="controller/edit.php?user_id=<?php echo $_GET['user_id']?>" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?php echo $user_data['username']?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php echo $user_data['email']?>">
                        </div>
                        <div class="mb-3 btn-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
