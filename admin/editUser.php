<?php
include 'header.php';
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
    <div class="main_container col-xl-10">
      
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="edit_modal_title">Chỉnh sửa thông tin người dùng</h5>

            </div>
            <div class="modal-body">
              <form action="progressAdmin/user/editUser.php?user_id=<?php echo $_GET['user_id'] ?>" id="edit_user_form" method="POST" enctype="multipart/form-data">
                    <?php 
                        if(isset($_GET['user_id'])) {
                          $user_id = $_GET['user_id'];
                        }
                        $sql = 'select * from account where id = '.$user_id;
                        $data_user = executeSingleResult($sql);
                        $data = <<< EOD
                        <div class="form-group-avatar">
                          <label for="file_upload">
                            <div class="user-avatar_container">
                              <img class="icon" id="blah" src="../img/{$data_user['user_avatar']}"/>
                                <div class="avatar_hover">
                                  <i class="fas fa-camera "></i>
                                </div>
                            </div>
                          </label>
                          <input accept="image/*" type='file' style="display: none;" id="file_upload" name="avatar"/>
                          <div class="form_title">Chỉnh sửa avatar người dùng</div>
                        </div>
                        <div class="form-group">
                          <label class="form_title" for="username">Tên tài khoản</label>
                          <input type="text" class="form-control" id="username" name="username" value="{$data_user['user_name']}" >
                          <div class="form__input-error-message"></div>
                        </div>
                        <div class="form-group">
                          <label class="form_title" for="password">Mật khẩu</label>
                          <input type="text" class="form-control" id="password" name="password" value="{$data_user['password']}" >
                          <div class="form__input-error-message"></div>
                        </div>
                        <div class="form-group">
                          <label class="form_title" for="email">Email</label>
                          <input type="text" class="form-control" id="email" name="email" value="{$data_user['email']}" >
                          <div class="form__input-error-message"></div>
                        </div>
                        <div class="form-group">
                          <label class="form_title" for="phone">Điện thoại</label>
                          <input type="text" class="form-control" id="phone" name="phone" value="{$data_user['phone']}">
                          <div class="form__input-error-message"></div>
                        </div>
                        EOD;
                        echo $data;
                    ?>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="back_button" onclick="window.history.go(-1); return false;" >Trở về</button>
              <button type="submit" class="btn btn-primary" form ="edit_user_form" >Lưu thay đổi</button>
            </div>
          </div>
        </div>

    </div>
</div>

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
  Validator({
    form: '#edit_user_form',
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

