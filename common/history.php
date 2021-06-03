<link rel="stylesheet" href="../public/css/modal.css">
<link rel="stylesheet" href="../public/css/header.css">
<link rel="stylesheet" href="../public/css/main.css">
<link rel="stylesheet" href="./../public/css/playlist_page/playlist.css">
<link rel='stylesheet' href='https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css'>
<link rel="stylesheet" href="../public/fontawesome-free-5.15.3-web/css/all.min.css">
<?php session_start(); ?>


<?php
require_once ('../db/dbhelper.php');
// $id = '';
// //channel nguoi khac
// if (isset($_GET['id'])) {
//     $id      = $_GET['id'];
//     $sql     = 'select * from account where id = '.$id;
//     $account = executeSingleResult($sql);
// }

include('sidebar_playlist.php');

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
      <a href="../main">
        <img src="./../img/icon_page/icon_page.png"
          alt="" class="header-logo">
        <div class="icon_page-name">
          <span>Clone YOUTUBE</span>
        </div>
      </a>
    </div>
  </div>

  <div class="header-center">
    <form method="GET" action="../common/main/search_video.php">
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

  <div class="header-right">
  <!-- <button class="header-notifications-btn btn-active">
                <div class="btn-bgc"></div>
                <i class="fas header-icon fa-bell"></i>
              </button> -->
  <?php 
  if (isset($_SESSION['user'])) {
            $user = <<< EOD
              <a class="header-create-btn btn-active" href="../common/detail_info_page.php?up" id="myForm">
                <div class="btn-bgc"></div>
                <i class="fas header-icon fa-video"></i>
              </a>

              <div class="dropdown">
                <img onclick="avatar_dropDown()" src="../img/$useravatar" alt="" class="dropbtn circular_image"
                style="margin-right: 8px;">
                <div class="dropdown-content dropdown-content_header" id="avatar_dropdown_container">
                <div class="dropdown-content_inner">
                  <div class="content_userinfo">
        
                    <div>
                      <a href="#"><img src="../img/$useravatar" alt=""
                          class="dropDown-avatar circular_image circular_image-header" style="width: 90px; height: 80px; border-radius: 50%;"></a>
                    </div>
                    <div class="content-text">
                      <span class="dropDown-text-UserName">$username</span>
                      <span class="dropDown-text">$email</span>
                    </div>
        
                  </div>
                  <hr>
                  <div class="content_options">
                    <a class="sidebar-options__link" href="./../common/channel_user/channel.php?id=$id">
                      <span class="sidebar-options__icon">
                        <i class="far fa-user-circle"></i>
                      </span>
                      <span class="sidebar-options__name">Kênh của bạn</span>
                    </a>
        
                    <a class="sidebar-options__link" href="./../common/account_manage/progressLogout.php">
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

<section class="cards">

  <div class="container">

    <div class="side_container">
      <div class="side_container-inner">
        <div class="side_container-main">
          <div class="side-video_main" style="overflow: hidden;">
          <?php
            $sql ='SELECT history.video_id_his, video.video_id FROM ((history INNER JOIN video ON history.video_id_his = video.id) INNER JOIN account ON history.user_id_his = account.id) WHERE history.user_id_his = '.$id;
            $sql .= ' ORDER BY history.created_at_his desc LIMIT 1';
            $db = mysqli_connect("localhost", "root", "", "cloneyoutube");
            $rs = mysqli_query($db,$sql);
            if (mysqli_num_rows($rs) > 0) {
            $top_video = executeSingleResult($sql);
              $top =<<<EOD
              <a href="./../common/main/watch_video.php?id={$top_video['video_id_his']}">
                <img src="https://img.youtube.com/vi/{$top_video['video_id']}/mqdefault.jpg" class="side-video_main-img" >
              </a>
              EOD;
            echo $top;
            } else {
              $no_top = <<<EOD
                <img src="https://img.youtube.com/vi/404/mqdefault.jpg" class="side-video_main-img" >
              EOD;
            echo $no_top;
            }
          ?>
            <!-- <div class="side-video_title">
              <i class="fas fa-play"></i>
              <p style="display: inline-block;">Phát tất cả</p>
            </div> -->
          </div>
          <div class="side-video_info">
            <div class="side-video_info-title">
              <div class="side-video_info-title_link">
                <a href="">Lịch sử xem của bạn</a>
              </div>
            </div>
            <div class="side-video_info-stats">
              <div class="side-video_info-stats_inner">
                <span style="color: #7a7a7a;">
                  Lịch sử xem lưu trữ tối đa 30 video
                </span>
              </div>
            </div>
            <div class="side-video_info-personal">
              <div class="side-video_info-personal-box">
                <i class="fas fa-lock"></i> Riêng tư
              </div>
            </div>
            <div class="side-video_info-options">
              <!-- <div>
                <i class="fas fa-random" style="cursor: pointer;"></i>
              </div> -->
              <div class="video_info-drop">
                <i class="fas fa-trash-alt" onclick="video_info_options_dropdown()"
                  style="padding-left: 20px; cursor: pointer;"></i>
                <div id="video_info-dropdown" class="video_info-dropdown-content">
                  <a href="./../common/main/progressHistory.php?type=deleteAll" class="video_info-dropdown-text">
                    <div class="video_info-dropdown-text_container">
                      <div>
                        <i class="fas fa-trash-alt"></i>
                      </div>
                      <div class="video_info-dropdown_text">
                        Xóa tất cả lịch sử xem
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="side-video_user">
              <div class="side-video_user-inner">
                <div class="side-video_user-avatar_container">
                  <a href="./../common/channel_user/channel.php?id=<?php echo $id ?>"><img src="./../img/<?php echo $useravatar ?>" class="side-video_user-avatar" alt=""></a>
                </div>
                <div class="side-video_user-name">
                  <a href="./../common/channel_user/channel.php?id=<?php echo $id ?>" class="side-video_user-link"><?php echo $username ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main_container">
      <div class="main_container-inner">
          <?php
              if (!empty($_SESSION['success'])) {
                $success = $_SESSION['success'];
              }
              if (isset($_SESSION['success'])) {
                $history_success_notify = <<< EOD
                  <div class="alert">
                      $success
                  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                  </div>
                EOD;
                echo $history_success_notify;
                unset($_SESSION['success']);
              }

          ?>
        <div class="main-videos_content-container">
          <?php 
              $sql = 'SELECT history.video_id_his, video.video_id, video.id, video.tenvideo, video.user_name, video.created_at FROM ((history INNER JOIN video ON history.video_id_his = video.id) INNER JOIN account ON history.user_id_his = account.id) WHERE history.user_id_his ='.$id;
              $sql .= " ORDER BY history.created_at_his desc";
              $video = executeResult($sql);
              $i = 0;
              foreach ($video as $item) {
                $i = $i + 1 ;
                $playlist_video = <<< EOD
                  <div class="main-video_content-container">
                    <div class="main-video_content-container_inner">
                      <div class="main-video_index">
                        <div class="main-video_index-content">
                          $i
                        </div>
                      </div>
                    
                      <a href="./../common/main/watch_video.php?id={$item['video_id_his']}">
                        <div class="main-video_main-info">
                    
                          <div class="main-video_img">
                            <div class="main-video_img-content">
                              <img src="https://img.youtube.com/vi/{$item['video_id']}/mqdefault.jpg" class="main-video_image">
                            </div>
                          </div>
                    
                          <div class="main-video_info">
                            <div class="main-video_title-container">
                              <div class="main-video_title">
                                {$item['tenvideo']}
                              </div>
                            </div>
                            <div class="main-video_username-container">
                              <div class="main-video_username">
                                {$item['user_name']}
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    
                      <div class="main-video-options">
                        <div class="main-video_dropdown">
                          <button class="main-video_dropdown-btn"><i class="fas fa-ellipsis-v"></i></i></button>
                          <div id="main-video_dropdown" class="main-viddeo_dropdown-content">
                            <ul class="main-video_sidebar-options">
                              <li class="main-video_sidebar-options__item">
                                <a href="./../common/main/progressHistory.php?user_id=$id&video_id={$item['id']}&type=delete" class="sidebar-options__link">
                                  <span class="sidebar-options__icon">
                                    <i class="fas fa-trash"></i>
                                  </span>
                                  <span class="sidebar-options__name">Xóa video khỏi lịch sử</span>
                                </a>
                              </li>
                            </ul>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                EOD;
                echo $playlist_video;
              }
          ?>
        </div>
      </div>
    </div>

    <!-- <div class="alert alert-primary mt-4" style="margin: 0 auto;" role="alert">
      Bạn chưa lưu video yêu thích nào !
    </div> -->

</section>

<div class="toggle">
  <label for="toggle-input" class="toggle-wrapper">
    <input id="toggle-input" class="toggle__input" type="checkbox">
    <div class="toggle__bar"></div>
  </label>
</div>

<script>
  function video_info_options_dropdown() {
    document.getElementById("video_info-dropdown").classList.toggle("flex_show");
  }

</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="../public/js/moment.js"></script>
<script src="../public/js/w3s.js"></script>
<script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>
<script>
        new WOW().init();
</script>
<script>
  $(document).ready(function () {

    $('.main-video_dropdown').addClass("hidden");

    $('.main-video_dropdown').click(function () {

      var dropdowns = document.getElementsByClassName("main-video_dropdown");
      var dots = document.getElementsByClassName('main-video-options');
      var $this = $(this);
      var i, j, k, l;
      for (i = 0; i < dropdowns.length; i++) {
        var dropdownContent = dropdowns[i];
        var removeDot = dots[i];

        removeDot.classList.remove('noHoverFlex');
        dropdownContent.classList.remove('visible');

      }

      if ($this.hasClass("hidden")) {
        $(this).removeClass("hidden").addClass("visible");
        $(this).parent().addClass("noHoverFlex");

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
          if (dotsContent.classList.contains('noHoverFlex')) {
            dotsContent.classList.remove('noHoverFlex');
          }
        }
      }

    });

  });
  setTimeout(function(){
        $('.alert').remove();
    }, 10000);
</script>

