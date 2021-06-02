<?php
session_start();
require_once ('../../db/dbhelper.php');
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $type = $_GET['type'];
            if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
                $video_id = $_GET['video_id'];
                $type = $_GET['type'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $created_at = date("Y-m-d H:i:s");
                $db = mysqli_connect("localhost", "root", "", "cloneyoutube");
                if($type == "like") {
                    $sql = "select * from islike where video_id_store = '$video_id' and user_id_store = '$user_id'";
                    $like = mysqli_query($db,$sql);
                    $sql = "select * from isdislike where video_id_store = '$video_id' and user_id_store = '$user_id'";
                    $dislike = mysqli_query($db,$sql);
                    if (mysqli_num_rows($dislike) > 0) {
                        $sql = "DELETE FROM isdislike WHERE video_id_store='$video_id' and user_id_store = '$user_id'";
                        execute($sql);
                        $sql = "UPDATE video SET dislike_count = dislike_count-1 WHERE id = '$video_id'";
                        execute($sql);

                        $sql = 'insert into islike(user_id_store,video_id_store,created_at_like) values ("'.$user_id.'","'.$video_id.'","'.$created_at.'")';
                        execute($sql);
                        $sql = "UPDATE video SET like_count = like_count+1 WHERE id = '$video_id'";
                        execute($sql);
                    } else if(mysqli_num_rows($like) > 0) {
                        $sql = "DELETE FROM islike WHERE video_id_store='$video_id' and user_id_store = '$user_id'";
                        execute($sql);
                        $sql = "UPDATE video SET like_count = like_count-1 WHERE id = '$video_id'";
                        execute($sql);
                    } else {
                        $sql = 'insert into islike(user_id_store,video_id_store,created_at_like) values ("'.$user_id.'","'.$video_id.'","'.$created_at.'")';
                        execute($sql);
                        $sql = "UPDATE video SET like_count = like_count+1 WHERE id = '$video_id'";
                        execute($sql);
                    }
                } else if($type == "dislike") {
                    $sql = "select * from isdislike where video_id_store = '$video_id' and user_id_store = '$user_id'";
                    $dislike = mysqli_query($db,$sql);
                    $sql = "select * from islike where video_id_store = '$video_id' and user_id_store = '$user_id'";
                    $like = mysqli_query($db,$sql);
                    if (mysqli_num_rows($like) > 0) {
                        $sql = "DELETE FROM islike WHERE video_id_store='$video_id' and user_id_store = '$user_id'";
                        execute($sql);
                        $sql = "UPDATE video SET like_count = like_count-1 WHERE id = '$video_id'";
                        execute($sql);

                        $sql = 'insert into isdislike(user_id_store,video_id_store) values ("'.$user_id.'","'.$video_id.'")';
                        execute($sql);
                        $sql = "UPDATE video SET dislike_count = dislike_count+1 WHERE id = '$video_id'";
                        execute($sql);
                    } else if(mysqli_num_rows($dislike) > 0) {
                        $sql = "DELETE FROM isdislike WHERE video_id_store='$video_id' and user_id_store = '$user_id'";
                        execute($sql);
                        $sql = "UPDATE video SET dislike_count = dislike_count-1 WHERE id = '$video_id'";
                        execute($sql);
                    } else {
                        $sql = 'insert into isdislike(user_id_store,video_id_store) values ("'.$user_id.'","'.$video_id.'")';
                        execute($sql);
                        $sql = "UPDATE video SET dislike_count = dislike_count+1 WHERE id = '$video_id'";
                        execute($sql);
                    }
                } else {
                    $sql = "select * from isdislike where video_id_store = '$video_id' and user_id_store = '$user_id'";
                    $dislike = mysqli_query($db,$sql);
                    $sql = "select * from islike where video_id_store = '$video_id' and user_id_store = '$user_id'";
                    $like = mysqli_query($db,$sql);
                    if (mysqli_num_rows($like) > 0) {
                        $sql = "DELETE FROM islike WHERE video_id_store='$video_id' and user_id_store = '$user_id'";
                        execute($sql);
                        $sql = "UPDATE video SET like_count = like_count-1 WHERE id = '$video_id'";
                        execute($sql);

                        $_SESSION['disliked_success'] = 'Đã xóa video khỏi danh sách Video đã thích của bạn';
                        header('Location: ../../common/playlist.php');
                    }
                }
            }
        } else {
            echo "404";
        }
	}
?>
