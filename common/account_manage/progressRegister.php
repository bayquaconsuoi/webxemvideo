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
		$email = str_replace('"', '\\"', $email);
	}
	if (isset($_POST['phone'])) {
		$phone = $_POST['phone'];
		$phone = str_replace('"', '\\"', $phone);
	}

	$user_avatar = "119227496_1315363328795495_3486268309184032416_n.jpg";
	if (!empty($user_name)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
			$sql = 'insert into account(user_name,user_avatar, email, password, phone, created_at, updated_at) values ("'.$user_name.'","'.$user_avatar.'", "'.$email.'", "'.$password.'", "'.$phone.'", "'.$created_at.'", "'.$updated_at.'")';
		execute($sql);

        session_start();
        $_SESSION['message'] = 'Đăng ký tài khoản thành công!';
		header('Location: manage.php');
		die();
	}
}
?>