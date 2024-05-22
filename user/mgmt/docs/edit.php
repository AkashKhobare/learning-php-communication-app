<div>
    <?php
    include ("../mgmt.php");
    include ("../../../db/db.php");

    $doc_id = $_GET['doc_id'];

    $db = new DBConnection();
    $db_conn = $db->getDBConnection();

    $query = "SELECT * FROM uploads WHERE upload_id = '$doc_id'";
    $res = $db_conn->query($query);

    $doc_data = [];
    $index = 0;
    if ($res->rowCount() > 0) {
        $row = $res->fetch();
        $doc_data['label'] = $row['label'];
    }
    ?>
    <br>
    <div style="display: flex; align-items: center; flex-direction: column;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <div class="section">
                    <h5>Edit Document</h5>
                    <hr>
                </div>
                <div class="section">
                    <form action="controller/edit.php?doc_id=<?php echo $_GET['doc_id'] ?>" method="post">
                        <div class="mb-3">
                            <label for="file_label" class="form-label">File Label</label>
                            <input type="text" class="form-control" id="file_label" name="file_label"
                                value="<?php echo $doc_data['label'] ?>">
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