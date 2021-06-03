<link rel="stylesheet" href="../../public/css/detail_page/boostrap.css">
<link rel="stylesheet" href="../../public/css/detail_page/style.css">
<link rel="stylesheet" href="../../public/css/detail_page/uploaded_page.css">
<link rel="stylesheet" href="../../public/fontawesome-free-5.15.3-web/css/all.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script> -->
<head>
<title>Manage</title>
<link rel="icon"
        href="../../img/icon_page/icon_page.png">
</head>
<?php 
require_once ('../../db/dbhelper.php');
include_once('../../common/utility.php');
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
  header("location: ../../main/");
}

?>

<div class="up_container">
<?php 
  $navbar =<<< EOD
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="../../main/" class=" navbar-brand ">
      <img src="../../img/icon_page/icon_page.png"
        class="up_logo-page" />
      <div class="up_logo-name">Trung's YOUTUBE</div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0">
        <div class="up_search-container">
          <i class="fas fa-search search_icon" style="cursor: pointer;"></i>
          <input class="form-control mr-sm-2 search_input" type="search" style="border: none;" placeholder="Tìm kiếm trên kênh của bạn">
        </div>
      </form>
      <div class="up_create-container">
        <button class=" btn-active crip_animate" id="modal_btn" style="position: relative;">
          <i class="fas fa-video bx"></i>
          <span class="bx ">Tạo</span>
        </button>
      </div>
      <div class="up_user-avatar_nav">
        <img src="../../img/$useravatar" class="up_user-avatar" alt="" onclick="up_dropDown_nav()">
        <div id="up_dropDown" class="up_dropdown-content">
          <div class="up_dropdown-userinfo">
            <div class="up_dropdown-user-avatar">
              <img src="../../img/$useravatar" class="up_user-avatar-dropdown" alt="">
            </div>
            <div class="up_dropdown-user-name">
              $username
            </div>
          </div>
          <div class="up_dropdown-options">
            <a href="../../common/channel_user/channel.php?id=$id">
              <div class="up_icon">
                <div>
                  <i class="up_dropdown-options-icon far fa-user-circle"></i>
                </div>

                <div style="margin-left: 10px;">Kênh của bạn</div>
              </div>
            </a>
          </div>
          <div class="up_dropdown-options">
            <a href="../../main/">
              <div class="up_icon">
                <div>
                  <img
                    src="../../img/icon_page/icon_page.png"
                    class="up_dropdown-options-icon" />
                </div>

                <div style="margin-left: 10px;">Trung's YOUTUBE</div>
              </div>
            </a>
          </div>
          <div class="up_dropdown-options">
            <a href="../../common/account_manage/progressLogout.php">
              <div class="up_icon">
                <div>
                  <i class="up_dropdown-options-icon fas fa-sign-out-alt"></i>
                </div>

                <div style="margin-left: 10px;">Đăng xuất</div>
              </div>
            </a>
          </div>
        </div>

      </div>
    </div>
  </nav>
  EOD;
  echo $navbar;
