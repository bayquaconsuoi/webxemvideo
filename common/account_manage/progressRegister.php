<?php 
require_once ('../../db/dbhelper.php');
$id = $user_name = $password = $email = $phone = '';

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
		
		$db = mysqli_connect("localhost", "root", "", "cloneyoutube"); 
		$sql = "SELECT * FROM account WHERE email = '$email'";

		$rs = mysqli_query($db,$sql);

		if (mysqli_num_rows($rs) > 0) {
			$email = "null";
		}

		$email = str_replace('"', '\\"', $email);
	}
	if (isset($_POST['phone'])) {
		$phone = $_POST['phone'];
		$phone = str_replace('"', '\\"', $phone);
	}

	$user_avatar = "default_avatar.jpg";
	if (!empty($user_name)&&$email !== "null") {
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$created_at = $updated_at = date('Y-m-d H:s:i');
		$password = md5($password);
			$sql = 'insert into account(user_name,user_avatar, email, password, phone, created_at, updated_at) values ("'.$user_name.'","'.$user_avatar.'", "'.$email.'", "'.$password.'", "'.$phone.'", "'.$created_at.'", "'.$updated_at.'")';
		execute($sql);

        session_start();
        $_SESSION['message'] = 'Đăng ký tài khoản thành công!';
		header('Location: manage.php');
		die();
	} else {
		session_start();
        $_SESSION['fail'] = 'Đăng ký tài khoản không thành công!';
		header('Location: manage.php');
		die();
	}
}
?>