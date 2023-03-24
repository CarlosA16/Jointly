<?php
session_start();
// DB connection
include 'db_conn.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['mail'];
    $password = $_POST['pass'];

    $query = "SELECT email, password FROM users WHERE email = $1";
    $result = pg_query_params($dbconn, $query, array($email));

    $row = pg_fetch_assoc($result);

    $hashed_password = $row['password'];
    
    // Test db credentials to form
    if(strval($row['email']) == strval($email)){
        if(password_verify($password, $hashed_password) == TRUE){
            header('location:feed.php');
        } else {
            echo 'Password incorrect';
        }
    } else {
        echo "Email not found";
    }
    
}
// flash message
if(isset($_SESSION["flash"])){
    $message = vprintf("<p class='flash %s'>%s</p>", $_SESSION["flash"]);
    unset($_SESSION["flash"]);
}

pg_close($dbconn);


?>