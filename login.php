<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='login.css'> -->
</head>
<body>
    <?php include 'login_submit.php' ?>
    <div id="log_box">
        <h2 class="header">LOGIN</h2>
        <form action="login.php" method="POST">
            <label for="mail">Email:</label><br>
            <input type="email" id="mail" name="mail"><br><br>
            <label for="pass">Password:</label><br>
            <input type="password" id="pass" name="pass"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>