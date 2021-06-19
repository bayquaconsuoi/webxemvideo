<?php
include 'header.php';
if (empty($_SESSION['admin'])) {
  header("location: ../main/");
}
?>


<?php
    if(isset($_GET['category_id'])){
        $category_id = $_GET['category_id'];
        $sql = 'select * from category where id ='.$category_id;
        $data_category = executeSingleResult($sql);
        $main = <<< EOD
        <div class="container-fluid" id="main_container">
            <div class="side_container col-xl-2">
                <div class="side_container_inner">
                    <div class="side_title">Quản lý trang web</div>
                        <div class="web_controls">
                            <div class="web_option_button">
                                <a href="user_listing.php">Quản lý người dùng</a>
                            </div>
                            <div class="web_option_button">
                                <a href="video_listing.php">Quản lý video người dùng</a>
                            </div>
                            <div class="web_option_button">
                                <a href="category_listing.php"> Quản lý thể loại</a>
                            </div>
                            <div class="web_option_button">
                        </div>
                    </div>
                    <div class="side_icon_page_container">
                        <a href="../main/">
                            <div class="side_icon_container">
                                <img src="../img/icon_page/icon_page.png" class="icon_page" alt="">
                            </div>
                            <div class="side_icon_name_container">
                                Trung's YOUTUBE
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="main_container edit_video_container col-xl-10">
                <form action="progressAdmin/category/editCategory.php?category_id={$data_category['id']}&category_current_name={$data_category['category_name']}" method="post" id="edit_category" class="form_container">
                    <label for="category_name">Thể loại</label>    
                    <input type="text" id="category_name" name="category_name" value="{$data_category['category_name']}">
                    <button type="button" class="btn btn-secondary" id="back_button" onclick="window.history.go(-1); return false;" >Trở về</button>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </form>    
            </div>
        </div>
        EOD;
        echo $main;
    }
?>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

<?php
include './footer.php';
?>
