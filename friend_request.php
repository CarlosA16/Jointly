<?php
include 'db_conn.php';

$showBtn = null;
if(isset($_GET['user'])){
    $userVar = $_GET['user'];
  } else {
    $userVar = '';
  }

$to_user = htmlspecialchars($_GET['user']);
$from_user = $_SESSION['active_user'];

$friend_check = "SELECT from_user, to_user, status FROM friends WHERE from_user = $1 AND to_user = $2";
$result = pg_query_params($dbconn, $friend_check, array($from_user, $to_user));

if ($_SESSION['active_user'] == $_GET['user'] || $_GET['user'] == '') {
    $showBtn = false;
} else {
    $showBtn = true;
    echo pg_num_rows($result);
    if(pg_num_rows($result) == 0) {
        echo '
            <form id="form_req" name="form_request" action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '?user='. $userVar . '" method="POST">
                <input type="hidden" name="user" value="' . htmlspecialchars($_GET['user']) .'">
                <input id="status" type="hidden" name="status" value="'.$status.'">
                <button id="f_request" type="submit">Send Friend Request</button>
            </form>
        ';
    } else {
    while($row = pg_fetch_assoc($result)){
        $status = $row['status'];
        echo ' Rows
            <form id="form_req" name="form_request" action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '?user='. $userVar . '" method="POST">
                <input type="hidden" name="user" value="' . htmlspecialchars($_GET['user']) .'">
                <input id="status" type="hidden" name="status" value="'.$status.'">
                <button id="f_request" type="submit">Send Friend Request</button>
            </form>
        ';
        }
    }
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['user'])){
        $query = "INSERT INTO friends (from_user, to_user, status)
        VALUES ($1, $2, $3)";

        $insert_request = pg_query_params($dbconn, $query, array($from_user, $to_user, 'P'));

        echo 'Friend Request Sent to ' . $_POST['user'];
        header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']) . "?user=" . $userVar);
        exit();
    }
}

?>