<?php
// DB connection
include 'db_conn.php';



// Handle form submit
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $values = array($userName, $firstName, $lastName, $email, $password);

    $query = "INSERT INTO users (username, first_name, last_name, email, password)
VALUES ($1, $2, $3, $4, $5)";

    $insert_query = pg_query_params($dbconn, $query, $values);

    if(!$insert_query){
        echo pg_last_error($dbconn);
    }
}

pg_close($dbconn);
?>