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
            <button>Logout</button>
        </div>
    </div>
    <div id="body">
        <div id="profile">
            <h2><u>Profile Picture:</u></h2>
            <img style="height: 500px;" src="IMG_1516.jpg">
            <button>Update Picture</button>
        </div>
        <div id="posts">
            <h2><u>Posts</u></h2>
            <div id="posted">
                <img src="IMG_1516.jpg">
                <img src="IMG_1516.jpg">
                <img src="IMG_1516.jpg">
            </div>
            <div id="posted">
                <img src="IMG_1516.jpg">
                <img src="IMG_1516.jpg">
                <img src="IMG_1516.jpg">
            </div>
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
</body>
</html>