<?php 
require_once ('../../../db/dbhelper.php');

session_start();
if(isset($_SESSION['admin'])) {
	if (!empty($_POST)) {
		if (isset($_POST['name'])) {
			$tenvideo = $_POST['name'];
			$tenvideo = str_replace('"', '\\"', $tenvideo);
		}
		if (isset($_POST['description'])) {
			$mota = $_POST['description'];
			$mota = str_replace('"', '\\"', $mota);
		}
		if (isset($_POST['videoId'])) {
			$videoId = $_POST['videoId'];
			$videoId = str_replace('"', '\\"', $videoId);
		}
		if (isset($_POST['category'])) {
			$category = $_POST['category'];
			$category = str_replace('"', '\\"', $category);
		}
		if (!empty($tenvideo)) {
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$created_at = $updated_at = date("Y-m-d H:i:s");
				$user_id = 1; $user_name = "admin"; $user_avatar = "admin.jpg";
					$sql = 'insert into video(video_id, tenvideo, mota, user_id, user_name, user_avatar, category, created_at, updated_at) values ("'.$videoId.'", "'.$tenvideo.'", "'.$mota.'", "'.$user_id.'", "'.$user_name.'", "'.$user_avatar.'", "'.$category.'",  "'.$created_at.'", "'.$updated_at.'")';
				execute($sql);
	
				header("Location: ../../video_listing.php");
				die();
		}
		header('Location: ../../video_listing.php');
		die();
	}
} else {
	header("location: ../main/");
}

?>