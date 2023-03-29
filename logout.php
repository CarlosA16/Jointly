<?php
// prevent unlogged users from viewing feed
// session_start();

// if(empty($_SESSION['username'])){
//     $_SESSION["flash"] = ["type" => "warning", "message" => "Must be logged in."];
//     header("location:login.php");
//     exit();
// }

if(isset($_POST['logout_btn'])){
    session_unset();
    session_destroy();
    header("location:login.php");
    exit();
}
?>