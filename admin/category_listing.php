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
    
    $sql = "SELECT * FROM category ORDER BY id asc".' limit '.$firstIndex.', '.$limit;;
    $category = executeResult($sql);
    
    $sql         = 'select count(id) as total from category where 1 ';
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
            <th scope="col">Tên thể loại</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($category as $item) {         
                    $category = <<< EOD
                    <tr>
                        <td>{$item['id']}</td>
                        <td>{$item['category_name']}</td>
                        <td class="info_user_options">
                            <div class="btn_edit" >
                                <button class="btn btn-primary edit_modal_open"  data-category_id="{$item['id']}">Sửa</button>
                            </div>
                            <div>
                                <button class="btn btn-danger delete_modal_open" data-category_id="{$item['id']}" data-bs-toggle="modal" data-bs-target="#deletecategory" >Xóa</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    EOD;
                    echo $category;
                }
            ?>
        </tbody>
    </table>

        <div class="main_container_footer">
            <div><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addcategory">Thêm thể loại</button></div>
            <div class="page_container"><?=paginarion($number, $page, '')?></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="edit_modal_title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_modal_title">Thêm thể loại</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="progressAdmin/category/addCategory.php" id="add_category_form" method="POST" >
          <div class="form-group">
              <label for="name">Thêm thể loại</label>
              <textarea class="form-control" id="name" maxlength="50" name="category_name"></textarea>
              <div id="name_count">

              </div>
              <div class="form__input-error-message"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" form="add_category_form">Thêm thể loại</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal modal fade" id="deletecategory" tabindex="-1" role="dialog" aria-labelledby="edit_modal_title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_modal_title">Thông báo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            Admin thực sự muốn xóa thể loại này chứ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-danger" id ="delete_category" >Chắc chắn xóa</button>
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
              category_id = data.data('category_id');
          }
            var btn_confirm_delete = document.getElementById('delete_category');
            btn_confirm_delete.onclick = function () {
                middle_man.href = 'progressAdmin/category/deleteCategory.php?category_id='+ category_id;
                middle_man.click();
            }
        })
    var btn_open_edit_modal = document.querySelectorAll(".edit_modal_open");
    [].forEach.call(btn_open_edit_modal, function(al) {
            al.onclick = function() {
                let data = $(al);
                category_id = data.data('category_id');
                middle_man.href = 'editcategory.php?category_id='+ category_id;
                middle_man.click();
            }
        })
</script>

<?php
include './footer.php';
?>

