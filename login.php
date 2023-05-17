<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='register.css'>
</head>
<body>
    <?php include 'login_submit.php' ?>
    <form action="login.php" method="POST">
        <div class="form">
        <div class="title">Login</div>
        
        <div class="input-container ic2">
            <input id="email" name="mail" class="input" type="text" />
            <div class="cut cut-short"></div>
            <label for="email" class="placeholder">Email</>
        </div>
        <div class="input-container ic2">
            <input id="password" name="pass" class="input" type="password" />
            <div class="cut"></div>
            <label for="password" class="placeholder">Password</>
        </div>
        <button type="text" class="submit">Submit</button>
        </div>
    </form>
    <!-- <div id="log_box">
        <h2 class="header">LOGIN</h2>
        <form action="login.php" method="POST">
            <label for="mail">Email:</label><br>
            <input type="email" id="mail" name="mail"><br><br>
            <label for="pass">Password:</label><br>
            <input type="password" id="pass" name="pass"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div> -->
</body>
</html>