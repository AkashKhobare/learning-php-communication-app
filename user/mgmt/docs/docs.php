<div>
    <?php
    include ("../mgmt.php");
    include ("../../../db/db.php");

    $user_email = $_SESSION['email'];

    $db = new DBConnection();
    $db_conn = $db->getDBConnection();

    $query = "SELECT * FROM uploads";
    $res = $db_conn->query($query);

    $curr_user_doc_list = [];
    $curr_user_index = 0;

    $shared_user_doc_list = [];
    $shared_user_index = 0;

    if ($res->rowCount() > 0) {
        while ($row = $res->fetch()) {
            $email = $row['user_email'];
            $label = $row['label'];
            $filename = $row['filename'];
            $upload_id = $row['upload_id'];

            if ($email == $user_email) {
                $curr_user_doc_list[$curr_user_index++] = [
                    'label' => $label,
                    'filename' => $filename,
                    'email' => $email,
                    'upload_id' => $upload_id
                ];
            } else {
                $shared_user_doc_list[$shared_user_index++] = [
                    'label' => $label,
                    'filename' => $filename,
                    'shared_by' => $email
                ];
            }
        }
    }
    ?>
    <br>
    <div style="display: flex; align-items: center; flex-direction: column;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <div class="section">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <h5>My Uploads</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addUploadModal">
                            Add Upload
                        </button>
                    </div>
                    <hr>
                    <table class="table" id="doc-list">
                        <thead>
                            <tr class="d-flex">
                                <th class="col-1" scope="col">#</th>
                                <th class="col-3" scope="col" data-field="label">Label</th>
                                <th class="col-4" scope="col" data-field="filename">Filename</th>
                                <th class="col-4" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($curr_user_doc_list as $curr_doc) {
                                echo "<tr class='d-flex'>";
                                echo "<th class='col-1' scope='row'>" . $index++ . "</th>";
                                echo "<td class='col-3'>" . $curr_doc['label'] . "</td>";
                                echo "<td class='col-4'>" . $curr_doc['filename'] . "</td>";
                                echo "<td class='col-4'>
                                        <button class='btn btn-secondary btn-sm'
                                            onclick=edit_doc('" . $curr_doc['upload_id'] . "');>Edit</button>
                                        <button class='btn btn-danger btn-sm'
                                            onclick=delete_doc('" . $curr_doc['upload_id'] . "');>Delete</button>
                                    </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="section">
                    <h5>Shared Uploads</h5>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-1" scope="col">#</th>
                                <th class="col-1" scope="col" data-field="label">Label</th>
                                <th class="col-1" scope="col" data-field="filename">Filename</th>
                                <th class="col-1" scope="col">Shared by</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($shared_user_doc_list as $shared_doc) {
                                echo "<tr>";
                                echo "<th class='col-1' scope='row'>" . $index++ . "</th>";
                                echo "<td class='col-3'>" . $shared_doc['label'] . "</td>";
                                echo "<td class='col-4'>" . $shared_doc['filename'] . "</td>";
                                echo "<td class='col-4'>" . $shared_doc['shared_by'] . "</td>";
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

<div class="modal fade" id="addUploadModal" tabindex="-1" aria-labelledby="addUploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUploadModalLabel">Upload Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="section">
                    <form action="controller/add.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="file_label" class="form-label">File Description</label>
                            <input type="text" class="form-control" id="file_label" name="file_label">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="file_to_be_uploaded" aria-label="Upload"
                                name="userfile">
                        </div>
                        <div class="mb-3 btn-right">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function edit_doc(id) {
        document.location.href = 'edit.php?doc_id=' + id;
    }

    function delete_doc(id) {
        document.location.href = 'delete.php?doc_id=' + id;
    }
</script>