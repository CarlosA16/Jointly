<?php
session_start();
// DB connection
include 'db_conn.php';

// flash message
if(isset($_SESSION["flash"])){
    $message = vprintf("<p style='position: absolute; top: 0;' class='flash %s'>%s</p>", $_SESSION["flash"]);
    unset($_SESSION["flash"]);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['mail'];
    $password = $_POST['pass'];

    $query = "SELECT email, password, username FROM users WHERE email = $1";
    $result = pg_query_params($dbconn, $query, array($email));

    $row = pg_fetch_assoc($result);

    $hashed_password = $row['password'];
    
    // Test db credentials to form
    if(strval($row['email']) == strval($email)){
        if(password_verify($password, $hashed_password) == TRUE){
            $_SESSION["active_user"] = $row['username'];
            header("location:feed.php");
            exit();
        } else {
            $_SESSION["flash"] = ["type" => "error", "message" => "Password incorrect, please try again."];
        }
    } else {
        $_SESSION["flash"] = ["type" => "error", "message" => "Email not found."];
    }
    
}


pg_close($dbconn);


?>