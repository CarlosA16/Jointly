<?php
// DB connection
$dbconn = pg_connect("host=localhost dbname=Jointly user=postgres password=16142003Da.")
or die('Could not connect: ' . pg_last_error());
?>