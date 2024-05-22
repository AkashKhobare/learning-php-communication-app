<div>
    <?php
    include ("../mgmt.php");
    ?>
    <br>
    <div style="display: flex; align-items: center; flex-direction: column;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <div class="section">
                    <div class="section">
                        <h5>Login Successful</h5>
                        <hr>
                        <p><b>Welcome!</b> <?php echo $_SESSION['email'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>