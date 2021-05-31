<link rel="stylesheet" href="../public/css/detail_page/boostrap.css">
<link rel="stylesheet" href="../public/css/detail_page/style.css">
<link rel="stylesheet" href="../public/css/detail_page/uploaded_page.css">
<link rel="stylesheet" href="../public/fontawesome-free-5.15.3-web/css/all.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
<head>
<title>Manage</title>
<link rel="icon"
        href="https://64.media.tumblr.com/6c894cfef11f03c37c2688cedd03c508/tumblr_on8i9klcVA1uti1rro7_400.png">
</head>
<?php 
require_once ('../db/dbhelper.php');
include_once('./../common/utility.php');
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
}

?>
<?php
if (isset($_SESSION['user'])) {
$userdetail = <<< EOD
          <div class="up_container">

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="../main/" class=" navbar-brand ">
              <img src="https://64.media.tumblr.com/6c894cfef11f03c37c2688cedd03c508/tumblr_on8i9klcVA1uti1rro7_400.png"
                class="up_logo-page" />
              <div class="up_logo-name">Trung's YOUTUBE</div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <form class="form-inline my-2 my-lg-0">
                <div class="up_search-container" style="cursor: not-allowed;">
                  <i class="fas fa-search search_icon"></i>
                  <input class="form-control mr-sm-2 search_input" type="search" style="border: none; cursor: not-allowed;" placeholder="Tìm kiếm trên kênh của bạn">
                </div>
              </form>
              <div class="up_create-container">
                <button class=" btn-active crip_animate" id="modal_btn" style="position: relative;">
                  <i class="fas fa-video bx"></i>
                  <span class="bx ">Tạo</span>
                </button>
              </div>
              <div class="up_user-avatar_nav">
                <img src="../img/$useravatar" class="up_user-avatar" alt="" onclick="up_dropDown_nav()">
                <div id="up_dropDown" class="up_dropdown-content">
                  <div class="up_dropdown-userinfo">
                    <div class="up_dropdown-user-avatar">
                      <img src="../img/$useravatar" class="up_user-avatar-dropdown" alt="">
                    </div>
                    <div class="up_dropdown-user-name">
                      $username
                    </div>
                  </div>
                  <div class="up_dropdown-options">
                    <a href="../common/channel_user/channel.php?id=$id">
                      <div class="up_icon">
                        <div>
                          <i class="up_dropdown-options-icon far fa-user-circle"></i>
                        </div>

                        <div style="margin-left: 10px;">Kênh của bạn</div>
                      </div>
                    </a>
                  </div>
                  <div class="up_dropdown-options">
                    <a href="../main/">
                      <div class="up_icon">
                        <div>
                          <img
                            src="https://64.media.tumblr.com/6c894cfef11f03c37c2688cedd03c508/tumblr_on8i9klcVA1uti1rro7_400.png"
                            class="up_dropdown-options-icon" />
                        </div>

                        <div style="margin-left: 10px;">Trung's YOUTUBE</div>
                      </div>
                    </a>
                  </div>
                  <div class="up_dropdown-options">
                    <a href="../common/account_manage/progressLogout.php">
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

          <div class="main-content_container container-fluid">
            <div class="row">
              <div class="side_container col-xl-2 col-sm-1">
                <div class="side-inner_container">
                  <div class="side-inner_userinfo">
                    <div class="user_avatar">
                      <a href="../common/channel_user/channel.php?id=$id"><img src="../img/$useravatar" alt=""></a>
                    </div>
                    <div class="user_title">
                      Kênh của bạn
                    </div>
                    <div class="user_name">
                      $username
                    </div>
                  </div>
                  <div class="side-inner_options">
                    <ul class="sidebar-options-first">
                      <li class="sidebar-options__item">
                        <a href="#" class="sidebar-options__link">
                          <span class="sidebar-options__icon">
                            <i class="fas fa-grip-vertical"></i>
                          </span>
                          <span class="sidebar-options__name">Trang tổng quan</span>
                        </a>
                      </li>

                      <li class="sidebar-options__item selected">
                        <a href="#" class="sidebar-options__link">
                          <span class="sidebar-options__icon">
                            <i class="fab fa-youtube"></i>
                          </span>
                          <span class="sidebar-options__name ">Nội dung</span>
                        </a>
                      </li>

                      <li class="sidebar-options__item">
                        <a href="#" class="sidebar-options__link">
                          <span class="sidebar-options__icon">
                            <i class="fas fa-comment-dots"></i>
                          </span>
                          <span class="sidebar-options__name">Bình luận</span>
                        </a>
                      </li>
                      <li class="sidebar-options__item">
                        <a href="#" class="sidebar-options__link">
                          <span class="sidebar-options__icon">
                            <i class="fas fa-dollar-sign"></i>
                          </span>
                          <span class="sidebar-options__name">Kiếm tiền</span>
                        </a>
                      </li>
                    </ul>
                    <ul style="padding: 0;">
                      <li class="sidebar-options__item">
                        <a href="#" class="sidebar-options__link">
                          <span class="sidebar-options__icon">
                            <i class="fas fa-cog"></i>
                          </span>
                          <span class="sidebar-options__name">Cài đặt</span>
                        </a>
                      </li>
                      <li class="sidebar-options__item">
                        <a href="#" class="sidebar-options__link">
                          <span class="sidebar-options__icon">
                            <i class="fas fa-gavel"></i>
                          </span>
                          <span class="sidebar-options__name">Gửi phản hồi</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="main_container col-xl-10 col-sm-11">
                <div class="main_title-container">
                  <div class="main_title">
                    Nội dung của kênh
                  </div>
                </div>
                <div class="main_videos">
                  <div class="videos_sort">
                    <div class="videos_sort-container">
                      <div class="videos_sort-icon">
                        <button>
                          <i class="fas fa-filter"></i>
                        </button>
                      </div>
                      <div class="videos_sort-input">
                        <form action="#" class="videos_sort-form">
                          <input type="text" class="videos_sort-value" value="" placeholder="Lọc">
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="videos-content-header" id="videos-content_actions">
                    <div class="videos-content-sort_box" id="isCheckedLength">
                      Đã chọn tất cả
                    </div>
                    <div class="videos-content-sort_box">
                      Chỉnh sửa
                      <div class="videos-content-sort_icon">
                        <i class="fas fa-caret-down"></i>
                      </div>
                    </div>
                    <div class="videos-content-sort_box">
                      Thêm vào danh sách phát
                      <div class="videos-content-sort_icon">
                        <i class="fas fa-caret-down"></i>
                      </div>
                    </div>
                    <div class="videos-content-sort_box">
                      <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                          data-toggle="dropdown">
                          Thao tác khác

                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="close">&times;</button>
                  </div>
                  <div class="videos-content">
                    <div class="videos-content-title">
                      <div class="videos-content-box">
                        <input type="checkbox" id="checkbox-all" name="courseAll">
                      </div>
                      <div class="videos-content-box-g title video">Video</div>
                      <div class="videos-content-box title day">Ngày</div>
                      <div class="videos-content-box title view">Số lượt xem</div>
                      <div class="videos-content-box title comment">Số lượt bình luận</div>
                      <div class="videos-content-box title like">Số lượt thích</div>
                    </div>
                    <div>
        EOD;
        echo $userdetail;
}
?>
                <?php
                  if (isset($_SESSION['user'])) {
                    $limit = 30;
                    $page  = 1;
                    if (isset($_GET['page'])) {
                      $page = $_GET['page'];
                    }
                    if ($page <= 0) {
                      $page = 1;
                    }
                    $firstIndex = ($page-1)*$limit;

                    $sql = "SELECT * FROM video WHERE video.user_id = ".$_SESSION['user'];
                    $sql .= " ORDER BY created_at DESC".' limit '.$firstIndex.', '.$limit;;
                    $video = executeResult($sql);

                    $sql         = 'select count(id) as total from video where 1 ';
                    $countResult = executeSingleResult($sql);
                    $number      = 0;
                    if ($countResult != null) {
                      $count  = $countResult['total'];
                      $number = ceil($count/$limit);
                    }

                    $index = 1;
                    $db = mysqli_connect("localhost", "root", "", "cloneyoutube");
                    $rs = mysqli_query($db,$sql);
                    if (mysqli_num_rows($rs) > 0) {
                        foreach ($video as $item) {
                          $videos = <<< EOD
                            <div class="videos-content-main">
                            <div class="videos-content-box">
                              <input type="checkbox" class="checkbox-all" name="courseId[]" value="{$item['id']}">
                            </div>
                            <div class="videos-content-box-g video">
                              <div class="video-content_video">
                              <div class="video-content_thumbnail">
                                <img src="https://img.youtube.com/vi/{$item['video_id']}/sddefault.jpg" class="video-content_video-img" alt="404 Not Found">
                              </div>
                              <div class="video-content_name">
                                <div>

                                </div>
                              </div>
                              </div>
                            </div>
                            <div class="time" style="display: none;" data-value="{$item['created_at']}"></div>
                            <span class="videos-content-box day createTime"></span>
                            <div class="videos-content-box view">{$item['view_count']}</div>
                            <div class="videos-content-box comment">Số lượt bình luận</div>
                            <div class="videos-content-box like">{$item['like_count']}</div>
                            </div>
                          EOD;
                        echo $videos;
                        }
                    } else {
                      echo "<div style='display: flex; justify-content: center;'> Bạn chưa đăng video nào!!! </div>";
                    }
                  }
                ?>
