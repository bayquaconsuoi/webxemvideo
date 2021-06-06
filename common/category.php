<?php
require_once ('../db/dbhelper.php');
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

<link rel="stylesheet" href="../public/css/main.css">
<link rel="stylesheet" href="../public/fontawesome-free-5.15.3-web/css/all.min.css">
<link rel="stylesheet" href="../public/css/header.css">
<link rel="stylesheet" href="../public/css/404.css">
<link rel='stylesheet' href='https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css'>
<?php include('sidebar_search.php'); ?>
<!-- #Header -->
<header class="header">
  <div class="header-left">
    <button class="header-menu-btn btn-active">
        <div class="btn-bgc"></div>
        <i class="fas header-icon fa-bars"></i>
    </button>
    <div class="icon_page">
      <a href="../main">
        <img src="../img/icon_page/icon_page.png"
          alt="" class="header-logo">
        <div class="icon_page-name">
          <span>Trung's YOUTUBE</span>
        </div>
      </a>
    </div>
  </div>

  <div class="header-center">
    <form method="GET" action="main/progressSearch.php">
      <div class="header-search">
        <input class="header-search-input" type="search" placeholder="Tìm kiếm" aria-label="Search" name="name"
          required>
        <select name="action" id="action" class="header-search-input_options">
          <option value="videoName" class="header-search-btn">Tìm theo tên video</option>
          <option value="userName" class="header-search-btn">Tìm theo tên người đăng</option>
          <option value="advanced" class="header-search-btn">Tìm kiếm nâng cao</option>
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
              <div class="dropdown">
                <img onclick="avatar_dropDown()" src="../img/$useravatar" alt="" class="dropbtn circular_image" id="user_avatar"
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
                    <a class="sidebar-options__link" href="channel_user/channel.php?id=$id">
                      <span class="sidebar-options__icon">
                        <i class="far fa-user-circle"></i>
                      </span>
                      <span class="sidebar-options__name">Kênh của bạn</span>
                    </a>
        
                    <a class="sidebar-options__link" href="account_manage/progressLogout.php">
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
                <a type="button" class="sidebar-options-login-link" href="account_manage/manage.php">
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

<div class="cards-info">
    <h1 class="card-info-title">Danh sách video thể loại: <?php echo $_GET['category'] ?></h1>
</div>
<section class="cards">
<?php
if (isset ($_GET['category'])) {
  $category = ($_GET['category']);

  $sql = "SELECT * FROM video WHERE !deleted_at AND category = '$category'";

  $video = executeResult($sql);
  $db = mysqli_connect("localhost", "root", "", "cloneyoutube");
  $rs = mysqli_query($db,$sql);
  if (mysqli_num_rows($rs) > 0) {
      foreach ($video as $item) {
        $video = <<<EOD
        <div class="card wow fadeIn">
            <div class="card-thumbnail">
                <a href="main/watch_video.php?id={$item['id']}">
                    <div style="overflow: hidden;">
                        <img src="https://img.youtube.com/vi/{$item['video_id']}/mqdefault.jpg" class="card-img" style="height: auto; margin: 0 0; width: 100%;" alt="">
                    </div>
                </a>
            </div>

            <div class="card-content">
                <div class="card-avatar">
                    <a href="main/watch_video.php?id={$item['id']}">
                        <img class="user-avatar circular_image" src="../img/{$item['user_avatar']}" loading="lazy" alt="">
                    </a>
                </div>

                <div class="card-description">
                    <div class="card-name-options">
                        <div class="card-name">
                            <a href="main/watch_video.php?id={$item['id']}">
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
                        <a href="channel_user/channel.php?id={$item['user_id']}"><span class="card-user__name">{$item['user_name']}</span></a>
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
            <a href="../main" class="mt-2">Về trang chủ</a>
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

<!-- advanced search modal -->
<div id="advancedModal" class="advancedModal">

  <!-- Modal content -->
  <div class="advancedModal-content">
    <span class="advancedClose">&times;</span>
    <h1>Tìm kiếm nâng cao</h1>
    <form action="main/progressSearch.php?action=advanced" method="GET">
        <div class="advancedFormContainer">

          <input class="header-search-input search_input" id="advancedsearch_input" name="advancedsearch_input" type="search" placeholder="Tìm kiếm" autocomplete="off" aria-label="Search"
          required>
          Tìm theo:
          <select name="advancedAction" id="advancedAction" class="header-search-input_options" required>
            <option value="" selected disabled hidden>--Lựa chọn--</option>
            <option value="Tìm theo tên video" class="header-search-btn">Tìm theo tên video</option>
            <option value="Tìm theo tên người đăng" class="header-search-btn">Tìm theo tên người đăng</option>
          </select>
          Thể loại:   
          <select id="category" name="category" class="header-search-input_options" required>
            <option value="" selected disabled hidden>--Lựa chọn--</option>
            <?php 
              $sql = "select * from category";
              $category = executeResult($sql);
              foreach ($category as $category_mini) {         
              $category_content = <<< EOD
              <option value="{$category_mini['category_name']}">{$category_mini['category_name']}</option>
              EOD;
              echo $category_content;
              }
            ?>
          </select>
          Ngày đăng:
          <select id="date_up" name="date_up" class="header-search-input_options" required>
            <option value="" selected disabled hidden>--Lựa chọn--</option>
            <option value="Một giờ qua">Một giờ qua</option>
            <option value="Hôm nay">Hôm nay</option>
            <option value="Tuần này">Tuần này</option>
            <option value="Tháng này">Tháng này</option>
            <option value="Năm nay">Năm nay</option>
          </select>  
          Sắp xếp theo:
          <select id="sort" name="sort" class="header-search-input_options" required>
            <option value="" selected disabled hidden>--Lựa chọn--</option>
            <option value="Ngày tải lên">Ngày tải lên</option>
            <option value="Lượt xem">Lượt xem</option>
            <option value="Lượt thích">Lượt thích</option>
          </select>  
          <div class="advancedFormButton">
            <button class="header-search-btn" type="submit"><i class="fas advanced-icon fa-search"></i>Tìm kiếm</button>
          </div>
        </div>
    </form>
  </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="../public/js/moment.js"></script>
<script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>

<script>
        new WOW().init();
</script>
<!-- <script src="../public/js/404.js"></script> -->
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
        var modal = document.getElementById("advancedModal");
        var advancedmodal = document.getElementById("advancedModal");
        if (event.target == modal) {
            advancedmodal.style.display = "none";
            $('#action option').prop('selected', function() {
                return this.defaultSelected;
            });
        }
    }

</script>

<script>
var span = document.getElementsByClassName("advancedClose")[0];
var modal = document.getElementById("advancedModal");

$("#action").on("change", function () {        
    if($(this).val() === 'advanced'){
      modal.style.display = "block";
    }
});



span.onclick = function() {
  modal.style.display = "none";
  $('#action option').prop('selected', function() {
        return this.defaultSelected;
  });
}

</script>