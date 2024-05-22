<div>
    <?php
    include ("../mgmt.php");
    include ("../../../db/db.php");

    $user_email = $_SESSION['email'];

    @$msg = $_GET['message'];
    if ($msg) {
        send_message($msg);
    }

    function send_message($message)
    {
        $user_email = $_SESSION['email'];
        $db = new DBConnection();
        $db_conn = $db->getDBConnection();

        $query = "INSERT INTO chat (message, user_email) VALUES (:message, :user_email)";
        $stmt = $db_conn->prepare($query);
        $stmt->execute([':message' => $message, ':user_email' => $user_email]);

        header("Location: chat.php");
    }

    $db = new DBConnection();
    $db_conn = $db->getDBConnection();

    $query = "SELECT * FROM chat";
    $res = $db_conn->query($query);

    $chat_messages = [];
    $index = 0;
    if ($res->rowCount() > 0) {
        while ($row = $res->fetch()) {
            $message = $row['message'];
            $sent_time = $row['sent_time'];
            $user_email = $row['user_email'];

            $chat_messages[$index++] = [
                'message' => $message,
                'sent_time' => $sent_time,
                'user_email' => $user_email
            ];
        }
    }
    ?>
    <br>
    <div style="display: flex; align-items: center; flex-direction: column;">
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <div class="section">
                    <h5>Chat</h5>
                    <hr>
                    <div style="min-height: 5rem;">
                        <?php
                        foreach ($chat_messages as $chat) {
                            echo "<p>" . $chat['sent_time'] . " <b>" . $chat['user_email'] . ":</b> " . $chat['message'] . "</p>";
                        }
                        ?>
                    </div>
                    <hr>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Type message..." aria-label="Send" va
                            aria-describedby="send" id="message">
                        <button class="btn btn-outline-secondary" type="button" id="send"
                            onclick="send();">Send</button>
                        <button class="btn btn-outline-secondary" type="button" id="refresh"
                            onclick="refresh();">Refresh</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function send() {
        document.location.href = "chat.php?message=" + document.getElementById('message').value;
    }

    function refresh() {
        document.location.href = "chat.php";
    }
</script>