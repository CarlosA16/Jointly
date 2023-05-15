<?php
session_start();
include 'db_conn.php';

$query = "SELECT profile_image FROM users WHERE username = $1";
$result = pg_query_params($dbconn, $query, array($_SESSION['active_user']));

if ($result) {
    $image_bytea = pg_fetch_result($result, 0, 'profile_image');
    
    // Convert the bytea data to a string
    $image_string = pg_unescape_bytea($image_bytea);

    $img_type = image_type_to_mime_type($image_string);
    
    header('Content-Type: '. $img_type);

    
    echo $image_string;
} else {

    echo "Error executing query: " . pg_last_error($dbconn);
}

pg_close($dbconn);
?>
