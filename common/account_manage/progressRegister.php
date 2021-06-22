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

			
	$check = "SELECT * FROM account WHERE  email = '$email'";
	$temp = executeResult($check);
	if ((int)$temp > 0)
    {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Thông tin đăng nhập bị sai"); window.location="register.php";</script>';
          
        // Dừng chương trình
        die ();
    }
			
	else
	{
	$user_avatar = "default_avatar.jpg";
	if (!empty($user_name)) {
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$created_at = $updated_at = date('Y-m-d H:s:i');
		$password = md5($password);




			$sql = 'insert into account(user_name,user_avatar, email, password, phone, created_at, updated_at) 
			values ("'.$user_name.'","'.$user_avatar.'", "'.$email.'", "'.$password.'", "'.$phone.'", "'.$created_at.'", "'.$updated_at.'")';
		execute($sql);

        session_start();
        $_SESSION['message'] = 'Đăng ký tài khoản thành công!';
		header('Location: manage.php');
		die();
			}
		}
}
?>