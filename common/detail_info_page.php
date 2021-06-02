<link rel="stylesheet" href="../public/css/detail_page/boostrap.css">
<link rel="stylesheet" href="../public/css/detail_page/style.css">
<link rel="stylesheet" href="../public/fontawesome-free-5.15.3-web/css/all.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script> -->
<head>
<title>Manage</title>
<link rel="icon"
        href="../img/icon_page/icon_page.png">
</head>
<?php
require_once ('./../db/dbhelper.php');
session_start();
if (!empty($_SESSION['user'])) {
  $user = $_SESSION['user'];
}

//Truy van database
$sql = "select * from account where id = '$user'";
$info_user = executeSingleResult($sql);
if ($info_user != null) {
  $id = $info_user['id'];
  $username = $info_user['user_name'];
  $useravatar = $info_user['user_avatar'];
  $email   = $info_user['email'];
  $phone = $info_user['phone'];
  $created_at = $info_user['created_at'];
} else {
  header("location: ./../main/");
}

?>

<?php
if (isset($_SESSION['user'])) {
    $userdetail = <<< EOD
    <div class="emp-profile">
      <div class="row">
        <div class="icon_page">

          <div class="icon_page-container">
            <div>
              <a href="./../common/channel_user/channel.php?id=$id">
                <img src="../img/$useravatar" class="icon" alt="">
              </a>
            </div>
            <div>
              <h5 style="text-align: center;"> $username </h5>
            </div>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="outBtn">
          <a href="./../main">
            <img src="../img/icon_page/icon_page.png"
              alt="" style="width: 48px; border-radius: 50%;">
            <div class="up_logo-name">Clone Youtube</div>
          </a>
        </div>
        <div class="col-md-auto">
          <div class="profile-head">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab"
                  aria-controls="home" aria-selected="true">Thông tin tài khoản</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="create-tab" href="detail_info_video_user.php">
                Quản lý video đã đăng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="save-tab" data-toggle="tab" href="#save" role="tab" aria-controls="save"
                  aria-selected="false">Quản lý video đã lưu</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="upBtn">
          <button class=" btn-active crip_animate" id="modal_btn">
            <i class="fas fa-video bx"></i>
            <span class="bx">Tạo</span>
          </button>
        </div>
      </div>

      <div class="row" style="padding-top: 12px">
        <div class="col-md-12">
          <div class="tab-content profile-tab" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <div class="col-md-6">
                  <label>Id tài khoản :</label>
                </div>
                <div class="col-md-6">
                  <p> $id </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Tên tài khoản :</label>
                </div>
                <div class="col-md-6">
                  <p> $username </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Email :</label>
                </div>
                <div class="col-md-6">
                  <p> $email </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Điện thoại :</label>
                </div>
                <div class="col-md-6">
                  <p> $phone </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Ngày tham gia :</label>
                </div>
                <div class="col-md-6">
                  <div class="time" style="display: none;" data-value=" $created_at "></div>
                  <span id="createTime"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row edit_info_btn">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_modal" >Chỉnh sửa thông tin cá nhân</button>
      </div>
    </div>
    EOD;
    echo $userdetail;
}
?>
<!-- Edit Modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="edit_modal_title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_modal_title">Chỉnh sửa thông tin tài khoản</h5>
        <button type="button" class="close m_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../common/account_manage/progressEdit.php?id=<?php echo $id ?>" id="edit_form" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="file_upload">
                  <div class="user-avatar_container">
                    <img class="icon" id="blah" src="../img/<?php echo $useravatar ?>"/>
                      <div class="avatar_hover">
                        <i class="fas fa-camera "></i>
                      </div>
                  </div>
                </label>
                <input accept="image/*" type='file' style="display: none;" id="file_upload" name="avatar" />
                <div><?php echo $username ?></div>
              </div>
              <div class="form-group">
                <label class="form_title" for="name">Tên tài khoản</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $username ?>">
                <div class="form__input-error-message"></div>
              </div>
              <div class="form-group">
                <label class="form_title" for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                <div class="form__input-error-message"></div>
              </div>
              <div class="form-group">
                <label class="form_title" for="phone">Điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone ?>">
                <div class="form__input-error-message"></div>
              </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="submit_edit_form">Lưu thay đổi</button>
      </div>
    </div>
  </div>
