<?php
require_once ('../../db/dbhelper.php');
session_start();
    $u = $_POST['emailLogin'];
    $p = $_POST['passwordLogin']; $p = md5($p);
    
    $db = mysqli_connect("localhost", "root", "", "cloneyoutube");

    $sql = "select * from account where email='$u' and password='$p'";

    //Truy van
    $rs = mysqli_query($db,$sql);
    if (mysqli_num_rows($rs) > 0) {
        $info_user = executeSingleResult($sql);
        if($info_user['id'] == 1) {
            $_SESSION['admin'] = 1;
            header('Location: ../../admin/index.php');
        } else {
        $_SESSION['user'] = $info_user['id'];
        header('Location: ../../main/index.php');
        }           
    } else {
        $_SESSION['fail'] = "Sai thông tin tài khoản";
        header('Location: manage.php');
		die();
    }
?>
