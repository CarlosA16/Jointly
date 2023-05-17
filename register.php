<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>sign-up</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='register.css'>
</head>
<body>
    <?php include 'register_submit.php' ?>
    <form action="register.php" method="POST">
        <div class="form">
        <div class="title">Welcome</div>
        <div class="subtitle">Let's create your account!</div>
        <div class="input-container ic1">
            <input id="firstname" name="firstName" class="input" type="text" />
            <div class="cut"></div>
            <label for="firstname" class="placeholder">First name</label>
        </div>
        <div class="input-container ic1">
            <input id="lastname" name="lastName" class="input" type="text"/>
            <div class="cut"></div>
            <label for="lastname" class="placeholder">Last name</label>
        </div>
        <div class="input-container ic2">
            <input id="username" name="userName" class="input" type="text" />
            <div class="cut"></div>
            <label for="username" class="placeholder">Username</label>
        </div>
        <div class="input-container ic2">
            <input id="email" name="email" class="input" type="text" />
            <div class="cut cut-short"></div>
            <label for="email" class="placeholder">Email</>
        </div>
        <div class="input-container ic2">
            <input id="password" name="password" class="input" type="password" />
            <div class="cut"></div>
            <label for="password" class="placeholder">Password</>
        </div>
        <button type="text" class="submit">Submit</button>
        </div>
    </form>
    
    <!-- <div id="log_box">
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
    </div> -->
</body>
</html>