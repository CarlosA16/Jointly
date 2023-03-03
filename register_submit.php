<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $str = array($firstName,$lastName,$email,$password);
    print_r($str);
}
?>