?>
<div class="main-content_container container-fluid">
  <div class="row m_row">
    <div class="side_container col-xl-2 col-sm-1">
      <div class="side-inner_container">
      <div class="side-inner_back_btn">
        <a href="../../common/detail_info_video_user.php" style="display: flex;">
          <div class="side-inner_back-button">
            <i class="fas fa-arrow-left"></i>
          </div> 
          <div class="side-inner_back-title">
            Nội dung của kênh
          </div>
        </a>
      </div>
        <div class="side-inner_userinfo">
          <div class="side_video_thumbnail">
            <img src="data:image/jpeg;base64,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" alt="">
          </div>
          <div class="video_title">
            Video của bạn
          </div>
          <div class="video_name">
            Nguyễn Trung AAAA
          </div>
        </div>

      </div>
    </div>
    <div class="main_container col-xl-10 col-sm-11">
      <div class="main_title-container  edit-main-container">
        <div class="main_title">
          Chi tiết video
        </div>
        <div class="side_main_options">
          <div class="side-main_cancel">
            <button>Hủy thay đổi</button>
          </div>
          <div class="side-main_save">
            <button>Lưu</button>
            <span class="tooltiptext">Bạn phải xử lý lỗi xong thì mới có thể lưu</span>
          </div>
        </div>

      </div>
      <div class="main_title-container  edit-main-container">
          <div class="form-container">
            <form action="" id="edit-video_form" class="edit-video_form">
              <div class="form_content-main-container">
                <div class="form_content-input-container">

                    <label for="videoname_edit">Tiêu đề</label>
                    <textarea name="videoname_edit" id="videoname_edit" placeholder="Thêm tiêu đề để mô tả video của bạn"></textarea>
                    <div class="form__input-error-message"></div>

                </div>
                <div class="form_content-input-container" style="margin-top: 10px;">

                    <label for="description_edit">Mô tả</label>
                    <textarea name="description_edit" id="description_edit" placeholder="Giúp người xem nắm được thông tin về video của bạn"></textarea>
                    <div class="form__input-error-message"></div>

                </div>
              </div>
            </form>
              <div class="form_content-preview-container">
                <div class="iframe">
                  <iframe width="352" height="198" src="https://www.youtube.com/embed/hr08k6Y4wbo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate quibusdam ad adipisci iure illo quam aspernatur sed cupiditate deserunt quaerat.
                </div>
              </div>
          </div>      
      </div>
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

        <form class="mt-4" method="POST" id="submit_form" action="../channel_user/progressUp.php">
          <div id="edit_form">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>">
            <input type="hidden" class="form-control" id="username" name="username" value="<?php echo $username;?>">
            <input type="hidden" class="form-control" id="useravatar" name="useravatar" value="<?php echo $useravatar;?>">
            <div class="form-group">
              <label for="name">Tiêu đề</label>
              <textarea class="form-control" id="name" name="name"></textarea>
              <div class="form__input-error-message"></div>
            </div>
            <div class="form-group">
              <label for="description">Mô tả</label>
              <textarea class="form-control" id="description" name="description"></textarea>
              <div class="form__input-error-message"></div>
            </div>
            <div class="form-group">
              <label for="videoId">VideoID</label>
              <textarea class="form-control" id="videoId" name="videoId"></textarea>
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
            <button type="submit" class="submit_button btn btn-primary" id="submit_video_form">LƯU</button>
          </div>
        </div>
      </div>


    </div>
  </div>

</div>

<!-- Notify Modal -->
<?php
if (!empty($_SESSION['success'])) {
  $success = $_SESSION['success'];
}

?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="../../public/js/info_page.js"></script>
<script src="../../public/js/validate.js"></script>
<script src="../../public/js/moment.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
crossorigin="anonymous"></script>

<script>
  window.onclick = function(event) {
    if (!event.target.matches('.up_user-avatar')) {
      var drop_down_avatar = document.getElementById("up_dropDown");
      drop_down_avatar.classList.remove("show");
    }
    var modal = document.getElementById("upload_modal");
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  setTimeout(function() {
    $('#notify_modal_id').addClass('notify_modal_hide');
  }, 3500);
</script>

<script>
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

    var modal = document.getElementById("edit_form");
    modal.style.display = "none";
  }

  var back_btn = document.getElementById("back_button");
  var main_modal = document.getElementById("edit_form");
  var preview_modal = document.getElementById("preview_form");
  back_btn.onclick = function () {
    main_modal.style.display = "block";
    preview_modal.style.display = "none";
  }

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
    form: '#edit-video_form',
    formGroupSelector: '.form_content-input-container',
    errorSelector: '.form__input-error-message',
    rules: [
      Validator.isRequired('#videoname_edit'),
      Validator.isRequired('#description_edit'),
      Validator.minLength('#videoname_edit', 5),
      Validator.minLength('#description_edit', 5),

    ],
  });
</script>

<script>
  function up_dropDown_nav() {
    document.getElementById("up_dropDown").classList.toggle("show");
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var x = document.querySelectorAll('.time');
    var z = document.getElementsByClassName('createTime')
    for (i = 0; i < x.length; i++) {
      var y = new Date(x[i].getAttribute("data-value"));
      var month = y.getMonth() + 1;
      z[i].innerHTML = y.getDate() + " th " + month + ", " + y.getFullYear();
    }
  });
</script>

<script>

$("textarea").each(function () {
  this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
}).on("input", function () {
  this.style.height = "auto";
  this.style.height = (this.scrollHeight) + "px";
});

$("#submit_video_form").click(function() {
    validVideoId(add)
  });
  function validVideoId(id) {
      var img = new Image();
      img.src = "http://img.youtube.com/vi/" + id + "/mqdefault.jpg";
      img.onload = function () {
        checkThumbnail(this.width);
      }
	  }    

	function checkThumbnail(width) {
		//HACK a mq thumbnail has width of 320.
		//if the video does not exist(therefore thumbnail don't exist), a default thumbnail of 120 width is returned.
		if (width === 120) {
			alert("Error: ID video không hợp lệ");
		} else {
      $("#submit_form").submit();
    }
	}
</script>
<!-- //  ./../img/icon_page/icon_page.png  -->