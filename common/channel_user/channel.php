<link rel="stylesheet" href="../../public/css/modal.css">
<link rel="stylesheet" href="../../public/css/header.css">
<link rel="stylesheet" href="../../public/css/main.css">
<link rel="stylesheet" href="../../public/css/channel.css">
<link rel='stylesheet' href='https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css'>
<link rel="stylesheet" href="../../public/fontawesome-free-5.15.3-web/css/all.min.css">
<?php session_start(); ?>


<?php
require_once ('../../db/dbhelper.php');
$id = '';
//channel nguoi khac
if (isset($_GET['id'])) {
    $id      = $_GET['id'];
    $sql     = 'select * from account where id = '.$id;
    $account = executeSingleResult($sql);
}
include('../sidebar_channel.php'); 
if (!empty($_SESSION['user'])) {
  $user = $_SESSION['user'];
    //Truy van database
    $sql = "select * from account where id = '$user'";
    $info_user = executeSingleResult($sql);
    if ($info_user != null) {
    $id = $info_user['id'];  
    $username = $info_user['user_name'];
    $email   = $info_user['email'];
    $phone = $info_user['phone'];
    $useravatar = $info_user['user_avatar'];
    }
}
?>
<header class="header">
  <div class="header-left">
    <button class="header-menu-btn btn-active">
    <i class="fas header-icon fa-bars"></i>
    </button>
    <div class="icon_page">
      <a href="../../main">
        <img src="../../img/icon_page/icon_page.png"
          alt="" class="header-logo">
        <div class="icon_page-name">
          <span>Trung's YOUTUBE</span>
        </div>
      </a>
    </div>
  </div>

  <div class="header-center">
    <form method="GET" action="../../common/main/search_video.php">
      <div class="header-search">
        <input class="header-search-input" type="search" placeholder="Tìm kiếm" aria-label="Search" name="name"
          required>
        <select name="action" class="header-search-input_options">
          <option value="videoName" class="header-search-btn">Tìm theo tên video</option>
          <option value="userName" class="header-search-btn">Tìm theo tên người đăng</option>
        </select>
        <button class="header-search-btn" type="submit"><i class="fas header-icon fa-search"></i></button>
      </div>

    </form>
  </div>

<!-- <button class="header-notifications-btn btn-active">
        <div class="btn-bgc"></div>
        <i class="fas header-icon fa-bell"></i>
    </button> -->
  <div class="header-right">
  <?php 
  if (isset($_SESSION['user'])) {
            $user = <<< EOD
              <a class="header-create-btn btn-active" href="../../common/detail_info_page.php?up" id="myForm">
                <div class="btn-bgc"></div>
                <i class="fas header-icon fa-video"></i>
              </a>

              <div class="dropdown">
                <img onclick="avatar_dropDown()" src="../../img/$useravatar" alt="" class="dropbtn circular_image" id="user_avatar"
                style="margin-right: 8px;">
                <div class="dropdown-content dropdown-content_header" id="avatar_dropdown_container">
                <div class="dropdown-content_inner">
                  <div class="content_userinfo">
        
                    <div>
                      <a href="#"><img src="../../img/$useravatar" alt=""
                          class="dropDown-avatar circular_image circular_image-header" style="width: 90px; height: 80px; border-radius: 50%;"></a>
                    </div>
                    <div class="content-text">
                      <span class="dropDown-text-UserName">$username</span>
                      <span class="dropDown-text">$email</span>
                    </div>
        
                  </div>
                  <hr>
                  <div class="content_options">
                    <a class="sidebar-options__link" href="../channel_user/channel.php?id=$id">
                      <span class="sidebar-options__icon">
                        <i class="far fa-user-circle"></i>
                      </span>
                      <span class="sidebar-options__name">Kênh của bạn</span>
                    </a>
        
                    <a class="sidebar-options__link" href="../account_manage/progressLogout.php">
                      <span class="sidebar-options__icon">
                        <i class="fas far fa-sign-out-alt"></i>
                      </span>
                      <span class="sidebar-options__name">Đăng xuất</span>
                    </a>
                  </div>
                </div>
                </div>
              </div>
            EOD;
            echo $user;
          }
  else {
            $Un_user = <<< EOD
            <div class="container-signIn">
              <div class="sidebar-options-login">
                <a type="button" class="sidebar-options-login-link" href="../account_manage/manage.php">
                  <div class="sidebar-options-login-link_container sidebar-options-login-link_out-container">
                    <i class="far fa-user-circle"></i>
                    <button class="sidebar-options-login-button">Đăng nhập</button>
                  </div>
                </a>
              </div>
            </div>
            EOD;
            echo $Un_user;
          }
        ?>
  </div>

