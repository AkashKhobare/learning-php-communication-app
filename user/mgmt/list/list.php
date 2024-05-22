<div>
    <?php
    include ("../mgmt.php");
    include ("../../../db/db.php");

    $user_email = $_SESSION['email'];

    $db = new DBConnection();
    $db_conn = $db->getDBConnection();

    $query = "SELECT * FROM user WHERE email != '$user_email'";
    $res = $db_conn->query($query);

    $user_list = [];
    $index = 0;
    if ($res->rowCount() > 0) {
        while ($row = $res->fetch()) {
            $id = $row["id"];
            $email = $row['email'];
            $username = $row['username'];
            $user_list[$index++] = ['id' => $id, 'email' => $email, 'username' => $username];
        }
    }
    ?>
    <br>
    <div style="display: flex; align-items: center; flex-direction: column;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <div class="section">
                    <h5>Users</h5>
                    <hr>
                    <table class="table" id="user-list">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" data-field="name">Name</th>
                                <th scope="col" data-field="email">Email Id</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($user_list as $user) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $index++ . "</th>";
                                echo "<td style='display: none'>" . $user['id'] . "</td>";
                                echo "<td>" . $user['username'] . "</td>";
                                echo "<td>" . $user['email'] . "</td>";
                                echo "<td colspan='2'>
                                        <button class='btn btn-secondary'
                                            onclick=edit_user('".$user['id']."');>
                                            Edit
                                        </button>
                                        <button class='btn btn-danger'
                                            onclick=delete_user('".$user['id']."');>
                                            Delete
                                        </button>
                                    </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function edit_user(id) {
        document.location.href='edit.php?user_id=' + id;
    }

    function delete_user(id) {
        document.location.href='delete.php?user_id=' + id;
    }
</script>