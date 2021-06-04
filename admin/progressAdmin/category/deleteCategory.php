<?php
require_once ('../../../db/dbhelper.php');
session_start();
if(isset($_SESSION['admin'])) {
    if(isset($_GET['category_id'])){
        $category_id = $_GET['category_id'];
        $sql = 'DELETE FROM category WHERE id ='.$category_id;
        execute($sql);
        header('Location: ../../category_listing.php');
    }
} else {
	header("location: ../main/");
}
?>