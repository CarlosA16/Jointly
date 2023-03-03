<?php
// DB connection
$dbconn = pg_connect("host=localhost dbname=capstone user=aaronwork password=gamecube")
or die('Could not connect: ' . pg_last_error());



// Handle form submit
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $values = array($firstName, $lastName, $email, $password);

    $query = "INSERT INTO users (first_name, last_name, email, password)
VALUES ($1, $2, $3, $4)";

    $insert_query = pg_query_params($dbconn, $query, $values);

    if(!$insert_query){
        echo pg_last_error($dbconn);
    }
}

pg_close($dbconn);
?>