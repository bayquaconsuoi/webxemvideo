<?php 
require_once ('../../db/dbhelper.php');
$id = $videoId = $tenvideo = $mota = $user_id = $username = $useravatar = $like_count = '';

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
	if (isset($_POST['username'])) {
		$user_name = $_POST['username'];
		$user_name = str_replace('"', '\\"', $user_name);
	}
	if (isset($_POST['useravatar'])) {
		$user_avatar = $_POST['useravatar'];
		$user_avatar = str_replace('"', '\\"', $user_avatar);
	}
	if (isset($_POST['category'])) {
		$category = $_POST['category'];
		$category = str_replace('"', '\\"', $category);
	}
	if (isset($_POST['id'])) {
		$user_id = $_POST['id'];
		$user_id = str_replace('"', '\\"', $user_id);
	}

	if (!empty($tenvideo)) {
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$created_at = $updated_at = date("Y-m-d H:i:s");
				$sql = 'insert into video(video_id, tenvideo, mota, user_id, user_name, user_avatar, category, created_at, updated_at) values ("'.$videoId.'", "'.$tenvideo.'", "'.$mota.'", "'.$user_id.'", "'.$user_name.'", "'.$user_avatar.'", "'.$category.'", "'.$created_at.'", "'.$updated_at.'")';
			execute($sql);

			header("Location: ../../common/channel_user/channel.php?id=".$user_id);
			die();
		}
	}


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["avatar"])) {
			$user_avatar = $_POST['avatar']; 
		}
		$id = '';
        if (isset($_GET['id'])) {
            $id      = $_GET['id'];
			if($_FILES["avatar"]["error"]==0) {
				$user_avatar = $_FILES["avatar"]["name"];
		
				if(move_uploaded_file($_FILES["avatar"]["tmp_name"], "../../img/".$user_avatar)){

					$sql = "UPDATE account SET user_avatar = '$user_avatar' WHERE id = $id";
					execute($sql);

					$sql = "UPDATE video SET user_avatar = '$user_avatar' where user_id = $id";
					execute($sql);
					header("Location: ../../common/channel_user/channel.php?id=".$id);
				}
			}
		}

	}
?>

<!-- if($_FILES["avatar"]["error"]==0) {
			$avatar = $_FILES["avatar"]["name"];
	
		if(move_uploaded_file($_FILES["avatar"]["tmp_name"], "../../img/".$avatar)){
			//Code xử lý, insert dữ liệu vào table
			$sql = "UPDATE account SET user_avatar = '$user_avatar' WHERE ID = 3;
			VALUES ('$MaHH', '$TenHH', '$Gia', '$avatar')";
			}
		}
		if ($connect->query($sql) === TRUE) {
			echo "Thêm dữ liệu thành công";
		} else {
			echo "Error: " . $sql . "<br>" . $connect->error;
		} -->