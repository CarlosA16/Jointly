<?php 
    session_start();
    include 'db_conn.php';
?>
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
    <div id="header">
        <div id="main">
            <a href='user.php?user=<?php echo $_SESSION["active_user"]; ?>'><img style="width:50px; height:50px;margin-left:-40px;margin-right:100px;margin-top:15px;" src="get_user_image.php?user=<?php echo $_SESSION['active_user']?>"></a>
        </div>
        <div id="main">
            <button onclick="window.location.href = 'feed.php';">Home</button>
            <button onclick="window.location.href = 'search.php';">Search</button>
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
    <div id="body">
        <div id="profile">
            <h2><u>Profile Picture:</u></h2>
            <img id="output" style="height: 300px; width: 300px;" src="get_user_image.php?user=<?php echo $_GET['user']?>">
            <?php 
                if(isset($_GET['user'])){
                    if($_SESSION["active_user"]==$_GET['user']){
                        echo '<form action="img_save.php" method="POST" enctype="multipart/form-data">
                                <input type="file" accept="image/jpeg, image/png, image/jpg" name="fileToUpload" onchange="loadFile(event)">
                                <input type="submit"></input>
                              </form>';
                    }
                }
            ?>
            
        </div>
        <div id="posts">
            <h2><u>Posts</u></h2>
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
        // create blob object to display (image) in output
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
        var user_requested = "<?php echo isset($_GET['user']) ? $_GET['user'] : ''; ?>";
        var user_active = "<?php echo $_SESSION['active_user']; ?>";
        
        if(user_requested == user_active){
            document.getElementById("myForm").style.display = "block";
        } else if (user_requested !== "" && user_requested !== user_active) {
            document.getElementById("myForm").style.display = "none";
        } else if (user_requested == user_active && user_active == '') {
            document.getElementById("myForm").style.display = "none";
        }

    </script>
</body>
</html>