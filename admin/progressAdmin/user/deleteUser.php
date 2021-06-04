<?php
require_once ('../../../db/dbhelper.php');
session_start();
if(isset($_SESSION['admin'])) {
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $sql = 'DELETE FROM account WHERE id ='.$user_id;
        execute($sql);
        $sql = 'DELETE FROM video WHERE user_id='.$user_id;
        execute($sql);
        header('Location: ../../user_listing.php');
    }
} else {
	header("location: ../main/");
}
?>