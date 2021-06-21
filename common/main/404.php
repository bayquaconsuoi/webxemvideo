<?php
require_once ('../../db/dbhelper.php');
?>

<link rel="stylesheet" href="../../public/css/main.css">
<link rel="stylesheet" href="../../public/fontawesome-free-5.15.3-web/css/all.min.css">
<link rel="stylesheet" href="../../public/css/header.css">
<link rel="stylesheet" href="../../public/css/404.css">

<?php include('../sidebar_watch.php'); ?>
<!-- #Header -->
<?php 

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
        <div class="btn-bgc"></div>
        <i class="fas header-icon fa-bars"></i>
    </button>
    <div class="icon_page">
      <a href="../../main">
        <img src="https://64.media.tumblr.com/6c894cfef11f03c37c2688cedd03c508/tumblr_on8i9klcVA1uti1rro7_400.png"
          alt="" class="header-logo">
        <div class="icon_page-name">
          <span>Clone YOUTUBE</span>
        </div>
      </a>
    </div>
  </div>

  <div class="header-center">
    <form method="GET" action="search_video.php">
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
              <a class="header-create-btn btn-active" href="../../common/detail_info_page.php?up" id="myForm">
                <div class="btn-bgc"></div>
                <i class="fas header-icon fa-video"></i>
              </a>

              <div class="dropdown">
                <img onclick="avatar_dropDown()" src="../../img/$useravatar" alt="" class="dropbtn circular_image"
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
                    <a class="sidebar-options__link" href="../channel_user/videos.php?id=$id">
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
<!-- /Header -->
<div class="page_404">

    <div class="notfound">
      <div class="notfound-404">
        <h1>4<span></span>4</h1>
      </div>
        <h2>Oops! Video không có sẵn</h2>
        <a href="../../main" class="mt-2">Về trang chủ</a>
      </div>

</div>

<div class="toggle">
    <label for="toggle-input" class="toggle-wrapper">
        <input id="toggle-input" class="toggle__input" type="checkbox">
        <div class="toggle__bar"></div>
    </label>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>

<script>
        new WOW().init();
</script>

<script>
    // create dark mode button
    function darkMode() {
        const toggleSwitch = document.querySelector('.toggle input[type="checkbox"]');
        const currentTheme = localStorage.getItem('theme');

        if (currentTheme) {
            document.documentElement.setAttribute('data-theme', currentTheme);
            if (currentTheme === 'dark') {
                toggleSwitch.checked = true;
            }
        }

        toggleSwitch.addEventListener('change', (e) => {
            if (e.target.checked) {

                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            } else {

                document.documentElement.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
            }
        });
    }

    darkMode();
    function moveSidebar() {
        let menuBtn = document.querySelector('.header-menu-btn'),
            sidebar_modal = document.querySelector('.sidebar_modal'),
            largeSidebar = document.querySelector('.sidebar-large');
        
        menuBtn.addEventListener('click', () => {
            sidebar_modal.classList.toggle('show');
            largeSidebar.classList.toggle("closed");
            document.body.classList.toggle('nomove');
        })
    }

    moveSidebar();
  
    function avatar_dropDown() {
        document.getElementById("avatar_dropdown_container").classList.toggle("show");
    }
</script>

<script>
window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");

        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }

    }
  }
</script>

