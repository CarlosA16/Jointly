<?php
    session_start();
    include 'db_conn.php';
    $pid[]=1;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>upload</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='upload.css'>
</head>
<body>
    <div id="header">
        <div id="main">
            <a href='user.php?user=<?php echo $_SESSION["active_user"]; ?>'><img style="width:50px; height:50px;margin-left:-40px;margin-right:100px;margin-top:15px;" src="https://cdn-icons-png.flaticon.com/512/39/39475.png"></a>
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
            <form method="POST">
                <button name="logout_btn">Logout</button>
            </form>
        </div>
    </div>
    <img id="defaultImg" src=<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(is_uploaded_file($_FILES["img"]["tmp_name"])){
            if(empty($_FILES['img']['name']))
            {
                echo "https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Square_-_black_simple.svg/800px-Square_-_black_simple.svg.png";
                exit;
            }else{
                $que = "SELECT * FROM upload WHERE username LIKE '".$_SESSION["active_user"]."'";
                $re=pg_query($dbconn,$que);
                while ($row = pg_fetch_row($re)) {
                    $pid[] = $row[0]+1;
                }
                move_uploaded_file($_FILES["img"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/images/".$_FILES["img"]["name"]);
                $location = "images/".$_FILES["img"]["name"];
                echo $location;
                $desc = $_POST["desc"];
                $query = "INSERT INTO upload(username,image,uploaddate,linktopost,description,likes,comments,shares) VALUES ($1,$2,$3,$4,$5,$6,$7,$8)";
                pg_query_params($dbconn, $query, array($_SESSION["active_user"],$location,date("m/d/Y"),$_SESSION["active_user"].'_PID_'.$pid[count($pid)-1],$desc,0,0,0));
            }
        }
    }
    else{
        echo "https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Square_-_black_simple.svg/800px-Square_-_black_simple.svg.png";
    }
    ?> style="width: 400px;">
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo '<p>'.$_POST["desc"].'</p>';
    }
    ?>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="img" style="margin-left:80px;">Select image:</label>
        <input type="file" id="img" name="img" accept="image/*">
        <h3>Add a Description</h3>
        <input type="text" id="desc" name="desc" style="width: 200px; Height: 20px;"><br><br>
        <input type="submit" value="POST" class="sub">
    </form>
</body>
</html>