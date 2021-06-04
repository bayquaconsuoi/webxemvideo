<?php
include 'header.php';
?>

<?php
if (!empty($_SESSION['admin'])) {
    $limit = 6;
    $page  = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    if ($page <= 0) {
        $page = 1;
    }
    $firstIndex = ($page-1)*$limit;
    
    $sql = "SELECT * FROM video ORDER BY created_at asc".' limit '.$firstIndex.', '.$limit;;
    $video = executeResult($sql);
    
    $sql         = 'select count(id) as total from video where 1 ';
    $countResult = executeSingleResult($sql);
    $number      = 0;
    if ($countResult != null) {
        $count  = $countResult['total'];
        $number = ceil($count/$limit);
    }
    
    $index = 1;
}
if (empty($_SESSION['admin'])) {
  header("location: ../main/");
}
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
    <div class="main_container col-xl-10">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">ID video</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">Thể loại</th>
            <th scope="col">Người đăng</th>
            <th scope="col">User_Id</th>
            <th scope="col">Ngày đăng</th>
            <th scope="col">Ngày cập nhật</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($video as $item) {         
                    $video = <<< EOD
                    <tr>
                        <td>{$item['id']}</td>
                        <td>{$item['video_id']}</td>
                        <td class="video_title"><div class="info_video_title">{$item['tenvideo']}</div></td>
                        <td><img src="https://img.youtube.com/vi/{$item['video_id']}/mqdefault.jpg" alt="" class="info_video_thumbnail"></td>
                        <td>{$item['category']}</td>
                        <td>{$item['user_name']}</td>
                        <td>{$item['user_id']}</td>
                        <td>{$item['created_at']}</td>
                        <td>{$item['updated_at']}</td>
                        <td class="info_user_options">
                            <div class="btn_edit" >
                                <button class="btn btn-primary edit_modal_open"  data-video_id="{$item['id']}">Sửa</button>
                            </div>
                            <div>
                                <button class="btn btn-danger delete_modal_open" data-video_id="{$item['id']}" data-bs-toggle="modal" data-bs-target="#deleteVideo" >Xóa</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    EOD;
                    echo $video;
                }
            ?>
        </tbody>
    </table>

        <div class="main_container_footer">
            <div><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addVideo">Thêm video</button></div>
            <div class="page_container"><?=paginarion($number, $page, '')?></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addVideo" tabindex="-1" role="dialog" aria-labelledby="edit_modal_title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_modal_title">Thêm video</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="progressAdmin/video/addVideo.php" id="add_video_form" method="POST" >
          <div class="form-group">
              <label for="name">Tiêu đề</label>
              <textarea class="form-control" id="name" maxlength="100" name="name"></textarea>
              <div id="name_count">

              </div>
              <div class="form__input-error-message"></div>
            </div>
            <div class="form-group">
              <label for="description">Mô tả</label>
              <textarea class="form-control " id="description" maxlength="5000" name="description"></textarea>
              <div id="description_count">
                
              </div>
              <div class="form__input-error-message"></div>
            </div>
            <div class="form-group">
              <label for="videoId">VideoID</label>
              <textarea class="form-control" id="videoId" maxlength="32" name="videoId"></textarea>
              <div class="form__input-error-message"></div>
            </div>
            <div class="form-group">
              <label for="category">Thể loại</label>
              <select id="category" name="category" required>
                <option value="" selected disabled hidden>Chọn thể loại</option>
                <?php 
                    $sql = "select * from category";
                    $category = executeResult($sql);
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="preview" data-bs-toggle="modal" data-bs-target="#previewModal" data-bs-dismiss="modal" >Preview video</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" form="add_video_form">Thêm video</button>
      </div>
    </div>
  </div>
</div>

<!-- PREVIEW Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="edit_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-preview" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="" id="p_videoId" name="p_videoId" style="display: none;"></div>
        <iframe width="900" height="506" id="p_img" src="" title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
          allowfullscreen>
        </iframe>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <div class="p_name_container">
              <h1 class="p-card-title" id="p_name" name="p_name"></h1>
            </div>
            </div>
            <div class="form-group">
              <div class="p_description_container">
                <div class="p_description_content" id="p_description" name="p_description"></div>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-warning" data-bs-toggle="modal" data-bs-target="#addVideo" data-bs-dismiss="modal" >CHỈNH SỬA</button>
        <button type="submit" class="btn btn-primary" form="add_video_form">Thêm video</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal modal fade" id="deleteVideo" tabindex="-1" role="dialog" aria-labelledby="edit_modal_title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_modal_title">Thông báo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            Admin thực sự muốn xóa video này chứ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-danger" id ="delete_video" >Chắc chắn xóa</button>
      </div>
    </div>
  </div>
</div>

<a href="" id="middle_man"></a>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

<script>

    var btn_open_delete_modal = document.querySelectorAll(".delete_modal_open");
    [].forEach.call(btn_open_delete_modal, function(el) {
          el.onclick = function() {
              let data = $(el);
              video_id = data.data('video_id');
          }
            var btn_confirm_delete = document.getElementById('delete_video');
            btn_confirm_delete.onclick = function () {
                middle_man.href = 'progressAdmin/video/deleteVideo.php?video_id='+ video_id;
                middle_man.click();
            }
        })
    var btn_open_edit_modal = document.querySelectorAll(".edit_modal_open");
    [].forEach.call(btn_open_edit_modal, function(al) {
            al.onclick = function() {
                let data = $(al);
                video_id = data.data('video_id');
                middle_man.href = 'editVideo.php?video_id='+ video_id;
                middle_man.click();
            }
        })
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    $(document).ready(function () {

    $("#name").keyup(function () {
      var nam_value = $(this).val();
      $("#p_name").text(nam_value);
      $("#name_count").text($(this).val().length + "/100");
    });
    $("#description").keyup(function () {
      var des_value = $(this).val();
      $("#p_description").text(des_value);
      $("#description_count").text($(this).val().length + "/5000");
    });

    });
    var preview_btn = document.getElementById("preview");

    preview_btn.onclick = function (e) {
      e.preventDefault();
      add = $('#videoId').val();
      
      $('#p_videoId').empty().text(add);
      var x = document.getElementById("p_videoId").innerHTML;

      var preview_img = document.getElementById("p_img");
      preview_img.src = "https://www.youtube.com/embed/" + x + "?autoplay=1&rel=0";
    }
  })
</script>

<script>
Validator({
    form: '#add_video_form',
    formGroupSelector: '.form-group',
    errorSelector: '.form__input-error-message',
    rules: [
      Validator.isRequired('#name'),
      Validator.isRequired('#description'),
      Validator.isRequired('#videoId'),
      Validator.minLength('#name', 5),
      Validator.minLength('#description', 5),

    ],

  });

</script>
<?php
include './footer.php';
?>

