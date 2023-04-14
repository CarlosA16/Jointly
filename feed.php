<?php
    session_start();
    include 'db_conn.php';
    $image=[];
    $query = "Select * From upload";
    $result=pg_query($dbconn,$query);
    while ($row = pg_fetch_row($result)) {
        $user[] = $row[1];
        $image[] = $row[2];
        $date[] = $row[3];
        $desc[] = $row[5];
        $likes[] = $row[6];
        $comments[] = $row[7];
        $shares[] = $row[8];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="feed.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jointly</title>
</head>
<body>
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
    <div id="layout">
        <div id="trending">
            <h1 style="margin-right:15px;">Trending</h1>
            <a href="feed.php" style="text-decoration : underline; color : white;margin-left:-25px;">Thaddeus Stevens College</a>
        </div>
        <div id="feed">
            <?php
                for($i=count($image)-1;$i>=0;$i--){
                    echo '<div id="post">
                            <div id="postHeader">
                                <img src="https://cdn-icons-png.flaticon.com/512/39/39475.png">
                                <p id="userName">'.$user[$i].'</p>
                                <p id="udate">'.$date[$i].'</p>
                            </div>
                            <img style="margin-top: 4px;margin-bottom: 4px;" src="'.$image[$i].'">
                            <div id="likes">
                                <img style="width:30px;height:30px;" src="https://cdn-icons-png.flaticon.com/512/25/25297.png">
                                <p id="count">'.$likes[$i].'</p>
                                <p id="count">likes</p>
                                <img style="width:35px;height:37px;margin-left:35px;margin-top:-2px" src="https://static.thenounproject.com/png/1314304-200.png">
                                <p id="count">'.$comments[$i].'</p>
                                <p id="count">comments</p>
                                <img style="width:30px;height:30px;margin-left:35px;margin-top:3px" src="https://www.pngkey.com/png/full/147-1475657_share-png-share-icon-png.png">
                                <p id="count">'.$shares[$i].'</p>
                                <p id="count">shares</p>
                            </div>
                            <p id="desc">'.$desc[$i].'</p>
                        </div>';
                }
            ?>
            
        </div>
        <div id="online">
            <h1>Stories</h1>
        </div>
   </div>
</body>
</html>