</header>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
  function avatar_dropDown() {
    document.getElementById("avatar_dropdown_container").classList.toggle("show");
  }
</script>
<!-- /Header -->

<section class="cards channel-cards">
    <div class="info_container">
        <div class="info_user">
        <?php
        if (!empty($_SESSION['user'])) {
            $user = $_SESSION['user'];

            if((isset($_GET['id']))&&($user!=$_GET['id'])){
                $userchannel_ofc = <<< EOD
                    <div class="user_information-ofc">
                        <div class="user-avatar_container">
                            <img src="../../img/{$account['user_avatar']}" alt="" class="user-avatar_info">
                        </div>
                        <div class="user-name_container">
                            <div class="user-name">
                                <span>
                                    <span style="font-size: 2.9rem;">{$account['user_name']}</span> <br>
                                    65 người đăng ký
                                </span>
                            </div>
                        </div>
                    </div>
                EOD;
                echo $userchannel_ofc;
            } else if((isset($_GET['id']))&&($user==$_GET['id'])) {
                $Un_userchannel = <<< EOD
                <div class="user_infomation">
                    <div class="user-avatar_container">
                        <img src="../../img/{$account['user_avatar']}" alt="" class="user-avatar_info">
                        <div class="avatar_hover">
                            <button id="update_avatar">
                                <i class="fas fa-camera "></i>
                            </button>
                        </div>
                    </div>
                    <div class="user-name_container">
                        <div class="user-name">
                            <span>
                                <span style="font-size: 2.9rem;">{$account['user_name']}</span> <br>
                                65 người đăng ký
                            </span>
                        </div>
                    </div>
                    <div class="user-container_2">
                        <div class="user_settings_container" style="padding-left: 84px;">
                            <div class="user_settings">
                                <button><a href="../detail_info_page.php">Quản lý Video</a></button>
                            </div>
                        </div>

                    </div>
                </div>
                EOD;
                echo $Un_userchannel;
            } else {
                $userchannel_ofcs = <<< EOD
                    <div class="user_information-ofc">
                        <div class="user-avatar_container">
                            <img src="../../img/{$account['user_avatar']}" alt="" class="user-avatar_info">
                        </div>
                        <div class="user-name_container">
                            <div class="user-name">
                                <span>
                                    <span style="font-size: 2.9rem;">{$account['user_name']}</span> <br>
                                    65 người đăng ký
                                </span>
                            </div>
                        </div>
                    </div>
                EOD;
                echo $userchannel_ofcs;
            }
        } else {
            $userchannel_ofcss = <<< EOD
                    <div class="user_information-ofc">
                        <div class="user-avatar_container">
                            <img src="../../img/{$account['user_avatar']}" alt="" class="user-avatar_info">
                        </div>
                        <div class="user-name_container">
                            <div class="user-name">
                                <span>
                                    <span style="font-size: 2.9rem;">{$account['user_name']}</span> <br>
                                    65 người đăng ký
                                </span>
                            </div>
                        </div>
                    </div>
                EOD;
                echo $userchannel_ofcss;
        }
        ?>

        </div>
        <div class="info_options">
            <div class="tags-container">
                <ul class="tags">
                    <li class="tag">
                        <a href="../../common/channel_user/channel.php?id=<?php echo $_GET['id'] ?>" class="tag-link selected-tag">Trang chủ</a>
                    </li>
                    <li class="tag">
                        <a href="../../common/channel_user/videos.php?id=<?php echo $_GET['id'] ?>" class="tag-link">Video</a>
                    </li>
                    <li class="tag">
                        <a href="#" class="tag-link playlist">Danh sách phát</a>
                    </li>
                    <li class="tag">
                        <a href="#" class="tag-link communication">Thảo luận</a>
                    </li>
                    <li class="tag">
                        <a href="#" class="tag-link about">Giới thiệu</a>
                    </li>
                </ul>


            </div>
        </div>
        <div id="featured">
            <div class="fea-container">
                <div class="fea-title">
                    <span> <a class="fea-title_link" href="../../common/channel_user/videos.php?id=<?php echo $_GET['id'] ?>"> Video tải lên </a> </span>
                </div>
                <div class="fea-videos">
                    <!-- {{#each courses}} -->
                    <?php
                        if(isset($_GET['id'])){
                            $sql = "SELECT * FROM video WHERE !deleted_at AND video.user_id = ".$account['id'];
                            $sql .= " ORDER BY created_at DESC";
                            $video = executeResult($sql);
                            $db = mysqli_connect("localhost", "root", "", "cloneyoutube");
                            $rs = mysqli_query($db,$sql);
                            if (mysqli_num_rows($rs) > 0) {
                                foreach ($video as $item) {
                                    $channel_video = <<< EOD
                                        <div class="fea-mini-video wow fadeIn">
                                            <div class="fea-mini-video_container">
                                                <a href="../../common/main/watch_video.php?id={$item['id']}">
                                                    <div class="fea-video-link">
                                                        <div class="fea-mini-video-watch" style="overflow: hidden;">
                                                            <img src="https://img.youtube.com/vi/{$item['video_id']}/mqdefault.jpg" class="fea-video-img" style="margin: -2% 0; " alt="">
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="../../common/main/watch_video.php?id={$item['id']}">
                                                    <div class="fea-video-info">
                                                        <div class="fea-mini-video-detail">
                                                            <h1 class="fea-video-description">
                                                                {$item['tenvideo']}
                                                            </h1>
                                                            <h3 class="fea-video-description-views">
                                                                {$item['view_count']} lượt xem
                                                                <div class="time" style="display: none;" data-value="{$item['created_at']}">
                                                                </div>
                                                                <span class="card-date createTime" style="margin-left: 10px;"></span>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </a>
                                            
                                    EOD;
                                    echo $channel_video;
                                    if (!empty($_SESSION['user'])) {
                                        $user = $_SESSION['user'];
                                            $video_3 = <<<EOD
                                                        <div class="fea-video-options">
                                                            <div class="dropbtn fea-dropdown">
                                                                <button class="fea-dropbtn"><i class="fas fa-ellipsis-v"></i></button>
                                                                <div class="dropdown-content fea-dropdown-content">
                                                                    <ul class="fea-sidebar-options">
                                                                        <li class="fea-sidebar-options__item">
                                                                            <a href="../../common/main/progressLater.php?user_id=$user&video_id={$item['id']}&type=add" class="sidebar-options__link">
                                                                                <span class="sidebar-options__icon">
                                                                                    <i class="fas fa-stream"></i>
                                                                                </span>
                                                                                <span class="sidebar-options__name">Thêm vào Video đã lưu</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            EOD;
                                            echo $video_3;
                                    } else{
                                            $video_4 =<<<EOD
                                                        <div class="fea-video-options">
                                                            <div class="fea-dropdown">
                                                            <button class="modal_btn_need_login"><i class="fas fa-ellipsis-v"></i></button>
                                                                <div class="modal_need_login" style="width: 315px;" id="modal_like">
                                                                    <div class="modal_need_login-content">
                                                                        <div class="modal-text-container">
                                                                            <div class="modal-text-title">
                                                                                Đăng nhập để sử dụng chức năng này
                                                                            </div>
                                                                        </div>
                                                                        <div style="width: auto; display: block; border-top: 1px solid #e0e0e0;">
                                                                            <button class="modal-button" style="padding: 10px;">
                                                                                <a href="../../common/account_manage/manage.php">Đăng nhập</a>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            EOD;
                                            echo $video_4;
                                    }
                                }
                            } else {
                                $isNull = <<< EOD
                                <div >
                                    Kênh này chưa đăng video nào.
                                </div>
                            EOD;
                            echo $isNull;
                            }
                        }
                    ?>
                    <!-- {{/each}} -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- The Modal -->
<div id="avatar-Modal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <div class="img_hide" id="hide_container">
            <img class="img-content circular_image_channel" id="hide" alt="">
        </div>
        <div class="img_current" id="unhide_container">
            <img class="img-content circular_image_channel" id="current" src="../../img/<?php echo $useravatar?>" alt="">
        </div>

        <div class="img_form">
            <form action="progressUp.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file_upload" class="custom-file-upload">
                        <i class="fas fa-file-upload"></i> Chọn ảnh từ thiết bị
                    </label>
                    <input accept="image/*" type='file' id="file_upload" name="avatar" />
                </div>
                <div class="form_options">
                    <button type="submit" class="form_button close accept_btn not_allow" id="acceptBtn" disabled>Xác
                        nhận</button>
                    <button type="button" class="form_button close close_btn">Hủy</button>
                </div>

            </form>
        </div>
    </div>

</div>

<!-- The Modal IMG CURRENT-->
<div id="myModal_current" class="modal_img">

    <!-- The Close Button -->
    <span class="close-img_btn" id="abc">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal_img-content " id="img01">

</div>

<!-- The Modal IMG REPLACE-->
<div id="myModal_hide" class="modal_img">

    <!-- The Close Button -->
    <span class="close-img_btn" id="xyz">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal_img-content " id="img02">

</div>

<div class="toggle">
    <label for="toggle-input" class="toggle-wrapper">
        <input id="toggle-input" class="toggle__input" type="checkbox">
        <div class="toggle__bar"></div>
    </label>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="../../public/js/moment.js"></script>
<script src="../../public/js/modal.js"></script>
<script src="../../public/js/upload.js"></script>
<script src="../../public/js/w3s.js"></script>
<script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>
<script>
        new WOW().init();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var x = document.querySelectorAll('.time');
        var z = document.getElementsByClassName('createTime')
        for (i = 0; i < x.length; i++) {
            var y = new Date(x[i].getAttribute("data-value"));
            var month = y.getMonth() + 1;
            var today = new Date;
            var a = moment(y).fromNow();
            z[i].innerHTML = a;
        }
    });
    $(document).ready(function () {

    $('.fea-dropdown').addClass("hidden");

    $('.fea-dropdown').click(function () {
        var dropdowns = document.getElementsByClassName("fea-dropdown");
        var dots = document.getElementsByClassName('fea-video-options');
        var $this = $(this);
        var i, j, k, l;
        for (i = 0; i < dropdowns.length; i++) {
            var dropdownContent = dropdowns[i];
            var removeDot = dots[i];
            removeDot.classList.remove('noHover');
            dropdownContent.classList.remove('visible');

        }
        if ($this.hasClass("hidden")) {
            $(this).removeClass("hidden").addClass("visible");
            $(this).parent().addClass("noHover");
            for (j = 0; j < dropdowns.length; j++) {
                var dropdownContent = dropdowns[j];

                if (!dropdownContent.classList.contains('visible')) {
                    dropdownContent.classList.add('hidden');
                }

            }
        } else {
            $(this).removeClass("visible").addClass("hidden");
            for (l = 0; l < dots.length; l++) {
                var dotsContent = dots[l];
                if (dotsContent.classList.contains('noHover')) {
                    dotsContent.classList.remove('noHover');
                }
            }

        }

    });

    });

