<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>sign-up</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='register.css'>
</head>
<body>
    <div id="log_box">
        <h2 class="header">SIGN-UP</h2>
        <form>
            <label for="pass">Email:</label><br>
            <input type="email" id="mail" name="mail"><br><br>
            <label for="pass">Password:</label><br>
            <input type="password" id="pass" name="pass"><br><br>
            <input type="submit" value="Submit"><br><br>
            <a href="login.php">already have an account?</a>
    <head>
        <title></title>
    </head>
    <body>
    <?php include 'register_submit.php' ?>
        <form action="register.php" method="POST">
            <label for="userName">Username: </label>
            <input name="userName" type="text">
            <label for="firstName">First Name: </label>
            <input name="firstName" type="text">
            <label for="lastName">Last Name: </label>
            <input name="lastName" type="text">
            <label for="email">E-mail: </label>
            <input name="email" type="email">
            <label for="password">Password: </label>
            <input name="password" type="password">
            <button type="submit">Submit</button>
        </form>
    </body>
</html>