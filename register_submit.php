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
    $str = array($firstName,$lastName,$email,$password);
    print_r($str);

    
}

pg_close($dbconn);
?>