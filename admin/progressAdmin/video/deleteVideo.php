<?php
require_once ('../../../db/dbhelper.php');
session_start();
if(isset($_SESSION['admin'])) {
    if(isset($_GET['video_id'])){
        $video_id = $_GET['video_id'];
        $sql = 'DELETE FROM video WHERE id='.$video_id;
        execute($sql);
        header('Location: ../../video_listing.php');
    }
} else {
	header("location: ../main/");
}
?>