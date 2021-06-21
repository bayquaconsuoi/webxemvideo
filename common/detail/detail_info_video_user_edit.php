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

session_start();
if (!empty($_SESSION['user'])) {
  $user = $_SESSION['user'];
} else {
  header("location: ../../main/");
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
          <i class="fas fa-search search_icon" style="cursor: default;"></i>
          <div class="search_content">
            <input class="form-control mr-sm-2 search_input" id="search_input" name="search_input" type="search" style="border: none;" placeholder="Tìm kiếm trên kênh của bạn">

          </div>
        </div>
        <div class="list-group" id="result"></div>

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
            <a href="../../common/channel_user/videos.php?id=$id">
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
<?php
  $sql = "select * from video where !deleted_at and id =".$_GET['video_id'];
  $item = executeSingleResult($sql);
?>
    <div class="main-content_container container-fluid">
    <div class="row m_row">
      <div class="side_container col-xl-2 col-sm-1">
        <div class="side-inner_container">
        <div class="side-inner_back_btn">
          <a href="detail_info_video_user.php" style="display: flex;">
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
            <a class="middle_link" href="../main/watch_video.php?id=<?php echo $item['id'] ?>">
              <img src="https://img.youtube.com/vi/<?php echo $item['video_id'] ?>/mqdefault.jpg" alt="">
              <div class="middle">
                <div class="middle_text"><img class="super_mini" src="../../img/icon_page/icon_page.png" alt=""><div>Xem trên Trung's YOUTUBE</div></div>
              </div>
            </a>
            </div>
            <div class="video_title">
              Video của bạn
            </div>
            <div class="video_name">
              <?php echo $item['tenvideo'] ?>
            </div>
            <div class="video_name">
              Ngày đăng: <?php echo $item['created_at'] ?>
            </div>
            <div class="video_name">
              Lượt xem: <?php echo $item['view_count'] ?>
            </div>
            <div class="video_name">
              Lượt thích: <?php echo $item['like_count'] ?>
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
            <div class="side-main_cancel" id="side-main_cancel" onClick="refreshPage()">

                <button type="button" disabled>Hủy thay đổi</button>

            </div>
            <div class="side-main_save" id="side-main_save">
              <button disabled id="submit_edit_video">Lưu</button>
              <span class="tooltiptext">Bạn phải xử lý lỗi xong thì mới có thể lưu</span>
            </div>
          </div>

        </div>
        <div class="main_title-container  edit-main-container">
            <div class="form-container">
              <form action="progressEditVideo.php?id=<?php echo $item['id'] ?>" method="POST" id="edit-video_form" class="edit-video_form">
                <div class="form_content-main-container">
                  <div class="form_content-input-container">

                      <label for="videoname_edit">Tiêu đề</label>
                      <textarea name="videoname_edit" id="videoname_edit" maxlength="100" placeholder="Thêm tiêu đề để mô tả video của bạn"><?php echo $item['tenvideo'] ?></textarea>
                      <div id="videoname_edit_count">

                      </div>
                      <div class="form__input-error-message"></div>

                  </div>
                  <div class="form_content-input-container" style="margin-top: 10px;">

                      <label for="description_edit">Mô tả</label>
                      <textarea name="description_edit" id="description_edit" maxlength="5000" placeholder="Giúp người xem nắm được thông tin về video của bạn"><?php echo $item['mota'] ?></textarea>
                      <div id="description_edit_count">
                        
                      </div>
                      <div class="form__input-error-message"></div>

                  </div>

                  <div class="form_content-input-container" style="margin-top: 4px;">

                    <label for="category_edit">Thể loại</label>       
                        <select id="category_edit" name="category_edit" required>
                                    <?php 
                                         $sql = "select * from category";
                                         $category = executeResult($sql);
                                         $category_selected = <<< EOD
                                            <option value="{$item['category']}" selected hidden>{$item['category']}</option>
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
                <div class="form_content-preview-container">
                  <div class="iframe">
                    <iframe width="352" height="198" src="https://www.youtube.com/embed/<?php echo $item['video_id'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                  <div class="iframe_info">
                      <div class="iframe_title_title" id="iframe_title_title"><?php echo $item['tenvideo'] ?></div>
                      <div class="iframe_title_description" id="iframe_title_description"><?php echo $item['mota'] ?></div>
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
              <textarea class="form-control" id="name" maxlength="100" name="name"></textarea>
              <div id="name_count">

              </div>
              <div class="form__input-error-message"></div>
            </div>

            <div class="form-group">
              <label for="description">Mô tả</label>
              <textarea class="form-control" id="description" maxlength="5000" name="description"></textarea>
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
              <select name="category" id="category" required>
              <option value="" selected disabled hidden>Chọn thể loại</option>
              <?php 
                  $sql = "select * from category";
                  $data_category = executeResult($sql);
                  foreach($data_category as $category_mini) {
                      $category = <<<EOD
                        <option value="{$category_mini['category_name']}">{$category_mini['category_name']}</option>
                      EOD;
                      echo $category;
                  }
              ?>
              </select>
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
    var search_field = document.getElementById("result");
  window.onclick = function(event) {
    if (!event.target.matches('.up_user-avatar')) {
      var drop_down_avatar = document.getElementById("up_dropDown");
      drop_down_avatar.classList.remove("show");
    }
    var modal = document.getElementById("upload_modal");
    if (event.target == modal) {
      modal.style.display = "none";
    }

    if(event.target.matches('#videoname_edit')||event.target.matches('#description_edit')||event.target.matches('#category_edit')){
        $('#videoname_edit').on('input', function() {
          $('#side-main_cancel').addClass("enable_btn");
          $('#side-main_cancel button').attr('disabled', false);
          if($('#description_edit').val().length < 5 || $('#videoname_edit').val().length < 5){
            $('#side-main_save').removeClass("enable_btn");
            $('#side-main_save button').attr('disabled', true);
          } else {
            $('#side-main_save').addClass("enable_btn");
            $('#side-main_save button').attr('disabled', false);
          }
        });

        $('#description_edit').on('input', function() {
          $('#side-main_cancel').addClass("enable_btn");
          $('#side-main_cancel button').attr('disabled', false);
          if($('#description_edit').val().length < 5 || $('#videoname_edit').val().length < 5){
            $('#side-main_save').removeClass("enable_btn");
            $('#side-main_save button').attr('disabled', true);
          } else {
            $('#side-main_save').addClass("enable_btn");
            $('#side-main_save button').attr('disabled', false);
          }
        });

        $('#category_edit').on('input', function() {
          $('#side-main_cancel').addClass("enable_btn");
          $('#side-main_cancel button').attr('disabled', false);
          if($('#description_edit').val().length < 5 || $('#videoname_edit').val().length < 5){
            $('#side-main_save').removeClass("enable_btn");
            $('#side-main_save button').attr('disabled', true);
          } else {
            $('#side-main_save').addClass("enable_btn");
            $('#side-main_save button').attr('disabled', false);
          }
        });
    }
  }
  setTimeout(function() {
    $('#notify_modal_id').addClass('notify_modal_hide');
  }, 3500);
  function refreshPage(){
    window.location.reload();
} 
</script>

<script>
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
    $("#videoname_edit").keyup(function () {
      var des_value = $(this).val();
      $("#iframe_title_title").text(des_value);
      $("#videoname_edit_count").text($(this).val().length + "/100");
    });
    $("#description_edit").keyup(function () {
      var des_value = $(this).val();
      $("#iframe_title_description").text(des_value);
      $("#description_edit_count").text($(this).val().length + "/5000");
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
      Validator.isRequired('#category'),
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
$("#submit_edit_video").click(function() {
  $("#edit-video_form").submit();
})
</script>
<!-- SEARCH AJAX -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"../ajaxliveSearch.php?where=edit",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_input').keyup(function(){
  var search = $(this).val();
  if($(this).val().length > 0){
    search_field.style.display = "block";
  }

  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
<!-- //  ./../img/icon_page/icon_page.png  -->