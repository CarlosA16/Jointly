<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>sign-up</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='register.css'>
</head>
<body>
    <?php include 'register_submit.php' ?>
    <div id="log_box">
        <h2 class="header">SIGN-UP</h2>
    
        <form action="register.php" method="POST">
            <label for="userName">Username: </label>
            <input name="userName" type="text" required>
            <label for="firstName">First Name: </label>
            <input name="firstName" type="text" required>
            <label for="lastName">Last Name: </label>
            <input name="lastName" type="text" required>
            <label for="email">E-mail: </label>
            <input name="email" type="email" required>
            <label for="password">Password: </label>
            <input name="password" type="password" required>
            <button type="submit">Submit</button>
            <a href="login.php">already have an account?</a>
        </form>
    </div>
</body>
</html>