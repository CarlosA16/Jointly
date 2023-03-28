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
            <img style="width:50px; height:50px;margin-left:-40px;margin-right:100px;margin-top:15px;" src="https://cdn-icons-png.flaticon.com/512/39/39475.png">
        </div>
        <div id="main">
            <button>Home</button>
            <button>Search</button>
            <button>Explore</button>
            <h1>Jointly</h1>
            <button>Notifications</button>
            <button>Messages</button>
            <button>Upload</button>
        </div>
        <div id="main">
            <form method="POST">
                <button name="logout_btn">Logout</button>
            </form>
        </div>
    </div>
    <img id="defaultImg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Square_-_black_simple.svg/800px-Square_-_black_simple.svg.png" style="width: 400px;">
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="img" style="margin-left:80px;">Select image:</label>
        <input type="file" id="img" name="img" accept="image/*">
        <h3>Add a Description</h3>
        <input type="text" id="desc" name="desc" style="width: 200px; Height: 20px;"><br><br>
        <input type="submit" value="POST" class="sub">
    </form>
</body>
</html>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(is_uploaded_file($_FILES["img"]["tmp_name"])){
        if(empty($_FILES['img']['name']))
  	    {
            echo " File name is empty! ";
            exit;
        }
        $upload_file_name = $_FILES['my_upload']['name'];
        $dest=__DIR__.'/uploads/'.$upload_file_name;
        if (move_uploaded_file($_FILES['my_upload']['tmp_name'], $dest)) 
        {
            
            echo 'File Has Been Uploaded !';
        }
    }
}