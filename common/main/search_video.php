<?php
require_once ('../../db/dbhelper.php');
session_start();
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

<link rel="stylesheet" href="../../public/css/main.css">
<link rel="stylesheet" href="../../public/fontawesome-free-5.15.3-web/css/all.min.css">
<link rel="stylesheet" href="../../public/css/header.css">
<link rel="stylesheet" href="../../public/css/404.css">
<?php include('../sidebar_search.php'); ?>
<!-- #Header -->
<header class="header">
  <div class="header-left">
    <button class="header-menu-btn btn-active">
        <div class="btn-bgc"></div>
        <i class="fas header-icon fa-bars"></i>
    </button>
    <div class="icon_page">
      <a href="../../main">
        <img src="../../img/icon_page/icon_page.png"
          alt="" class="header-logo">
        <div class="icon_page-name">
          <span>Clone YOUTUBE</span>
        </div>
      </a>
    </div>
  </div>

  <div class="header-center">
    <form method="GET" action="">
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
  <?php 
  if (isset($_SESSION['user'])) {
            $user = <<< EOD
              <a class="header-create-btn btn-active" href="../detail_info_page.php?up">
                <div class="btn-bgc"></div>
                <i class="fas header-icon fa-video"></i>
              </a>
              <button class="header-notifications-btn btn-active">
                <div class="btn-bgc"></div>
                <i class="fas header-icon fa-bell"></i>
              </button>
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
<!-- /Header -->
<?php 
  $search_value = ($_GET['name']);
  $search_type  = ($_GET['action']);
  if($search_type == "videoName"){
      $search_type = "Tên video";
  } else {
      $search_type = "Tên người đăng";
  }
?>
<div class="cards-info">
    <h1 class="card-info-title">Danh sách video: [<?php echo $search_type?>] [<?php echo $search_value?>]</h1>
</div>
<section class="cards">
<?php
if (isset ($_GET['name'])) {
  $key = addslashes ($_GET['name']);
  $type = ($_GET['action']);
  if($type == "videoName"){
    $sql = "SELECT * FROM video WHERE (tenvideo LIKE '%$key%')";
  } else {
    $sql = "SELECT * FROM video WHERE (user_name LIKE '%$key%')";
  }
  
  $video = executeResult($sql);
  $db = mysqli_connect("localhost", "root", "", "cloneyoutube");
  $rs = mysqli_query($db,$sql);
  if (mysqli_num_rows($rs) > 0) {
      foreach ($video as $item) {
        $video = <<<EOD
        <div class="card">
            <div class="card-thumbnail">
                <a href="../main/watch_video.php?id={$item['id']}">
                    <div style="overflow: hidden;">
                        <img src="https://img.youtube.com/vi/{$item['video_id']}/sddefault.jpg" class="card-img" style="height: auto; margin: -10% 0; width: 100%;" alt="">
                    </div>
                </a>
            </div>

            <div class="card-content">
                <div class="card-avatar">
                    <a href="../main/watch_video.php?id={$item['id']}">
                        <img class="user-avatar circular_image" src="../../img/{$item['user_avatar']}" loading="lazy" alt="">
                    </a>
                </div>

                <div class="card-description">
                    <div class="card-name-options">
                        <div class="card-name">
                            <a href="./../common/main/watch_video.php?id={$item['video_id']}">
                                <h3 class="card-title">{$item['tenvideo']}</h3>
                            </a>

                        </div>
                        <div class="card-options">
                            <div class="dropbtn fea-dropdown">
                                <button class="fea-dropbtn"><i class='bx bx-dots-vertical-rounded '></i></button>
                                <div id="fea_Dropdown" class="dropdown-content fea-dropdown-content">
                                    <ul class="fea-sidebar-options">
                                        <li class="fea-sidebar-options__item">
                                            <a href="#" class="sidebar-options__link">
                                                <span class="sidebar-options__icon">
                                                    <i class="fas fa-stream"></i>
                                                </span>
                                                <span class="sidebar-options__name">Thêm vào danh sách
                                                    chờ</span>
                                            </a>
                                        </li>

                                        <li class="fea-sidebar-options__item">
                                            <a href="#" class="sidebar-options__link">
                                                <span class="sidebar-options__icon">
                                                    <i class="fas fa-history"></i>
                                                </span>
                                                <span class="sidebar-options__name">Lưu vào danh sách xem
                                                    sau</span>
                                            </a>
                                        </li>

                                        <li class="fea-sidebar-options__item">
                                            <a href="#" class="sidebar-options__link">
                                                <span class="sidebar-options__icon">
                                                    <i class="fas fa-water"></i>
                                                </span>
                                                <span class="sidebar-options__name">Lưu vào danh sách
                                                    phát</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-user">
                        <a href="../../common/channel_user/channel.php?id={$item['user_id']}"><span class="card-user__name">{$item['user_name']}</span></a>
                        <span class="card-user__verified">
                            <i class='bx bxs-check-circle'></i>
                        </span>
                    </div>

                    <div class="card-info">
                        <span class="card-views">{$item['view_count']} lượt xem</span>
                        <div class="time" style="display: none;" data-value="{$item['created_at']}"></div>
                        <span class="card-date createTime"></span>
                    </div>

                </div>
            </div>
        </div>
        EOD;
        echo $video;
    }
  } else {
    $notfound =<<<EOD

      <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>4<span></span>4</h1>
            </div>
            <h2>Oops! Không tìm thấy kết quả</h2>
            <a href="../../main" class="mt-2">Về trang chủ</a>
        </div>
      </div>
    EOD;
    echo $notfound;
  }

}
?>
</section>

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
<script src="../../public/js/moment.js"></script>
<!-- <script src="../../public/js/404.js"></script> -->
<script>
function avatar_dropDown() {
    document.getElementById("avatar_dropdown_container").classList.toggle("show");
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

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

function slider() {

function moveSidebar() {

	let menuBtn = document.querySelector('.header-menu-btn'),
		largeSidebar = document.querySelector('.sidebar-large'),
		smallSidebar = document.querySelector('.sidebar-small'),
		cardsCtn = document.querySelector('.cards');


	var x = getCookie("sidebar");
	if (x === "true") {
		largeSidebar.classList.add('closed');
		smallSidebar.classList.remove('closed');
		cardsCtn.classList.add('cards-small');


	} else {
		largeSidebar.classList.remove('closed');
		smallSidebar.classList.add('closed');
		cardsCtn.classList.remove('cards-small');


	}

	menuBtn.addEventListener('click', () => {
		largeSidebar.classList.toggle('closed');
		smallSidebar.classList.toggle('closed');
		cardsCtn.classList.toggle('cards-small');

		if(cardsCtn.classList.contains("cards-small")){
			setCookie("sidebar","true",1)
		} else {
			setCookie("sidebar","false",1)
		}
		
	})
}

moveSidebar();
}

slider();
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
    window.onclick = function (event) {
        if(!event.target.matches('#user_avatar')){
            document.getElementById("avatar_dropdown_container").classList.remove("show");
        }
    }
</script>