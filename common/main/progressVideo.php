<?php
session_start();
require_once ('../../db/dbhelper.php');
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_SESSION['user'])) {
            $type = $_GET['type'];
            $user = $_SESSION['user'];
            if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
                $video_id = $_GET['video_id'];
                $type = $_GET['type'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $deleted_at = date("Y-m-d H:i:s");
                $db = mysqli_connect("localhost", "root", "", "cloneyoutube");
                if($type == "delete") {
                    $sql = "update video set deleted_at = '$deleted_at' WHERE id = '$video_id'";
                    execute($sql);
                        
                    $_SESSION['success'] = 'Đã xóa video khỏi danh sách video của bạn';
                    header("location: ../../common/detail_info_video_user.php");
                }
            }
            if($type == "deleteAll") {
                $sql = "DELETE FROM video WHERE user_id = $user";
                execute($sql);
                
                $_SESSION['success'] = 'Đã xóa tất cả video khỏi danh sách video của bạn';
                header("location: ../../common/detail_info_video_user.php");
            }
        } else {
            echo "404";
        }
	}
?>
