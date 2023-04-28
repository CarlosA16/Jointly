<?php
    session_start();
    include 'db_conn.php';
    $image=[];
    if(isset($_GET['search'])){
        $searching = $_GET['search'];
        $query = "SELECT * FROM upload WHERE description LIKE '%$searching%' OR username LIKE '%$searching%'";
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
    }
    if(isset($_GET['like'])){
        if(isset($_GET['postLiked'])){
            $i = $_GET["like"];
            $query = "UPDATE upload SET likes = likes-1 WHERE image = '$image[$i]'";
            pg_query($dbconn,$query);
            echo '<script>alert("Post Disliked!")</script>';
            header('Refresh:0; url=feed.php');
        }
        else{
            $i = $_GET['like'];
            $query = "UPDATE upload SET likes = likes+1 WHERE image = '$image[$i]'";
            pg_query($dbconn,$query);
            header('Refresh:0; url=search.php?search='.$searching.'&postLiked='.$image[$i].'');
        }
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
    <div id="layout" style="margin-top: 0px;">
        <div id="feed">
            <div style="display:flex; flex-direction:row; gap: 20px;">
                <h2>Search: </h2>
                <form action="search.php" method="GET" style="margin-top: 24px;">
                    <input id="search" name="search" type="text">
                    <input type="submit">
                </form>
            </div>
            
            <?php
                for($i=count($image)-1;$i>=0;$i--){
                    $liked = '';
                    if(isset($_GET['postLiked'])){
                        if($_GET['postLiked']==$image[count($image)-1] && $i==count($image)-1){
                            $likeLink = 'https://www.pngplay.com/wp-content/uploads/7/Heart-Symbol-Transparent-PNG.png';
                            $liked = '&postLiked='.count($image)-1;
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
                                <p id="userName">'.$user[$i].'</p>
                                <p id="udate">'.$date[$i].'</p>
                            </div>
                            <img style="margin-top: 4px;margin-bottom: 4px;" src="'.$image[$i].'">
                            <div id="likes">
                                <a href="search.php?search='.$searching.'&like='.$i.$liked.'"><img style="width:30px;height:30px;" src="'.$likeLink.'"></a>
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
   </div>
</body>
</html>