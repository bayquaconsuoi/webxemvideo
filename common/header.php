<link rel="stylesheet" href="../public/css/header.css">
<?php 
require_once ('../db/dbhelper.php');

if (!empty($_SESSION['user'])) {
  $user = $_SESSION['user'];
  //Truy van database
  $sql = "select * from account where id = '$user'";
  $info_user = executeSingleResult($sql);
  if ($info_user != null) {
    $id = $info_user['id'];
    $user_name = $info_user['user_name'];
    $email   = $info_user['email'];
    $phone = $info_user['phone'];
    $user_avatar = $info_user['user_avatar'];
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
        <img src="https://64.media.tumblr.com/6c894cfef11f03c37c2688cedd03c508/tumblr_on8i9klcVA1uti1rro7_400.png"
          alt="" class="header-logo">
        <div class="icon_page-name">
          <span>Clone YOUTUBE</span>
        </div>
      </a>
    </div>
  </div>

  <div class="header-center">
    <form method="GET" action="./../common/main/search_video.php">
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
              <a class="header-create-btn btn-active" href="../common/detail_info_page.php?up" id="myForm">
                <div class="btn-bgc"></div>
                <i class="fas header-icon fa-video"></i>
              </a>

              <div class="dropdown">
                <img onclick="avatar_dropDown()" src="./../img/$user_avatar"
                class="circular_image" style="margin-right: 8px;">
                <div class="dropdown-content dropdown-content_header" id="avatar_dropdown_container">
                <div class="dropdown-content_inner">
                  <div class="content_userinfo">
        
                    <div>
                      <a href="#"><img src="./../img/$user_avatar" alt=""
                          class="dropDown-avatar circular_image circular_image-header"></a>
                    </div>
                    <div class="content-text">
                      <span class="dropDown-text-UserName">$user_name</span>
                      <span class="dropDown-text">$email</span>
                    </div>
        
                  </div>
                  <hr>
                  <div class="content_options">
                    <a class="sidebar-options__link" href="../common/channel_user/channel.php?id=$id">
                      <span class="sidebar-options__icon">
                        <i class="far fa-user-circle"></i>
                      </span>
                      <span class="sidebar-options__name">Kênh của bạn</span>
                    </a>
        
                    <a class="sidebar-options__link" href="../common/account_manage/progressLogout.php">
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
                <a type="button" class="sidebar-options-login-link" href="../common/account_manage/manage.php">
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
