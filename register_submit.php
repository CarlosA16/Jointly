<?php
session_start();
// DB connection
include 'db_conn.php';



// Handle form submit
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $profile_img = null;

    $password = crypt($password);
    $values = array($userName, $firstName, $lastName, $email, $password, $profile_img);

    $query = "INSERT INTO users (username, first_name, last_name, email, password, profile_image)
VALUES ($1, $2, $3, $4, $5, $6)";

    $insert_query = pg_query_params($dbconn, $query, $values);

    if(!$insert_query){
        echo pg_last_error($dbconn);
    }
    
    $_SESSION["flash"] = ["type" => "success", "message" => "Account created!"];
    header("Location: ./login.php");
    die();
}

pg_close($dbconn);
?>