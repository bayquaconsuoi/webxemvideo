<?php
require_once ('../../db/dbhelper.php');
session_start();
    $u = $_POST['usernameLogin'];
    $p = $_POST['passwordLogin']; $p = md5($p);
    
    $db = mysqli_connect("localhost", "root", "", "cloneyoutube");

    $sql = "select * from account where user_name='$u' and password='$p'";

    //Truy van
    $rs = mysqli_query($db,$sql);
    if (mysqli_num_rows($rs) > 0) {
        $info_user = executeSingleResult($sql);
        $_SESSION['user'] = $info_user['id'];
        header('Location: ../../main/index.php');
    } else {
        $_SESSION['fail'] = "Sai thông tin tài khoản";
        header('Location: manage.php');
		die();
    }
?>
