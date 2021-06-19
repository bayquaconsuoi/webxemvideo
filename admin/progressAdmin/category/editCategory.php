<?php
require_once ('../../../db/dbhelper.php');
session_start();
if(isset($_SESSION['admin'])) {
    if(isset($_GET['category_id'])){
        $category_id = $_GET['category_id'];
        $category_current_name = $_GET['category_current_name'];
        $category_name = $_POST['category_name'];
        $sql = "UPDATE category SET category_name = '$category_name' WHERE id =".$category_id;
        execute($sql);
        $sql = "UPDATE video SET category = '$category_name' WHERE category = '$category_current_name'";
        execute($sql);
        header('Location: ../../category_listing.php');
    }
} else {
	header("location: ../main/");
}
?>