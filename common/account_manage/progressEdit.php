<?php 
require_once ('../../db/dbhelper.php');
session_start();
if (!empty($_POST)) {

	if (isset($_POST['name'])) {
		$user_name = $_POST['name'];
		$user_name = str_replace('"', '\\"', $user_name);
	}
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
		$email = str_replace('"', '\\"', $email);
	}
	if (isset($_POST['phone'])) {
		$phone = $_POST['phone'];
		$phone = str_replace('"', '\\"', $phone);
	}
	if(isset($_POST["avatar"])) {
		$user_avatar = $_POST['avatar'];
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = $_SESSION['user'];
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$updated_at = date("Y-m-d H:i:s");
        if (isset($_SESSION['user'])) {

			$user_avatar = $_FILES["avatar"]["name"];
			if(move_uploaded_file($_FILES["avatar"]["tmp_name"], "../../img/".$user_avatar)){

				$sql = "UPDATE account SET user_name = '$user_name', email = '$email', phone='$phone', user_avatar='$user_avatar', updated_at ='$updated_at' where id = $id";
				execute($sql);
	
				$sql = "UPDATE video SET user_avatar = '$user_avatar',user_name = '$user_name',updated_at = '$updated_at' where user_id = $id";
				execute($sql);
	
				header('Location: ../../common/detail_info_page.php');
			} else {
				$sql = "UPDATE account SET user_name = '$user_name', email = '$email', phone='$phone', updated_at ='$updated_at' where id = $id";
				execute($sql);
	
				$sql = "UPDATE video SET user_name = '$user_name', updated_at ='$updated_at' where user_id = $id";
				execute($sql);
	
				header('Location: ../../common/detail_info_page.php');
			}

		}

	}
}
?>