</div>
<!-- The Modal -->
<div id="upload_modal" class="upload-modal">

  <!-- Modal content -->
  <div class="upload-modal-content">
    <div class="upload-modal-content_inner">
      <div class="upload-modal-top">
        <div class="upload-modal-title">
          <div>Tải video lên</div>
        </div>
        <div class="upload-modal-close">
          <span class="modal-close-btn">&times;</span>
        </div>
      </div>
      <div class="upload-modal-main">

        <form class="mt-4" method="POST" id="submit_form" action="../common/channel_user/progressUp.php">
          <div id="main_form">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>">
            <input type="hidden" class="form-control" id="username" name="username" value="<?php echo $username;?>">
            <input type="hidden" class="form-control" id="useravatar" name="useravatar" value="<?php echo $useravatar;?>">
            <div class="form-group">
              <label for="name">Tên video</label>
              <input type="text" class="form-control" id="name" name="name">
              <div class="form__input-error-message"></div>
            </div>
            <div class="form-group">
              <label for="description">Mô tả</label>
              <textarea class="form-control" id="description" name="description"></textarea>
              <div class="form__input-error-message"></div>
            </div>
            <div class="form-group">
              <label for="videoId">VideoID</label>
              <input type="text" class="form-control" id="videoId" name="videoId">
              <div class="form__input-error-message"></div>
            </div>
            <div class="col text-center">
              <button type="button" class="preview_button btn btn-primary" id="preview">PREVIEW</button>
            </div>
          </div>

        </form>
        <div class="preview_info" id="preview_form" style="display: none;">

          <div class="p_video_container">
            <div class="" id="p_videoId" name="p_videoId" style="display: none;"></div>
            <iframe width="900" height="506" id="p_img" src="" title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
              allowfullscreen></iframe>
          </div>
          <div class="p_name_container">
            <h1 class="p-card-title" id="p_name" name="p_name"></h1>
          </div>


          <div class="p_description_container">
            <div class="p_description_content" id="p_description" name="p_description"></div>
          </div>

          <div class="p_button_container">
            <button class="return_button btn btn-primary btn-warning" id="back_button">CHỈNH SỬA</button>
            <button type="submit" class="submit_button btn btn-primary" form="submit_form">LƯU</button>
          </div>
        </div>
      </div>


    </div>
  </div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="../public/js/info_page.js"></script>
<script src="../public/js/validate.js"></script>
<script src="../public/js/moment.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var x = document.querySelector('.time');
    var z = document.getElementById('createTime')
    var y = new Date(x.getAttribute("data-value"));
    var month = y.getMonth() + 1;
    var today = new Date();
    var a = moment([y.getFullYear(), 0, y.getDate()]);
    var b = moment([today.getFullYear(), 0, today.getDate()]);
    xx=a.from(b) // "a day ago" --}}
    z.innerHTML = y.getDate() + " th " + month + ", " + y.getFullYear();
  });


  var modal = document.getElementById("upload_modal");
  $(document).ready(function () {
    if (window.location.search.substr(1) == "up") {
      modal.style.display = "block";
    }
  })

  $(document).ready(function () {

    $("#name").keyup(function () {
      var nam_value = $(this).val();
      $("#p_name").text(nam_value);
    });
    $("#description").keyup(function () {
      var des_value = $(this).val();
      $("#p_description").text(des_value);
    });

  });

  var preview_btn = document.getElementById("preview");

  preview_btn.onclick = function (e) {
    e.preventDefault();
    $('#preview_form').show();
    add = $('#videoId').val();
    $('#p_videoId').empty().text(add);
    var x = document.getElementById("p_videoId").innerHTML;

    var preview_img = document.getElementById("p_img");
    preview_img.src = "https://www.youtube.com/embed/" + x + "?autoplay=1&rel=0";

    var modal = document.getElementById("main_form");
    modal.style.display = "none";
  }

  var back_btn = document.getElementById("back_button");
  var main_modal = document.getElementById("main_form");
  var preview_modal = document.getElementById("preview_form");
  back_btn.onclick = function () {
    main_modal.style.display = "block";
    preview_modal.style.display = "none";
  }

</script>

<script type="text/javascript">
    $(document).ready(function() {
       $("#submit_edit_form").click(function() {
           $("#edit_form").submit();
       });
    });
</script>

<script>
  Validator({
    form: '#submit_form',
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
  Validator({
    form: '#edit_form',
    formGroupSelector: '.form-group',
    errorSelector: '.form__input-error-message',
    rules: [
      Validator.isRequired('#name'),
      Validator.isRequired('#email'),
      Validator.isRequired('#phone'),
      Validator.minLength('#name', 5),
      Validator.minLength('#email', 12),
      Validator.minLength('#phone', 9),
      Validator.isEmail('#email'),
      Validator.Isphonenumber('#phone'),
    ],
  });
</script>

<script>
  file_upload.onchange = evt => {
    const [file] = file_upload.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }
</script>

<!-- //  https://64.media.tumblr.com/6c894cfef11f03c37c2688cedd03c508/tumblr_on8i9klcVA1uti1rro7_400.png  -->