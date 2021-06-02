<?php
session_start();
require_once ('../../db/dbhelper.php');
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_SESSION['user'])) {
            $user = $_SESSION['user'];
            if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
                $video_id = $_GET['video_id'];
                $type = $_GET['type'];
                if($type == "delete") {
                    $sql = "DELETE FROM history WHERE video_id_his ='$video_id' and user_id_his = '$user_id'";
                    execute($sql);
                        
                    $_SESSION['success'] = 'Đã xóa video khỏi lịch sử xem của bạn';
                    header("location: ../../common/history.php");
                }
            }
        } else {
            echo "404";
        }
	}
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $type = $_GET['type'];
            if($type == "deleteAll") {
                $sql = "DELETE FROM history WHERE user_id_his = $user";
                execute($sql);

                $_SESSION['success'] = 'Đã xóa tất cả video khỏi lịch sử xem của bạn';
                header("location: ../../common/history.php");
            }
        }
    }
?>
