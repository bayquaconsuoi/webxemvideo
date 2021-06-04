<?php
require_once ('../../../db/dbhelper.php');
session_start();
if(isset($_SESSION['admin'])) {
    if(isset($_GET['category_id'])){
        $category_id = $_GET['category_id'];
        $category_name = $_POST['category_name'];
        $sql = "UPDATE category SET category_name = '$category_name' WHERE id =".$category_id;
        execute($sql);
        header('Location: ../../category_listing.php');
    }
} else {
	header("location: ../main/");
}
?>