<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="user.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jointly</title>
    
</head>
<body>
    <?php session_start(); include 'db_conn.php';?>
    <div id="header">
        <div id="main">
            <a href='user.php'><img style="width:50px; height:50px;margin-left:-40px;margin-right:100px;margin-top:15px;" src="https://cdn-icons-png.flaticon.com/512/39/39475.png"></a>
        </div>
        <div id="main">
            <button onclick="window.location.href = 'feed.php';">Home</button>
            <button onclick="window.location.href = 'feed.php';">Search</button>
            <button onclick="window.location.href = 'feed.php';">Explore</button>
            <h1>Jointly</h1>
            <button onclick="window.location.href = 'feed.php';">Notifications</button>
            <button onclick="window.location.href = 'message_home.php';">Messages</button>
            <button onclick="window.location.href = 'upload.php';">Upload</button>
        </div>
        <div id="main">
            <form action="logout.php" method="POST">
                <button name="logout_btn">Logout</button>
            </form>
        </div>
    </div>
    <?php require 'friend_request.php'; ?>
    <!-- if user != active user
        show send friend request form/button
    else
        hide/disable form/button

    when pressed, make db insert

    show accept/decline in notifications of toUser, update status -->
    <div id="body">
        <div id="profile">
            <h2><u>Profile Picture:</u></h2>
            <img id="output" style="height: 500px; width: 300px;" src="get_user_image.php?user=<?php echo $_GET['user']?>">
            <form id="myForm" action="img_save.php" method="POST" enctype="multipart/form-data">
                <input type="file" accept="image/jpeg, image/png, image/jpg" name="fileToUpload" onchange="loadFile(event)">
                <input type="submit"></input>
            </form>
            
        </div>
        <div id="posts">
        <?php
                $query = "SELECT * FROM upload WHERE username LIKE '".$_GET['user']."'";
                $result=pg_query($dbconn,$query);
                while ($row = pg_fetch_row($result)) {
                    $link[] = $row[4];
                    $image[] = $row[2];
                }
                if(isset($link)){
                    for($i=0;$i<count($link);$i++){
                        if($i!=0 && $i%3==0){
                            echo '<br>';
                        }
                        echo '<a href = "search.php?search='.$link[$i].'"><img src="'.$image[$i].'" style="width:150px;height:150px;"></a>';
                    }
                }

            ?>
        </div>
        <div id="Joins">
            <h2><u>Joiners & Joinees</u></h2>
            <div id="followers">
                <h3>781</h3>
                <h3>Joiners</h3>
            </div>
            <div id="followers" style="margin-left:-30px;">
                <img src="https://cdn-icons-png.flaticon.com/512/39/39475.png">
                <img src="https://cdn-icons-png.flaticon.com/512/39/39475.png">
                <img src="https://cdn-icons-png.flaticon.com/512/39/39475.png">
            </div>
            <u>See All Joiners</u>
            <br><br><br><br>
            <div id="followers">
                <h3>273</h3>
                <h3>Joinees</h3>
            </div>
            <div id="followers" style="margin-left:-30px;">
                <img src="https://cdn-icons-png.flaticon.com/512/39/39475.png">
                <img src="https://cdn-icons-png.flaticon.com/512/39/39475.png">
                <img src="https://cdn-icons-png.flaticon.com/512/39/39475.png">
            </div>
            <u>See All Joinees</u>
        </div>
    </div>
    <script>
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const user = urlParams.get('user');
        // create blob object to display (image) in output
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
        var user_requested = "<?php echo isset($_GET['user']) ? $_GET['user'] : ''; ?>";
        var user_active = "<?php echo $_SESSION['active_user']; ?>";

        var request_btn = document.getElementById('f_request')
        var status_input = document.getElementById('status')

        // hide/show profile picture form
        if(user_requested == user_active){
            document.getElementById("myForm").style.display = "block";
        } else if (user_requested !== "" && user_requested !== user_active) {
            document.getElementById("myForm").style.display = "none";
        } else if (user_requested == user_active && user_active == '') {
            document.getElementById("myForm").style.display = "none";
        }

        document.getElementById('f_request').addEventListener('click', function(event){
            if (!confirm('Send a friend request to ' + user + '?')) {
                event.preventDefault();
            }
        })
        
        if(status_input.value == 'P'){
            request_btn.innerHTML = 'Friend Request Sent &check;'
            request_btn.disabled = true
        }
        
    </script>
</body>
</html>