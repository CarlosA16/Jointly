<?php
// session_start();
// include 'db_conn.php';

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     // Retrieve the image data from the POST request
//     $image_data = file_get_contents($_FILES['fileToUpload']['tmp_name']);

//     // Convert the image data to bytea format
//     $image_bytea = pg_escape_bytea($image_data);

//     // Prepare the SQL INSERT statement
//     $query = "UPDATE users SET profile_image = $1 WHERE username = $2";
//     $stmt = pg_prepare($dbconn, "insert_query", $query);

//     // Execute the prepared statement
//     $result = pg_execute($dbconn, "insert_query", array($image_bytea, $_SESSION['active_user']));
// }
// pg_close($dbconn);
session_start();
include 'db_conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Retrieve the image data from the POST request
    $image_data = file_get_contents($_FILES['fileToUpload']['tmp_name']);

    // Convert the image data to bytea format
    $image_bytea = pg_escape_bytea($image_data);

    // Prepare the SQL UPDATE statement
    $query = "UPDATE users SET profile_image = $1 WHERE username = $2";
    $stmt = pg_prepare($dbconn, "update_query", $query);

    if ($stmt) {
        // Execute the prepared statement
        $result = pg_execute($dbconn, "update_query", array($image_bytea, $_SESSION['active_user']));

        if (!$result) {
            echo "Error executing query: " . pg_last_error($dbconn);
        }
    } else {
        echo "Error preparing query: " . pg_last_error($dbconn);
    }
}
header('location:user.php');

pg_close($dbconn);


?>