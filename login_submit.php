<?php
// DB connection
include 'db_conn.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['mail'];
    $password = $_POST['pass'];

    $query = "SELECT email, password FROM users WHERE email = $1";
    $result = pg_query_params($dbconn, $query, array($email));

    $row = pg_fetch_assoc($result);

    // Test db credentials to form
    if(strval($row['email']) == strval($email)){
        if(strval($row['password']) == strval($password)){
            header('location:feed.php');
        } else {
            echo 'Password incorrect';
        }
    } else {
        echo "Email not found";
    }
    
}

pg_close($dbconn);


?>