</script>

<script>
$('a.playlist').click(function() { return false; });
$('a.communication').click(function() { return false; });
</script>
<script>
    window.onclick = function (event) {
        if(!event.target.matches('#user_avatar')){
            document.getElementById("avatar_dropdown_container").classList.remove("show");
        }

        if(event.target.matches('#avatar-Modal')){
            var modal = document.getElementById("avatar-Modal");
            modal.style.display = "none";
        }
        // if (!event.target.matches('.dropdown')) {
        //     var dropdowns = document.getElementsByClassName("dropdown-content");

        //     var i;
        //     for (i = 0; i < dropdowns.length; i++) {
        //         var openDropdown = dropdowns[i];
        //         if (openDropdown.classList.contains('show')) {
        //             openDropdown.classList.remove('show');
        //         }
        //     }

        // }

        if (!event.target.matches('.fa-ellipsis-v')) {
            var fea_dropdown = document.getElementsByClassName("fea-dropdown");
            var j;
            for (j = 0; j < fea_dropdown.length; j++) {
                var openDropdown2 = fea_dropdown[j];
                if (openDropdown2.classList.contains('visible')) {
                    openDropdown2.classList.remove('visible');
                    openDropdown2.classList.add('hidden');
                }
            }
            var x = document.getElementsByClassName('fea-video-options');
            var i;
            for (i = 0; i < x.length; i++) {
                var removeDot = x[i];
                if (removeDot.classList.contains('noHover')) {
                    removeDot.classList.remove('noHover');
                }
            }

        }
    }
    setTimeout(function(){
        $('.notify').remove();
    }, 5001);
</script>
