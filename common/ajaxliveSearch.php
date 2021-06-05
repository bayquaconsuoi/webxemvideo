<?php
session_start();
require_once ('./../db/dbhelper.php');
$output = '';
if (!empty($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
if (isset($_GET['where'])) {
    $where = $_GET['where'];
}
$db = mysqli_connect("localhost", "root", "", "cloneyoutube");
if(isset($_POST["query"])&&$where=="edit") {

 $sql = " SELECT tenvideo,video_id,id FROM video WHERE !deleted_at AND user_id = $user AND LOWER(tenvideo) LIKE LOWER('%".$_POST['query']."%') ";
 $items = executeResult($sql);
    $rs = mysqli_query($db,$sql);
    if (mysqli_num_rows($rs) > 0) {
        if(isset($_GET['where'])) {
            foreach ($items as $item_mini) {
                $output = <<< EOD
                <a href="detail_info_video_user_edit.php?video_id={$item_mini['id']}">
                    <div class="search_result_field">{$item_mini['tenvideo']}</div>
                </a>
                EOD;
                echo $output;
            }
        } else {
            foreach ($items as $item_mini) {
                $output = <<< EOD
                <a href="detail/detail_info_video_user_edit.php?video_id={$item_mini['id']}">
                    <div class="search_result_field">{$item_mini['tenvideo']}</div>
                </a>
                EOD;
                echo $output;
            }
        }
    } else {
        $output = <<< EOD
                <div class=" nfound">(Không tìm thấy)</div>
        EOD;
        echo $output;
    }

}
?>

