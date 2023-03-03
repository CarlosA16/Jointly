<html>
    <head>
        <title></title>
    </head>
    <body>
    <?php include 'register_submit.php' ?>
        <form action="register.php" method="POST">
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