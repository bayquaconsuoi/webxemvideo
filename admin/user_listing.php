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
    
    $sql = "SELECT * FROM account ORDER BY id asc".' limit '.$firstIndex.', '.$limit;;
    $account = executeResult($sql);
    
    $sql         = 'select count(id) as total from account where 1 ';
    $countResult = executeSingleResult($sql);
    $number      = 0;
    if ($countResult != null) {
        $count  = $countResult['total'];
        $number = ceil($count/$limit);
    }
    
    $index = 1;
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
                        <a href="category_listing.php"> Quản lý danh mục</a>
                    </div>
                    <div class="web_option_button">
                        <a href="notify.php">Đăng thông báo</a>
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
            <th scope="col">STT</th>
            <th scope="col">Id</th>
            <th scope="col">Tên người dùng</th>
            <th scope="col">Avatar</th>
            <th scope="col">Email</th>
            <th scope="col">Điện thoại</th>
            <th scope="col">Ngày tham gia</th>
            <th scope="col">Ngày cập nhật</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 0;
                foreach ($account as $item) {  
                    $i++;             
                    $account = <<< EOD
                    <tr>
                    <th scope="row">$i</th>
                        <td>{$item['id']}</td>
                        <td>{$item['user_name']}</td>
                        <td><img src="../img/{$item['user_avatar']}" alt="" class="info_user_avatar"></td>
                        <td>{$item['email']}</td>
                        <td>{$item['phone']}</td>
                        <td>{$item['created_at']}</td>
                        <td>{$item['updated_at']}</td>
                        <td class="info_user_options">
                            <div class="btn_edit" >
                                <button class="btn btn-primary edit_modal_open"  data-user_id="{$item['id']}">Sửa</button>
                            </div>
                            <div>
                                <button class="btn btn-danger delete_modal_open" data-user_id="{$item['id']}" data-bs-toggle="modal" data-bs-target="#deleteUser" >Xóa</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    EOD;
                    echo $account;
                }
            ?>
        </tbody>
    </table>

        <div class="main_container_footer">
            <div><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUser">Thêm người dùng</button></div>
            <div class="page_container"><?=paginarion($number, $page, '')?></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="edit_modal_title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_modal_title">Thêm người dùng</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="progressAdmin/user/addUser.php" id="add_user_form" method="POST" enctype="multipart/form-data">
              <div class="form-group-avatar">
                <label for="file_upload">
                  <div class="user-avatar_container">
                    <img class="icon" id="blah" src="../img/default_avatar.jpg"/>
                      <div class="avatar_hover">
                        <i class="fas fa-camera "></i>
                      </div>
                  </div>
                </label>
                <input accept="image/*" type='file' style="display: none;" id="file_upload" name="avatar" />
                <div class="form_title">Chỉnh sửa avatar người dùng</div>
              </div>
              <div class="form-group">
                <label class="form_title" for="username">Tên tài khoản</label>
                <input type="text" class="form-control" id="username" name="username" >
                <div class="form__input-error-message"></div>
              </div>
              <div class="form-group">
                <label class="form_title" for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" >
                <div class="form__input-error-message"></div>
              </div>
              <div class="form-group">
                <label class="form_title" for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" >
                <div class="form__input-error-message"></div>
              </div>
              <div class="form-group">
                <label class="form_title" for="phone">Điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone">
                <div class="form__input-error-message"></div>
              </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" form ="add_user_form" >Thêm người dùng</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Delete -->
<div class="modal modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="edit_modal_title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_modal_title">Thông báo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            Admin thực sự muốn xóa người dùng này chứ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-danger" id ="delete_user" >Chắc chắn xóa</button>
      </div>
    </div>
  </div>
</div>

<a href="" id="middle_man"></a>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
        file_upload.onchange = evt => {
            const [file] = file_upload.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
</script>
<script>

    var btn_open_delete_modal = document.querySelectorAll(".delete_modal_open");
    [].forEach.call(btn_open_delete_modal, function(el) {
          el.onclick = function() {
              let data = $(el);
              user_id = data.data('user_id');
          }
            var btn_confirm_delete = document.getElementById('delete_user');
            btn_confirm_delete.onclick = function () {
                middle_man.href = 'progressAdmin/user/deleteUser.php?user_id='+ user_id;
                middle_man.click();
            }
        })
    var btn_open_edit_modal = document.querySelectorAll(".edit_modal_open");
    [].forEach.call(btn_open_edit_modal, function(al) {
            al.onclick = function() {
                let data = $(al);
                user_id = data.data('user_id');
                middle_man.href = 'editUser.php?user_id='+ user_id;
                middle_man.click();
            }
        })
</script>

<script>
  Validator({
    form: '#add_user_form',
    formGroupSelector: '.form-group',
    errorSelector: '.form__input-error-message',
    rules: [
      Validator.isRequired('#username'),
      Validator.minLength('#username', 5),
      Validator.isRequired('#email'),
      Validator.isEmail('#email'),
      Validator.minLength('#phone', 9),
      Validator.isRequired('#phone'),
      Validator.Isphonenumber('#phone'),
      Validator.isRequired('#password'),
      Validator.testPass('#password'),
      Validator.minLength('#password', 8),
    ],

  });
</script>
<?php
include './footer.php';
?>

