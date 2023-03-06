<?php
// DB connection
$dbconn = pg_connect("host=localhost dbname=capstone user=aaronwork password=gamecube")
or die('Could not connect: ' . pg_last_error());
?>