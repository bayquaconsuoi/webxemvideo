<?php 
require_once ('../../../db/dbhelper.php');
$category_name = '';
session_start();
if(isset($_SESSION['admin'])) {
	if (!empty($_POST)) {
		if (isset($_POST['category_name'])) {
			$category_name = $_POST['category_name'];
			$category_name = str_replace('"', '\\"', $category_name);
		}
		if (!empty($category_name)) {
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$created_at = $updated_at = date('Y-m-d H:s:i');

			$sql = 'insert into category(category_name, created_at, updated_at) values ("'.$category_name.'", "'.$created_at.'", "'.$updated_at.'")';
			execute($sql);

			header('Location: ../../category_listing.php');
			die();
		}
	}
} else {
	header("location: ../main/");
}

?>