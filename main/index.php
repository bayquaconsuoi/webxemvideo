<?php
require_once ('../db/dbhelper.php');
session_start();
if (!empty($_SESSION['user'])) {
    $id = $_SESSION['user'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<!-- Icon -->
	<link rel="icon"
        href="../img/icon_page/icon_page.png">
	<!-- Boostrap -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->

	<!-- CSS -->
	<link rel="stylesheet" href="../public/css/main.css">
	<link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/modal.css">

	<!-- JS -->
	<script src="../public/js/main.js"></script>
	
	<!-- FontAwesome -->
	<link rel="stylesheet" href="../public/fontawesome-free-5.15.3-web/css/all.min.css">
	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- MomentJS -->
	<script src="../public/js/moment.js"></script>

</head>

<body>
<?php include('../common/header.php'); ?>

<section id="sidebar" class="sidebar sidebar-large ">
    <div class="sidebar-container">
        <div class="sidebar-options">
            <ul class="sidebar-options-first">
                <li class="sidebar-options__item selected">
                    <a href="./../main/" class="sidebar-options__link">
                        <span class="sidebar-options__icon">
                            <i class="bx fas fa-home"></i>
                        </span>
                        <span class="sidebar-options__name">Trang chủ</span>
                    </a>
                </li>

                <!-- <li class="sidebar-options__item">
                    <a href="#" class="sidebar-options__link">
                        <span class="sidebar-options__icon">
                            <i class="bx fas fa-compass"></i>
                        </span>
                        <span class="sidebar-options__name">Khám phá</span>
                    </a>
                </li>

                <li class="sidebar-options__item">
                    <a href="#" class="sidebar-options__link">
                        <span class="sidebar-options__icon">
                            <i class="bx fab fa-youtube"></i>
                        </span>
                        <span class="sidebar-options__name">Kênh đăng ký</span>
                    </a>
                </li> -->
            </ul>
            <?php 
            if (isset($_SESSION['user'])) {
                $id = $_SESSION['user'];
                $user_sidebar = <<< EOD
                <ul class="sidebar-options-second">
                    <li class="sidebar-options__item">
                        <a href="./../common/channel_user/channel.php?id=$id" class="sidebar-options__link">
                            <span class="sidebar-options__icon">
                                <i class="bx fas fa-book-open"></i>
                            </span>
                            <span class="sidebar-options__name">Kênh của bạn</span>
                        </a>
                    </li>

                    <li class="sidebar-options__item">
                        <a href="./../common/detail/detail_info_video_user.php?id=$id" class="sidebar-options__link">
                            <span class="sidebar-options__icon">
                                <i class="bx fas fa-play-circle"></i>
                            </span>
                            <span class="sidebar-options__name">Video của bạn</span>
                        </a>
                    </li>

                    <li class="sidebar-options__item">
                        <a href="./../common/history.php" class="sidebar-options__link">
                            <span class="sidebar-options__icon">
                                <i class="bx fas fa-history"></i>
                            </span>
                            <span class="sidebar-options__name">Video đã xem</span>
                        </a>
                    </li>



                    <li class="sidebar-options__item">
                        <a href="./../common/watch_later.php" class="sidebar-options__link">
                            <span class="sidebar-options__icon">
                                <i class="bx fas fa-clock"></i>
                            </span>
                            <span class="sidebar-options__name">Video đã lưu</span>
                        </a>
                    </li>

                    <li class="sidebar-options__item">
                        <a href="./../common/playlist.php" class="sidebar-options__link">
                            <span class="sidebar-options__icon">
                                <i class="bx fas fa-thumbs-up"></i>
                            </span>
                            <span class="sidebar-options__name">Video đã thích</span>
                        </a>
                    </li>
                </ul>
                EOD;
                echo $user_sidebar;
            }
            else {
                $Un_user_sidebar = <<< EOD
                <ul class="sidebar-options-second">
                    <li class="sidebar-options-item__unlogin">
                        <div class="sidebar-options-name__unlogin">Hãy đăng nhập để thích video, lưu lại video yêu thích và đăng ký
                        kênh.
                            <a type="button" class="sidebar-options-login-link" href="../common/account_manage/manage.php">
                                <div class="sidebar-options-login-link_out-container">
                                    <div class="sidebar-options-login-link_container">
                                        <i class="far fa-user-circle"></i>
                                        <button class="sidebar-options-login-button">Đăng nhập</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
                EOD;
                echo $Un_user_sidebar;
            }
            ?>   
        </div>
        <!-- <ul class="sidebar-more-list">
            <h3 class="sidebar-more-list-title">Hay nhất trên <br/>Trung's YOUTUBE</h3>
            <li class="sidebar-more">
                <a href="#" class="sidebar-more-link">
                    <span class="sidebar-more__icon">
                        <i class='bx bxs-joystick'></i>
                    </span>
                    <span class="sidebar-more__name">Gaming</span>
                </a>
            </li>

            <li class="sidebar-more">
                <a href="#" class="sidebar-more-link">
                    <span class="sidebar-more__icon">
                        <i class='bx bx-broadcast'></i>
                    </span>
                    <span class="sidebar-more__name">Live</span>
                </a>
            </li>

            <li class="sidebar-more">
                <a href="#" class="sidebar-more-link">
                    <span class="sidebar-more__icon">
                        <i class='bx bxs-trophy'></i>
                    </span>
                    <span class="sidebar-more__name">Sports</span>
                </a>
            </li>
        </ul> -->

        <!-- <ul class="sidebar-functions">
            <li class="sidebar-function">
                <a href="#" class="sidebar-function-link">
                    <span class="sidebar-function__icon">
                        <i class="bx fas fa-cog"></i>
                    </span>
                    <span class="sidebar-function__name">Cài đặt</span>
                </a>
            </li>

            <li class="sidebar-function">
                <a href="#" class="sidebar-function-link">
                    <span class="sidebar-function__icon">
                        <i class="bx fas fa-flag"></i>
                    </span>
                    <span class="sidebar-function__name">Báo cáo</span>
                </a>
            </li>

            <li class="sidebar-function">
                <a href="#" class="sidebar-function-link">
                    <span class="sidebar-function__icon">
                        <i class="bx fas fa-question-circle"></i>
                    </span>
                    <span class="sidebar-function__name">Trợ giúp</span>
                </a>
            </li>

            <li class="sidebar-function">
                <a href="#" class="sidebar-function-link">
                    <span class="sidebar-function__icon">
                        <i class="bx fas fa-paper-plane"></i>
                    </span>
                    <span class="sidebar-function__name">Gửi phản hồi</span>
                </a>
            </li>
        </ul> -->

        <div class="copyright">5 2021 Trung LLC</div>
    </div>
</section>

<section class="sidebar sidebar-small closed">
    <ul class="sidebar-options">
        <li class="sidebar-options__item selected">
            <a href="index.php" class="sidebar-options__link" style="padding: 0!important;">
                <div class="sidebar-options__icon">
                    <i class="bx fas fa-home"></i>
                </div>
                <div class="sidebar-options__name">Trang chủ</div>
            </a>
        </li>

        <?php 
            if(isset($_SESSION['user'])){
                $isUser =<<<EOD
                    <li class="sidebar-options__item">
                        <a href="./../common/channel_user/channel.php?id=$id" class="sidebar-options__link" style="padding: 0!important;">
                            <div class="sidebar-options__icon">
                                <i class="bx fas fa-book-open"></i>
                            </div>
                            <div class="sidebar-options__name">Kênh của bạn</div>
                        </a>
                    </li>
            
                    <li class="sidebar-options__item">
                        <a href="./../common/detail/detail_info_video_user.php?id=$id" class="sidebar-options__link" style="padding: 0!important;">
                            <div class="sidebar-options__icon">
                                <i class="bx fas fa-play-circle"></i>
                            </div>
                            <div class="sidebar-options__name">Video của bạn</div>
                        </a>
                    </li>
            
 
                EOD;
                echo $isUser;
            }
        ?>


    </ul>
</section>
<?php include('../common/main/main_body.php'); ?>
<div class="toggle">
    <label for="toggle-input" class="toggle-wrapper">
        <input id="toggle-input" class="toggle__input" type="checkbox">
        <div class="toggle__bar"></div>
    </label>
</div>
</body>
</html>

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
