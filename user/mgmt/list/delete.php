<div>
    <?php
        include ("../mgmt.php");
    ?>
    <br>
    <div style="display: flex; align-items: center; flex-direction: column;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <div class="section">
                    <h5>Delete User</h5>
                    <hr>
                </div>
                <div class="section">
                    <form action="controller/delete.php?user_id=<?php echo $_GET['user_id']?>" method="post">
                        <div class="mb-3 btn-right">
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
