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
                $db = mysqli_connect("localhost", "root", "", "cloneyoutube");
                if($type == "add") {
                    $sql = "select * from watch_later where video_id_later = '$video_id' and user_id_later = '$user_id'";
                    $count = mysqli_query($db,$sql);
                    if (mysqli_num_rows($count) > 0) {
                        $_SESSION['success'] = 'Bạn đã lưu video vào danh sách Video xem sau rồi';
                        header("location: ../../common/watch_later.php");
                    } else {
                        $sql = 'insert into watch_later(user_id_later,video_id_later) values ("'.$user_id.'","'.$video_id.'")';
                        execute($sql);
                        
                        $_SESSION['success'] = 'Đã thêm video vào danh sách Video xem sau';
                        header("location: ../../common/watch_later.php");
                    }
                } else {
                    $sql = "DELETE FROM watch_later WHERE video_id_later='$video_id' and user_id_later = '$user_id'";
                    execute($sql);

                    $_SESSION['success'] = 'Đã xóa video khỏi danh sách Video xem sau';
                    header("location: ../../common/watch_later.php");
                }
            }
        } else {
            echo "404";
        }
	}
?>
