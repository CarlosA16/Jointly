<?php
    session_start();
    include 'db_conn.php';
    $image=[];
    if(isset($_GET['search'])){
        $searching = $_GET['search'];
        $query = "SELECT * FROM upload WHERE description LIKE '%$searching%' OR username LIKE '%$searching%' OR linktopost LIKE '%$searching%'";
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
        $query = "SELECT * FROM comments WHERE postid LIKE '%$searching%'";
        $result=pg_query($dbconn,$query);
        while ($row = pg_fetch_row($result)){
            $postid[] = $row[0];
            $userwhocommented[] = $row[1];
            $theircomment[] = $row[2];
        }
    }
    $query = "Select * From likes WHERE userwholiked LIKE '".$_SESSION['active_user']."'";
    $result=pg_query($dbconn,$query);
    while ($row = pg_fetch_row($result)) {
        $lpost[] = $row[0];
    }
    if(isset($_GET['like'])){
        if(in_array($link[$_GET["like"]],$lpost)=='1'){
            $i = $_GET["like"];
            $query = "UPDATE upload SET likes = likes-1 WHERE image = '$image[$i]'";
            pg_query($dbconn,$query);
            $query = "DELETE FROM likes WHERE postid = '$link[$i]' AND userwholiked = '".$_SESSION['active_user']."'";
            pg_query($dbconn,$query);
            echo '<script>alert("Post Disliked!")</script>';
            header('Refresh:0; url=feed.php');
        }
        else{
            $i = $_GET['like'];
            $query = "UPDATE upload SET likes = likes+1 WHERE image = '$image[$i]'";
            pg_query($dbconn,$query);
            $query = "INSERT INTO likes (postid,userwholiked) values($1,$2)";
            pg_query_params($dbconn,$query, array($link[$i],$_SESSION["active_user"]));
            header('Refresh:0; url=search.php?search='.$searching.'&postLiked='.$image[$i].'');
        }
    }
    if(isset($_GET['sharing'])){
        echo '<script>alert("Copy this link and share it with your friends: search.php?search='.$searching.'")</script>';
        $query = "SELECT * FROM shares WHERE userwhoshared LIKE '".$_SESSION["active_user"]."'";
        $result=pg_query($dbconn,$query);
        $userwhoshared = [];
        while ($row = pg_fetch_row($result)){
            $spostid[] = $row[0];
            $userwhoshared[] = $row[1];
        }
        if(count($userwhoshared)==0 || !in_array($searching,$spostid)){
            $query = "INSERT INTO shares (postid,userwhoshared) values($1,$2)";
            pg_query_params($dbconn,$query, array($searching,$_SESSION["active_user"]));
            $query = "UPDATE upload SET shares = shares+1 WHERE linktopost = '$searching'";
            pg_query($dbconn,$query);
            header('Refresh:0; url=search.php?search='.$searching.'');
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
                    if(in_array($link[$i],$lpost)=='1'){
                        $likeLink = 'https://www.pngplay.com/wp-content/uploads/7/Heart-Symbol-Transparent-PNG.png';
                    }
                    else{
                        $likeLink = 'https://www.svgrepo.com/show/155235/heart-outline.svg';
                    }
                    if(isset($_GET['postLiked'])){
                        if($likeLink == 'https://www.svgrepo.com/show/155235/heart-outline.svg'){
                            $likeLink = 'https://www.pngplay.com/wp-content/uploads/7/Heart-Symbol-Transparent-PNG.png';
                            $liked = '&postLiked='.count($image)-1;
                        }
                        else{
                            $likeLink = 'https://www.pngplay.com/wp-content/uploads/7/Heart-Symbol-Transparent-PNG.png';
                        }
                    }
                    echo '<div id="post">
                            <div id="postHeader">
                                <img src="get_user_image.php?user='.$user[$i].'">
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
                                <a href = "search.php?search='.$link[$i].'&sharing=true"><img style="width:30px;height:30px;margin-left:35px;margin-top:3px" src="https://www.pngkey.com/png/full/147-1475657_share-png-share-icon-png.png"></a>
                                <p id="sharecount">'.$shares[$i].'</p>
                                <p id="count">shares</p>
                            </div>
                            <p id="desc">'.$desc[$i].'</p>
                        </div>';
                    echo '<div id="comments">
                            <form action="search.php" method="GET" style="margin-top: 24px;">
                                <label>Leave A Comment:</label>
                                <input id="search" name="search" type="text" hidden="hidden" value="'.$link[$i].'">
                                <input id="commenting" name="commenting" type="text">
                                <input type="submit">
                            </form><br>';
                    if(isset($_GET['commenting'])){
                        $query = "INSERT INTO comments(postid,userwhocommented,theircomment) VALUES ($1,$2,$3)";
                        pg_query_params($dbconn, $query, array($link[$i],$_SESSION["active_user"],$_GET['commenting']));
                        $query = "UPDATE upload SET comments = comments+1 WHERE linktopost = '$link[$i]'";
                        pg_query($dbconn,$query);
                        header('Location: search.php?search='.$link[$i]);
                    }
                    if(isset($postid)){
                        for($k=0;$k<count($postid);$k++){
                            echo '<a href="user.php?user='.$userwhocommented[$k].'">'.$userwhocommented[$k].'</a>: '.$theircomment[$k];
                            echo '<br>';
                        }
                    }
                }
            ?>
        </div>
   </div>
</body>
</html>