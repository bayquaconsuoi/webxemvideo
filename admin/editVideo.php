<?php
include 'header.php';
if (empty($_SESSION['admin'])) {
  header("location: ../main/");
}
?>


<?php
    if(isset($_GET['video_id'])){ 
        $video_id = $_GET['video_id'];
        $sql = 'select * from video where id ='.$video_id;
        $data_video = executeSingleResult($sql);
        $sql = 'select * from account where id='.$data_video['user_id'];
        $data_user = executeSingleResult($sql);
        ?>
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

                    <div class="video_container">
                        <div class="info_video_container">
                         
                        <iframe width="580" height="280" id="video"
                        src="https://www.youtube.com/embed/<?php echo $data_video['video_id']?>?autoplay=1&rel=0" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                        allowfullscreen></iframe>
                        <form action="progressAdmin/video/editVideo.php?video_id=<?php echo $data_video['id'] ?>" method="post" id="edit_video" class="form_container">
                            
                            <div class="form_content-main-container">
                                <div class="form_content-input-container">
            
                                    <label for="videoname_edit">Tiêu đề</label>
                                    <textarea class="info_video_title2 group_textarea" maxlength="100" name="tenvideo"><?php echo $data_video['tenvideo'] ?></textarea> 
                                    <div id="videoname_edit_count">
            
                                    </div>
                                    <div class="form__input-error-message"></div>
            
                                </div>
                                <div class="form_content-input-container">
            
                                    <label for="description_edit">Mô tả</label>
                                    <textarea class="info_video_description group_textarea group_textarea-d info_video_description" maxlength="5000" name="mota"><?php echo $data_video['mota'] ?></textarea>
                                    <div id="description_edit_count">
                                    
                                    </div>
                                    <div class="form__input-error-message"></div>
            
                                </div>
                                
                                <div class="form_content-input-container">

                                    <label for="category">Thể loại</label>
                                    <select id="category" name="category" required>
                                    <?php 
                                         $sql = "select * from category";
                                         $category = executeResult($sql);
                                         $category_selected = <<< EOD
                                            <option value="{$data_video['category']}" selected disabled hidden>{$data_video['category']}</option>
                                         EOD;
                                         echo $category_selected;
                                         foreach ($category as $category_mini) {         
                                           $category_content = <<< EOD
                                             <option value="{$category_mini['category_name']}">{$category_mini['category_name']}</option>
                                           EOD;
                                           echo $category_content;
                                         }
                                    ?>
                                    </select>
                                    <div class="form__input-error-message"></div>
            
                                </div>

                            </div>
                            
                        </form>
                        </div>
                    </div>
                    <div class="user_container"> 
                        <div class="info_more">
                            Thông tin khác
                        </div>
                        <div>   
                                Video Id: <?php echo $data_video['video_id'] ?><br/>
                                Số lượt xem: <?php echo $data_video['view_count'] ?><br/>
                                Số lượt thích: <?php echo $data_video['like_count'] ?><br/>
                                Số lượt không thích: <?php echo $data_video['dislike_count']?><br/>
                                Ngày đăng: <?php echo $data_video['created_at']?><br/>
                                Ngày cập nhật: <?php echo $data_video['updated_at']?><br/>
                        </div>
                        <div class="info_more">
                                Thông tin người đăng
                        </div>
                        <div>
                                User Id: <?php echo $data_user['id']?><br/>
                                <div>
                                    <img src="../img/<?php echo $data_video['user_avatar']?>" class="user_avatar" alt="">
                                    <?php echo $data_video['user_name']?> <br/>
                                </div>
                                Ngày tham gia: <?php echo $data_user['created_at']?><br/>
                                Ngày cập nhật: <?php echo $data_user['updated_at']?><br/>
                        </div>
                        <div clasa="btn_options">
                            <button class="btn btn-primary" type="submit" form ="edit_video">Lưu thay đổi</button>
                            <button class="btn btn-secondary" type="button"  onclick="window.history.go(-1); return false;">Trở về</button>
                        </div>
                    </div>

            </div>
        </div>
    <?php } 
?>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

<?php
include './footer.php';
?>