<?php 
$div =<<<EOD
        </div>
      </div>
    </div>

  </div>
  EOD;
  echo $div;
?>


<section class="cards cards_pagination">
    <?=paginarion($number, $page, '')?>
</section>

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

        <form class="mt-4" method="POST" id="submit_form" action="channel_user/progressUp.php">
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

<script>
  Validator({
    form: '#submit_form',
    formGroupSelector: '.form-group',
    errorSelector: '.form__input-error-message',
    rules: [
      Validator.isRequired('#name'),
      Validator.isRequired('#description'),
      Validator.isRequired('#videoId'),
      Validator.minLength('#name', 12),


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
  document.addEventListener('DOMContentLoaded', function () {
    var courseId;
    var deleteForm = document.forms['delete-course-form'];
    var checkboxAll = $('#checkbox-all');
    var courseItemCheckbox = $('input[name="courseId[]"]')
    var checkboxDo = $('.btn-check-box');
    var containerForm = document.forms['container-form'];
    var optionsBox = document.getElementById("videos-content_actions");

    $('#delete-course').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      courseId = button.data('id');
    });

    // var btnDeleteCourse = document.getElementById('btn-delete-course');
    // btnDeleteCourse.onclick = function () {
    //   deleteForm.action = '/courses/' + courseId + '?_method=DELETE';
    //   deleteForm.submit();
    // }


    checkboxAll.change(function () {
      var isCheckedAll = $(this).prop('checked');
      courseItemCheckbox.prop('checked', isCheckedAll);
      var IsChecked = $('input[name="courseAll"]:checked').length > 0;
      var IsCheckedLength = document.getElementById("isCheckedLength");
      if (IsChecked) {
        optionsBox.classList.add("show-options");
        IsCheckedLength.innerText = "Đã chọn tất cả video";
      } else {
        optionsBox.classList.remove("show-options");
      }
      renderCheckAllSubmitBtn();
    });


    courseItemCheckbox.change(function () {
      var isCheckedArray = courseItemCheckbox.length === $('input[name="courseId[]"]:checked').length;
      checkboxAll.prop('checked', isCheckedArray);

      var atLeastOneIsChecked = $('input[name="courseId[]"]:checked').length > 0;
      var IsCheckedLength = document.getElementById("isCheckedLength");
      if (atLeastOneIsChecked) {
        optionsBox.classList.add("show-options");
        IsCheckedLength.innerText = "Đã chọn " + $('input[name="courseId[]"]:checked').length;
      } else {
        optionsBox.classList.remove("show-options");
      }
      renderCheckAllSubmitBtn();
    });
    checkboxDo.click('submit', function (e) {
      var isSubmittable = !$(this).hasClass('disabled');
      if (!isSubmittable) {
        e.preventDefault();
      }
    });
    function renderCheckAllSubmitBtn() {
      var checkedCount = $('input[name="courseId[]"]:checked').length;
      if (checkedCount > 0) {
        checkboxDo.removeClass('disabled');
      } else {
        checkboxDo.addClass('disabled');
      }
    }
  });
</script>

<!-- <script>
  $('.dropdown-toggle').dropdown()
</script> -->


<!-- //  https://64.media.tumblr.com/6c894cfef11f03c37c2688cedd03c508/tumblr_on8i9klcVA1uti1rro7_400.png  -->