<?php
// DB connection
include 'db_conn.php';
echo 'updated.';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['mail'];
    $password = $_POST['pass'];

    $query = "SELECT email, password FROM users WHERE email = $1";
    $result = pg_query_params($dbconn, $query, array($email));

    $row = pg_fetch_assoc($result);

    // Test db pass to form
    if(strval($row['password']) == strval($password)){
        header("Location: /Capstone_Project/Jointly/feed.php");
    } else {
        echo 'Login failed.';
    }
}

pg_close($dbconn);


?>