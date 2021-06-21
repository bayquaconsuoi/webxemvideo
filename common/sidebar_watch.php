<?php 
session_start();
if (!empty($_SESSION['user'])) {
  $user = $_SESSION['user'];
}
?>
<head>
<title>Watch</title>
<link rel="icon"
        href="../../img/icon_page/icon_page.png">
</head>
<div id="sidebar_modal" class="sidebar_modal">
    <section id="sidebar" class="sidebar sidebar-large closed">
        <div class="sidebar-container">
            <div class="sidebar-options">
                <ul class="sidebar-options-first">
                    <li class="sidebar-options__item selected">
                        <a href="../../main/" class="sidebar-options__link">
                            <span class="sidebar-options__icon">
                                <i class="fas fa-home"></i>
                            </span>
                            <span class="sidebar-options__name">Trang chủ</span>
                        </a>
                    </li>
<!-- 
                    <li class="sidebar-options__item">
                        <a href="#" class="sidebar-options__link">
                            <span class="sidebar-options__icon">
                                <i class="fas fa-compass"></i>
                            </span>
                            <span class="sidebar-options__name">Khám phá</span>
                        </a>
                    </li>

                    <li class="sidebar-options__item">
                        <a href="#" class="sidebar-options__link">
                            <span class="sidebar-options__icon">
                                <i class="fab fa-youtube"></i>
                            </span>
                            <span class="sidebar-options__name">Kênh đăng ký</span>
                        </a>
                    </li> -->
                </ul>
                <?php 
                if (isset($_SESSION['user'])) {
                    $user_sidebar = <<< EOD
                    <ul class="sidebar-options-second">
                        <li class="sidebar-options__item">
                            <a href="../../common/channel_user/videos.php?id=$user" class="sidebar-options__link">
                                <span class="sidebar-options__icon">
                                    <i class="fas fa-book-open"></i>
                                </span>
                                <span class="sidebar-options__name">Kênh của bạn</span>
                            </a>
                        </li>

                        <li class="sidebar-options__item">
                            <a href="../../common/detail/detail_info_video_user.php?id=$user" class="sidebar-options__link">
                                <span class="sidebar-options__icon">
                                    <i class="fas fa-play-circle"></i>
                                </span>
                                <span class="sidebar-options__name">Video của bạn</span>
                            </a>
                        </li>

                        <li class="sidebar-options__item">
                            <a href="../../common/history.php" class="sidebar-options__link">
                                <span class="sidebar-options__icon">
                                    <i class="fas fa-history"></i>
                                </span>
                                <span class="sidebar-options__name">Video đã xem</span>
                            </a>
                        </li>

                        <li class="sidebar-options__item">
                            <a href="../../common/watch_later.php" class="sidebar-options__link">
                                <span class="sidebar-options__icon">
                                    <i class="fas fa-clock"></i>
                                </span>
                                <span class="sidebar-options__name">Video đã lưu</span>
                            </a>
                        </li>

                        <li class="sidebar-options__item">
                            <a href="../../common/playlist.php" class="sidebar-options__link">
                                <span class="sidebar-options__icon">
                                    <i class="fas fa-thumbs-up"></i>
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
                                <a type="button" class="sidebar-options-login-link" href="../../common/account_manage/manage.php">
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
                <h3 class="sidebar-more-list-title">Dịch vụ khác của Clone YOUTUBE</h3>
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
                            <i class="fas fa-cog"></i>
                        </span>
                        <span class="sidebar-function__name">Cài đặt</span>
                    </a>
                </li>

                <li class="sidebar-function">
                    <a href="#" class="sidebar-function-link">
                        <span class="sidebar-function__icon">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="sidebar-function__name">Báo cáo</span>
                    </a>
                </li>

                <li class="sidebar-function">
                    <a href="#" class="sidebar-function-link">
                        <span class="sidebar-function__icon">
                            <i class="fas fa-question-circle"></i>
                        </span>
                        <span class="sidebar-function__name">Trợ giúp</span>
                    </a>
                </li>

                <li class="sidebar-function">
                    <a href="#" class="sidebar-function-link">
                        <span class="sidebar-function__icon">
                            <i class="fas fa-paper-plane"></i>
                        </span>
                        <span class="sidebar-function__name">Gửi phản hồi</span>
                    </a>
                </li>
            </ul> -->

            <div class="copyright">5 2021 Trung LLC</div>
        </div>
    </section>
</div>
