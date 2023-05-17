<?php
session_start();
include 'db_conn.php';


if (isset($_GET['user']) && $_GET['user'] !== '') {
    if(isset($_SESSION["active_user"]) && $_SESSION["active_user"] == $_GET['user']){
        $username = $_SESSION['active_user'];
    } else {
        $username = $_GET['user'];
    }
} else {
    $username = $_SESSION['active_user'];
}

// $username = $_GET['user'];

$query = "SELECT profile_image FROM users WHERE username = $1";
// $query = "SELECT profile_image FROM users WHERE username = $1";
$result = pg_query_params($dbconn, $query, array($username));


if ($result) {
    $image_bytea = pg_fetch_result($result, 0, 'profile_image');

    // Convert the bytea data to a string
    $image_string = pg_unescape_bytea($image_bytea);

    echo $image_string;
} else {
    echo "Error executing query: " . pg_last_error($dbconn);
}

pg_close($dbconn);
?>