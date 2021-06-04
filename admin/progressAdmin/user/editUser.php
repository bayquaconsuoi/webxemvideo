<?php 
require_once ('../../../db/dbhelper.php');
$id = $user_name = $password = $email = $phone = '';
session_start();

if(isset($_SESSION['admin'])) {
	if (!empty($_POST)) {
		if (isset($_POST['username'])) {
			$user_name = $_POST['username'];
			$user_name = str_replace('"', '\\"', $user_name);
		}
		if (isset($_POST['password'])) {
			$password = $_POST['password'];
			$password = str_replace('"', '\\"', $password);
		}
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			$email = str_replace('"', '\\"', $email);
		}
		if (isset($_POST['phone'])) {
			$phone = $_POST['phone'];
			$phone = str_replace('"', '\\"', $phone);
		}
		if (isset($_POST['avatar'])) {
			$user_avatar = $_POST['avatar'];
		}
        if(isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
        }

		if (!empty($user_name)) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $updated_at = date("Y-m-d H:i:s");
			$password = md5($password);
				if($_FILES["avatar"]["error"]==0) {
					$user_avatar = $_FILES["avatar"]["name"];
	
					if(move_uploaded_file($_FILES["avatar"]["tmp_name"], "../../../img/".$user_avatar)){
						$sql = "UPDATE account SET user_name = '$user_name', password = '$password', email = '$email', phone='$phone', user_avatar='$user_avatar', updated_at ='$updated_at' where id = $user_id";
						execute($sql);
					}
	
				}
			else {
				$sql = "UPDATE account SET user_name = '$user_name', password = '$password', email = '$email', phone='$phone', updated_at ='$updated_at' where id = $user_id";
				execute($sql);
			}
			header('Location: ../../user_listing.php');
			die();
		}
	}
} else {
	header("location: ../main/");
}

?>