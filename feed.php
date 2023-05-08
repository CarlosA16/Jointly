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
        $link[] = $row[4];
        $desc[] = $row[5];
        $likes[] = $row[6];
        $comments[] = $row[7];
        $shares[] = $row[8];
    }
    if(isset($_GET['like'])){
        if(isset($_GET['unl'])){
            $u = $_SESSION['active_user'];
            $i = $_GET["like"];
            $query = "UPDATE upload SET likes = likes-1 WHERE image = '$image[$i]'";
            pg_query($dbconn,$query);
            $query = "DELETE FROM likes WHERE postid = '$link[$i]' AND userwholiked = '$u'";
            pg_query($dbconn,$query);
            echo '<script>alert("Post Disliked!")</script>';
        }
        else{
            $i = $_GET['like'];
            $query = "UPDATE upload SET likes = likes+1 WHERE image = '$image[$i]'";
            pg_query($dbconn,$query);
            $query = "INSERT INTO likes (postid,userwholiked) values($1,$2)";
            pg_query_params($dbconn,$query, array($link[$i],$_SESSION["active_user"],));
        }
        header('Refresh:0; url=feed.php');
    }
    $userswholiked=[];
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
            <a href='user.php?user=<?php echo $_SESSION["active_user"]; ?>'><img style="width:50px; height:50px;margin-left:-40px;margin-right:100px;margin-top:15px;" src="https://cdn-icons-png.flaticon.com/512/39/39475.png"></a>
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
    <div id="layout">
        <div id="trending">
            <h1 style="margin-right:25px;">Trending</h1>
            <a href="search.php?search=Thaddeus">Thaddeus Stevens College</a>
            <a href="search.php?search=Lancaster">Lancaster, Pennsylvania</a>
            <a href="search.php?search=Easter">Easter 2023</a>
            <a href="search.php?search=Prom">Prom 2023</a>
            <a href="search.php?search=Graduation">Graduation</a>
            <a href="search.php?search=Ceremony">Graduation Ceremony</a>
            <a href="search.php?search=Class">Class of 2023</a>
            <a href="search.php?search=Memes">Funny Memes</a>
            <a href="search.php?search=Jobs">Jobs Near Me</a>
            <a href="search.php?search=SGA">SGA President</a>
            <a href="search.php?search=Dorm">Dorm Life</a>
            <a href="search.php?search=Jointly">Jointly</a>
            <a href="search.php?search=Carlos Almanzar">Carlos Almanzar</a>
            <a href="search.php?search=Zach Deal">Zach Deal</a>
            <a href="search.php?search=Justice Kipp">Justice Kipp</a>
            <a href="search.php?search=Aaron Work">Aaron Work</a>
            <a href="search.php?search=Software Engineer">Computer Software Engineer</a>
            <a href="search.php?search=Trump">Donald Trump</a>
            <a href="search.php?search=Biden">Joe Biden</a>
            <a href="search.php?search=Crisis">Economic Crisis</a>
            <a href="search.php?search=Russia">Russia</a>
            <a href="search.php?search=Ukrane">Ukrane</a>
            <a href="search.php?search=China">China</a>
            <a href="search.php?search=Covid">Covid-19</a>
            <a href="search.php?search=Elon">Elon Musk</a>
            <a href="search.php?search=Twitter">Twitter</a>
            <a href="search.php?search=Tesla">Tesla</a>
            <a href="search.php?search=Art">Art</a>
            <a href="search.php?search=Music">Music</a>
            <a href="search.php?search=Travel">Travel</a>
        </div>
        <div id="feed">
            <?php
                for($i=count($image)-1;$i>=0;$i--){
                    $liked = '';
                    $query = "Select * From likes Where postid = '$link[$i]'";
                    $result=pg_query($dbconn,$query);
                    while ($row = pg_fetch_row($result)) {
                        $postid[] = $row[0];
                        $userswholiked[] = $row[1];
                    }
                    if(count($userswholiked)>0){
                        if(in_array($_SESSION['active_user'], $userswholiked) && in_array($link[$i], $postid)){
                            $likeLink = 'https://www.pngplay.com/wp-content/uploads/7/Heart-Symbol-Transparent-PNG.png';
                            $liked = '&unl=t';
                        }
                        else{
                            $likeLink = 'https://www.svgrepo.com/show/155235/heart-outline.svg';
                        }
                    }
                    else{
                        $likeLink = 'https://www.svgrepo.com/show/155235/heart-outline.svg';
                    }
                    echo '<div id="post">
                            <div id="postHeader">
                                <img src="https://cdn-icons-png.flaticon.com/512/39/39475.png">
                                <a href="user.php?user='.$user[$i].'"><p id="userName">'.$user[$i].'</p></a>
                                <p id="udate">'.$date[$i].'</p>
                            </div>
                            <img style="margin-top: 4px;margin-bottom: 4px;" src="'.$image[$i].'">
                            <div id="likes">
                                <a href="feed.php?like='.$i.$liked.'"><img style="width:30px;height:30px;" src="'.$likeLink.'"></a>
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