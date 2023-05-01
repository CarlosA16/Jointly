<?php
session_start();
include 'db_conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $image_data = file_get_contents($_FILES['fileToUpload']['tmp_name']);

    // Convert the image data to bytea format
    $image_bytea = pg_escape_bytea($dbconn, $image_data);

    $query = "UPDATE users SET profile_image = $1 WHERE username = $2";
    $stmt = pg_prepare($dbconn, "update_query", $query);

    if ($stmt) {
        $result = pg_execute($dbconn, "update_query", array($image_bytea, $_SESSION['active_user']));

        if (!$result) {
            echo "Error executing query: " . pg_last_error($dbconn);
        }
    } else {
        echo "Error preparing query: " . pg_last_error($dbconn);
    }
}
header('location:user.php?user='.$_SESSION["active_user"]);

pg_close($dbconn);


?>