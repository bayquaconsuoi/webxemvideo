<?php 
    session_start();
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
        $admin = $_SESSION['admin'];
    } else {
        header("location: ../main/");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px;
            }
            #user_login form{
                width: 200px;
                margin: 40px auto;
            }
            #user_login form input{
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
    <div id="login-notify" class="box-content">
        Xin chào Admin<br/>
        <a href="./user_listing.php">Quản lý người dùng</a><br/>
        <a href="./video_listing.php">Quản lý video người dùng</a><br/>
        <a href="./category_listing.php">Quản lý danh mục</a><br/>
        <a href="../pdf/data_user.php">Thông kê người dùng</a> <br/>
        <a href="logout.php">Đăng xuất</a>
    </div>
    </body>
</html>