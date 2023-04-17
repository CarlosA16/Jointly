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
    if(isset($_GET['like'])){
        $i = $_GET['like'];
        $query = "UPDATE upload SET likes = likes+1 WHERE image = '$i'";
        pg_query($dbconn,$query);
        header("Refresh:0; url=feed.php");
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
            <h1 style="margin-right:25px;">Trending</h1>
            <a href="feed.php">Thaddeus Stevens College</a>
            <a href="feed.php">Lancaster, Pennsylvania</a>
            <a href="feed.php">Easter 2023</a>
            <a href="feed.php">Prom 2023</a>
            <a href="feed.php">Graduation</a>
            <a href="feed.php">Graduation Ceremony</a>
            <a href="feed.php">Class of 2023</a>
            <a href="feed.php">Funny Memes</a>
            <a href="feed.php">Jobs Near Me</a>
            <a href="feed.php">SGA President</a>
            <a href="feed.php">Dorm Life</a>
            <a href="feed.php">Jointly</a>
            <a href="feed.php">Carlos Almanzar</a>
            <a href="feed.php">Zach Deal</a>
            <a href="feed.php">Justice Kipp</a>
            <a href="feed.php">Aaron Work</a>
            <a href="feed.php">Computer Software Engineer</a>
            <a href="feed.php">Donald Trump</a>
            <a href="feed.php">Joe Biden</a>
            <a href="feed.php">Economic Crisis</a>
            <a href="feed.php">Russia</a>
            <a href="feed.php">Ukrane</a>
            <a href="feed.php">China</a>
            <a href="feed.php">Covid-19</a>
            <a href="feed.php">Elon Musk</a>
            <a href="feed.php">Twitter</a>
            <a href="feed.php">Tesla</a>
            <a href="feed.php">Art</a>
            <a href="feed.php">Music</a>
            <a href="feed.php">Travel</a>
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
                                <a href="feed.php?like='.$image[$i].'"><img style="width:30px;height:30px;" src="https://cdn-icons-png.flaticon.com/512/25/25297.png"></a>
                                <p id="likecount">'.$likes[$i].'</p>
                                <p id="count">likes</p>
                                <img style="width:35px;height:37px;margin-left:35px;margin-top:-2px" src="https://static.thenounproject.com/png/1314304-200.png">
                                <p id="commentcount">'.$comments[$i].'</p>
                                <p id="count">comments</p>
                                <img style="width:30px;height:30px;margin-left:35px;margin-top:3px" src="https://www.pngkey.com/png/full/147-1475657_share-png-share-icon-png.png">
                                <p id="sharecount">'.$shares[$i].'</p>
                                <p id="count">shares</p>
                            </div>
                            <p id="desc">'.$desc[$i].'</p>
                        </div>';
                }
            ?>
        </div>
        <div id="stories">
            <h1>Stories</h1>
            <a href="feed.php">Top Joinees</a>
            <a href='user.php'><img src="https://cdn-icons-png.flaticon.com/512/39/39475.png"></a>
            <a href='user.php'><img src="https://cdn-icons-png.flaticon.com/512/39/39475.png"></a>
            <a href='user.php'><img src="https://cdn-icons-png.flaticon.com/512/39/39475.png"></a>
            <a href="feed.php">Top Influencers</a>
            <a href='user.php'><img src="https://cdn-icons-png.flaticon.com/512/39/39475.png"></a>
            <a href='user.php'><img src="https://cdn-icons-png.flaticon.com/512/39/39475.png"></a>
            <a href='user.php'><img src="https://cdn-icons-png.flaticon.com/512/39/39475.png"></a>
            <a href="feed.php">Most Recent</a>
            <a href='user.php'><img src="https://cdn-icons-png.flaticon.com/512/39/39475.png"></a>
            <a href='user.php'><img src="https://cdn-icons-png.flaticon.com/512/39/39475.png"></a>
            <a href='user.php'><img src="https://cdn-icons-png.flaticon.com/512/39/39475.png"></a>
            <a href="feed.php">See All...</a>
        </div>
   </div>
</body>
</html>