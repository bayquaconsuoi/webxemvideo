<?php 
require_once ('../../../db/dbhelper.php');
session_start();
if(isset($_SESSION['admin'])) {
	if (!empty($_POST)) {
		if (isset($_POST['tenvideo'])) {
			$tenvideo = $_POST['tenvideo'];
			$tenvideo = str_replace('"', '\\"', $tenvideo);
		}
		if (isset($_POST['mota'])) {
			$mota = $_POST['mota'];
			$mota = str_replace('"', '\\"', $mota);
		}
		if (isset($_POST['category'])) {
			$category = $_POST['category'];
			$category = str_replace('"', '\\"', $category);
		}
        if(isset($_GET['video_id'])) {
            $video_id = $_GET['video_id'];
        }

		if (!empty($tenvideo)) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $updated_at = date("Y-m-d H:i:s");
			$sql = 'UPDATE video SET tenvideo = "'.$tenvideo.'", mota = "'.$mota.'", category = "'.$category.'", updated_at = "'.$updated_at.'" where id = '.$video_id;
			execute($sql);
			header('Location: ../../video_listing.php');
			die();
		}
	}
} else {
	header("location: ../main/");
}

?>