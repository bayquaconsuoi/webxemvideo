<?php 
require_once ('../../db/dbhelper.php');
session_start();
if (!empty($_POST)) {

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$video_id = $_GET['id'];

		$videoname = $_POST['videoname_edit'];
		$videoname = str_replace('"', '\\"', $videoname);

		$description = $_POST['description_edit'];
		$description = str_replace('"', '\\"', $description);

		$category = $_POST['category_edit'];
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$updated_at = date("Y-m-d H:i:s");
        if (isset($_SESSION['user'])) {
			$sql = 'UPDATE video SET tenvideo = "'.$videoname.'", mota = "'.$description.'", category = "'.$category.'", updated_at = "$updated_at" where id = '.$video_id;
			execute($sql);
			header('Location: detail_info_video_user.php');
		}

	}
}
?>
