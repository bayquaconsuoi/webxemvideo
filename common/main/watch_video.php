<?php
require_once ('../../db/dbhelper.php');
        $id = '';
        if (isset($_GET['id'])) {
            $id      = $_GET['id'];
            $sql     = 'select * from video where id = '.$id;
            $item = executeSingleResult($sql);

            $sql = 'UPDATE video SET view_count = view_count+1 WHERE id = '.$id;
            execute($sql);
        }
?>

<link rel="stylesheet" href="../../public/css/main.css">
<link rel="stylesheet" href="../../public/fontawesome-free-5.15.3-web/css/all.min.css">
<link rel="stylesheet" href="../../public/css/header.css">
<link rel="stylesheet" href="../../public/css/watch_video/watch_video.css">
<link rel='stylesheet' href='https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css'>
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
<div class="collum">
    <?php
        if (isset($_GET['id'])) {
            $watch_video = <<< EOD
            
                <div class="primary">
                <div id="primary-inner">
                    <div id="info">
                        <iframe width="900" height="506" id="video"
                            src="https://www.youtube.com/embed/{$item['video_id']}?autoplay=1&rel=0" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                            allowfullscreen></iframe>
                        <div id="info-contents">
                            <h1 class="shw-card-title">
                                {$item['tenvideo']}
                            </h1>
                            <div class="infos">
                                <div id="views">
                                    <h2 style="display: inline;">{$item['view_count']} lượt xem • </h2>
                                    <h3 style="display: inline;">
                                        <div class="time" style="display: none;" data-value="{$item['created_at']}"></div>
                                        <span id="createTime"></span>
                                    </h3>
                                </div>
                                <div id="likes">
                                <div id="like_container">
            EOD;
            echo $watch_video;
        }
    ?>
    <?php 
        $db = mysqli_connect("localhost", "root", "", "cloneyoutube");
        $sql = "select * from islike where user_id_store = $id and video_id_store= {$item['id']}";
        $like = mysqli_query($db,$sql);

        if (mysqli_num_rows($like) > 0) {
            $watch_liked =<<< EOD
                <a rel="progressLike_Dlike.php?user_id=$id&video_id={$item['id']}&type=like" class="video-link video-link-sp isLike"
                    id="fool-like">
                    <div class="like-dislike_icon"><i class="video-icon fa-2x fas fa-thumbs-up "></i>
                    </div>
                    <div class="count" id="Lcount">{$item['like_count']}</div>
                </a>
            EOD;
        echo $watch_liked;
        }
        else{
            $watch_like=<<<EOD
                <a rel="progressLike_Dlike.php?user_id=$id&video_id={$item['id']}&type=like" class="video-link video-link-sp" id="fool-like">
                    <div class="like-dislike_icon"><i class="video-icon fa-2x fas fa-thumbs-up"></i>
                    </div>
                    <div class="count" id="Lcount">{$item['like_count']}</div>
                </a>
            EOD;
            echo $watch_like;
        }
            $modal_like = <<< EOD
                <div class="modal_need_login" id="modal_like">
                    <div class="modal_need_login-content">
                        <div class="modal-text-container">
                            <div class="modal-text-title">
                                Bạn thích video này?
                            </div>
                            <div class="modal-text-content">
                                Đăng nhập để thể hiện ý kiến của bạn
                            </div>
                        </div>
                        <div style="width: auto; display: block; border-top: 1px solid #e0e0e0;">
                            <button class="modal-button">
                                <a href="../../common/account_manage/manage.php">Đăng nhập</a>
                            </button>
                        </div>
                    </div>
                </div>
                EOD;
            echo $modal_like;
            echo "</div>"
    ?>
    <div id="dislike_container">
    <?php 
        $db = mysqli_connect("localhost", "root", "", "cloneyoutube");
        $sql = "select * from isdislike where user_id_store = $id and video_id_store = {$item['id']}";
        $dislike = mysqli_query($db,$sql);

        if (mysqli_num_rows($dislike) > 0) {
            $watch_disliked =<<< EOD
                <a rel="progressLike_Dlike.php?user_id=$id&video_id={$item['id']}&type=dislike" class="video-link video-link-sp isLike"
                id="fool-dlike">
                <div class="like-dislike_icon"><i class="video-icon fa-2x fas fa-thumbs-down"></i>
                </div>
                <div class="count" id="Dcount">{$item['dislike_count']}</div>
                </a>
            EOD;
        echo $watch_disliked;
        }
        else{
            $watch_dislike=<<<EOD
                <a rel="progressLike_Dlike.php?user_id=$id&video_id={$item['id']}&type=dislike" class="video-link video-link-sp"
                    id="fool-dlike">
                    <div class="like-dislike_icon"><i class="video-icon fa-2x fas fa-thumbs-down"></i>
                    </div>
                    <div class="count" id="Dcount">{$item['dislike_count']}</div>
                </a>
            EOD;
            echo $watch_dislike;
        }
            $modal_dislike = <<< EOD
                <div class="modal_need_login" id="modal_dislike" style="left: 432px">
                    <div class="modal_need_login-content">
                        <div class="modal-text-container">
                            <div class="modal-text-title">
                                Bạn không thích video này?
                            </div>
                            <div class="modal-text-content">
                                Đăng nhập để thể hiện ý kiến của bạn
                            </div>
                        </div>
                        <div style="width: auto; display: block; border-top: 1px solid #e0e0e0;">
                            <button class="modal-button">
                                <a href="../../common/account_manage/manage.php">Đăng nhập</a>
                            </button>
                        </div>
                    </div>
                </div>
                EOD;
            echo $modal_dislike;
            echo "</div>"
    ?>
    </div>
    <?php
        $db = mysqli_connect("localhost", "root", "", "cloneyoutube");
        $sql = "select * from watch_later where user_id_later = $id and video_id_later = {$item['id']}";
        $save = mysqli_query($db,$sql);

        if (mysqli_num_rows($save) > 0) {
        $saved =<<<EOD
            <div id="save">
                <a href="../../common/main/progressLater.php?user_id=$id&video_id={$item['id']}&type=add" class="video-link isLike video-link-sp">
                    <div><i class="video-icon fa-2x fas fa-save"></i></div>
                    <div>Lưu</div>
                </a>
            </div>
        EOD;
        echo $saved;
        } else {
        $saved =<<<EOD
            <div id="save">
                <a href="../../common/main/progressLater.php?user_id=$id&video_id={$item['id']}&type=add" class="video-link video-link-sp">
                    <div><i class="video-icon fa-2x fas fa-save"></i></div>
                    <div>Lưu</div>
                </a>
            </div>
        EOD;
        echo $saved;
        }
    ?>
    <?php 
        $watch_video2 =<<< EOD
            </div>
            </div>
            <hr>
            <div id="info-user">
            <div id="user-avatar_box" style="display: inline;">
                <a href="../../common/channel_user/channel.php?id={$item['user_id']}"><img class="circular_image" src="../../img/{$item['user_avatar']}"
                        alt=""></a>
            </div>
            <div id="user-name" style="display: inline;">
                <h2><a href="../../common/channel_user/channel.php?id={$item['user_id']}">{$item['user_name']}</a></h2>
                <span>10,7 N người đăng ký</span>
            </div>

            <div id="subscribe-button">
                <a href="#" class="subscribe-text" style="color: #fff;">Đăng ký</a>
            </div>
            </div>
            <div class="user-description_container">
            <div class="user-description" id="moreText">
                <span id="user-descriptions_main" class="user-descriptions_main">{$item['mota']}</span>
            </div>
            <button id="toggleButton" class="display_more-btn" style="display: none;"
                onclick="toggleText()">Hiển thị thêm</button>
            </div>
            <div id="successMessage"> </div>
            <hr>
            </div>
            <div id="meta">

            </div>
            <div id="comment">

            </div>

            </div>
            </div>
        EOD;
        echo $watch_video2
    ?>
    <div class="secondary">
        <?php
        $sql = 'SELECT * FROM video ORDER BY rand() LIMIT 30';
        $items = executeResult($sql);
        foreach ($items as $item_mini) {
            $items = <<<EOD
                <div class="mini-video wow fadeIn">
                    <a href="watch_video.php?id={$item_mini['id']}">
                        <div class="mini-videoWatch  fea-mini-video_container">
                            <div style="overflow: hidden;">
                                <img src="https://img.youtube.com/vi/{$item_mini['video_id']}/sddefault.jpg" class="card-img2" style="margin: -11% 0; " alt="">
                            </div>
                        </div>
                        <div class="mini-videoDetail  fea-mini-video_container">
                            <h1 class="user-descriptionSide">
                                {$item_mini['tenvideo']}
                            </h1>
                            <h2 class="descriptionS">
                                {$item_mini['user_name']}
                            </h2>
                            <div>
                                <h3 class="descriptionS">
                                    {$item_mini['view_count']} lượt xem
                                    <div class="mini_time" style="display: none;" data-value="{$item_mini['created_at']}"></div>
                                    <span class="mini_createTime" style="margin-left: 6px;"></span>
                                </h3>
                            </div>
                        </div>

                    </a>
                </div>
            EOD;
            echo $items;
        }
        ?>
        
    </div>
</div>


<div class="toggle">
    <label for="toggle-input" class="toggle-wrapper">
        <input id="toggle-input" class="toggle__input" type="checkbox">
        <div class="toggle__bar"></div>
    </label>
</div>

<div id="notification">
    <div class="notify_content">
        <div class="notify_text" id="notify_text">some text</div>
    </div>
</div>
<?php $session_value=(isset($_SESSION['user']))?$_SESSION['user']:''; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="../../public/js/moment.js"></script>
<script src="../../public/js/autolink.js"></script>
<script src="../../public/js/like_dlike.js"></script>
<script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>

<script>
        new WOW().init();
</script>

<script>
    jQuery(function ($) {
        $('.user-descriptions_main').autolink();
    });
</script>

<script>
    var status = "less";
    var isTooLong = $('#user-descriptions_main').height();
    if (isTooLong > 50) {
        document.getElementById("toggleButton").style.display = "block";
    }
    function toggleText() {
        if (status == "less") {
            document.getElementById("moreText").style.display = "block"
            document.getElementById("toggleButton").innerText = "Ẩn bớt";
            status = "more";
        } else if (status == "more") {
            document.getElementById("moreText").style.display = "-webkit-box"
            document.getElementById("toggleButton").innerText = "Hiển thị thêm";
            status = "less"
        }
    }
    document.addEventListener('DOMContentLoaded', function () {
        var x = document.querySelector('.time');
        var z = document.getElementById('createTime')
        var y = new Date(x.getAttribute("data-value"));
        var month = y.getMonth() + 1;
        z.innerHTML = y.getDate() + " th " + month + ", " + y.getFullYear();

        var mini_x = document.querySelectorAll('.mini_time');
        var mini_z = document.getElementsByClassName('mini_createTime')
        for (i = 0; i < mini_x.length; i++) {
            var mini_y = new Date(mini_x[i].getAttribute("data-value"));

            var a = moment(mini_y).fromNow();
            mini_z[i].innerHTML = a;
        }
    });

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

    function IsLike() {
        var value='<?php echo $session_value;?>';
        let like_btn = document.getElementById('fool-like'),
            dlike_btn = document.getElementById('fool-dlike'),
            likeCount = document.getElementById('Lcount'),
            disCount = document.getElementById('Dcount'),
            notify_box = document.getElementById('notification'),
            modal_like = document.getElementById('modal_like'),
            modal_dislike = document.getElementById('modal_dislike');

        var isLiked = "false",
            isDliked = "false",
            likeCount_text = likeCount.innerText * 1,
            disCount_text = disCount.innerText * 1;

        like_btn.addEventListener('click', () => {
            if (value) {
                startTimer();
                if (like_btn.classList.contains("isLike")) {
                    isLiked = "true"; isDliked = "false";
                    if (isLiked == "false" && isDliked == "false") {
                        like_btn.classList.add('isLike');
                        document.getElementById('notify_text').innerText = "Đã thêm vào Video đã thích";
                        notify_box.classList.add("appear");
                        clearTimeout(g_timer); startTimer();
                        isLiked = "true";
                        likeCount_text += 1;

                    } else if (isLiked == "false" && isDliked == "true") {
                        like_btn.classList.add('isLike');
                        dlike_btn.classList.remove('isLike');
                        document.getElementById('notify_text').innerText = "Đã thêm vào Video đã thích";
                        notify_box.classList.add("appear");
                        isLiked = "true";
                        likeCount_text += 1;
                        isDliked = "false";
                        clearTimeout(g_timer); startTimer();
                        if (disCount_text > 0) {
                            disCount_text -= 1;
                            disCount.innerText -= 1;
                        }
                    }
                    else {
                        like_btn.classList.remove('isLike');
                        document.getElementById('notify_text').innerText = "Đã xóa khỏi Video đã thích";
                        notify_box.classList.add("appear");
                        isLiked = "false";
                        clearTimeout(g_timer); startTimer();
                        likeCount_text -= 1;
                        likeCount.innerText -= 1;
                    }
                    likeCount.innerText = likeCount_text;
                    disCount.innerText = disCount_text;

                } else if (dlike_btn.classList.contains("isLike")) {
                    isLiked = "false"; isDliked = "true";
                    if (isLiked == "false" && isDliked == "false") {
                        like_btn.classList.add('isLike');
                        document.getElementById('notify_text').innerText = "Đã thêm vào Video đã thích";
                        notify_box.classList.add("appear");
                        isLiked = "true";
                        clearTimeout(g_timer); startTimer();
                        likeCount_text += 1;

                    } else if (isLiked == "false" && isDliked == "true") {
                        like_btn.classList.add('isLike');
                        dlike_btn.classList.remove('isLike');
                        document.getElementById('notify_text').innerText = "Đã thêm vào Video đã thích";
                        notify_box.classList.add("appear");
                        isLiked = "true";
                        likeCount_text += 1;
                        isDliked = "false";
                        clearTimeout(g_timer); startTimer();
                        if (disCount_text > 0) {
                            disCount_text -= 1;
                            disCount.innerText -= 1;
                        }
                    }
                    else {
                        like_btn.classList.remove('isLike');
                        document.getElementById('notify_text').innerText = "Đã xóa khỏi Video đã thích";
                        notify_box.classList.add("appear");
                        isLiked = "false";
                        clearTimeout(g_timer); startTimer();
                        likeCount_text -= 1;
                        likeCount.innerText -= 1;
                    }
                    likeCount.innerText = likeCount_text;
                    disCount.innerText = disCount_text;

                } else {
                    if (isLiked == "false" && isDliked == "false") {
                        like_btn.classList.add('isLike');
                        document.getElementById('notify_text').innerText = "Đã thêm vào Video đã thích";
                        notify_box.classList.add("appear");
                        isLiked = "true";
                        clearTimeout(g_timer); startTimer();
                        likeCount_text += 1;

                    } else if (isLiked == "false" && isDliked == "true") {
                        like_btn.classList.add('isLike');
                        dlike_btn.classList.remove('isLike');
                        document.getElementById('notify_text').innerText = "Đã thêm vào Video đã thích";
                        notify_box.classList.add("appear");
                        isLiked = "true";
                        likeCount_text += 1;
                        clearTimeout(g_timer); startTimer();
                        isDliked = "false";
                        if (disCount_text > 0) {
                            disCount_text -= 1;
                            disCount.innerText -= 1;
                        }
                    }
                    else {
                        like_btn.classList.remove('isLike');
                        document.getElementById('notify_text').innerText = "Đã xóa khỏi Video đã thích";
                        notify_box.classList.add("appear");
                        isLiked = "false";
                        clearTimeout(g_timer); startTimer();
                        likeCount_text -= 1;
                        likeCount.innerText -= 1;
                    }
                    likeCount.innerText = likeCount_text;
                    disCount.innerText = disCount_text;

                }
            } else {
                if (!modal_dislike.classList.contains("modal_light")) {
                    modal_like.classList.toggle("modal_light");
                } else {
                    modal_dislike.classList.remove("modal_light");
                    modal_like.classList.add("modal_light");
                }
            }
        })


        dlike_btn.addEventListener('click', () => {
            if (value) {
                startTimer();
                if (dlike_btn.classList.contains("isLike")) {
                    isLiked = "false"; isDliked = "true";
                    if (isDliked == "false" && isLiked == "false") {
                        dlike_btn.classList.add('isLike');
                        document.getElementById('notify_text').innerText = "Bạn không thích video này";
                        notify_box.classList.add("appear");
                        isDliked = "true"; clearTimeout(g_timer); startTimer();
                        disCount_text += 1;
                    } else if (isDliked == "false" && isLiked == "true") {
                        dlike_btn.classList.add('isLike');
                        like_btn.classList.remove('isLike');
                        document.getElementById('notify_text').innerText = "Bạn không thích video này";
                        notify_box.classList.add("appear");
                        isDliked = "true";
                        disCount_text += 1;
                        isLiked = "false"; clearTimeout(g_timer); startTimer();
                        if (likeCount_text > 0) {
                            likeCount_text -= 1;
                            likeCount.innerText -= 1;
                        }
                    }
                    else {
                        dlike_btn.classList.remove('isLike');
                        document.getElementById('notify_text').innerText = "Đã xóa lượt không thích";
                        notify_box.classList.add("appear");
                        isDliked = "false";
                        disCount_text -= 1; clearTimeout(g_timer); startTimer();
                        disCount.innerText -= 1;
                    }
                    likeCount.innerText = likeCount_text;
                    disCount.innerText = disCount_text;

                } else if (like_btn.classList.contains("isLike")) {
                    isLiked = "true"; isDliked = "false";
                    if (isDliked == "false" && isLiked == "false") {
                        dlike_btn.classList.add('isLike');
                        document.getElementById('notify_text').innerText = "Bạn không thích video này";
                        notify_box.classList.add("appear");
                        isDliked = "true"; clearTimeout(g_timer); startTimer();
                        disCount_text += 1;
                    } else if (isDliked == "false" && isLiked == "true") {
                        dlike_btn.classList.add('isLike');
                        like_btn.classList.remove('isLike');
                        document.getElementById('notify_text').innerText = "Bạn không thích video này";
                        notify_box.classList.add("appear");
                        isDliked = "true";
                        disCount_text += 1;
                        isLiked = "false"; clearTimeout(g_timer); startTimer();
                        if (likeCount_text > 0) {
                            likeCount_text -= 1;
                            likeCount.innerText -= 1;
                        }
                    }
                    else {
                        dlike_btn.classList.remove('isLike');
                        document.getElementById('notify_text').innerText = "Đã xóa lượt không thích";
                        notify_box.classList.add("appear");
                        isDliked = "false";
                        disCount_text -= 1; clearTimeout(g_timer); startTimer();
                        disCount.innerText -= 1;
                    }
                    likeCount.innerText = likeCount_text;
                    disCount.innerText = disCount_text;

                } else {
                    if (isDliked == "false" && isLiked == "false") {
                        dlike_btn.classList.add('isLike');
                        document.getElementById('notify_text').innerText = "Bạn không thích video này";
                        notify_box.classList.add("appear");
                        isDliked = "true";
                        disCount_text += 1; clearTimeout(g_timer); startTimer();
                    } else if (isDliked == "false" && isLiked == "true") {
                        dlike_btn.classList.add('isLike');
                        like_btn.classList.remove('isLike');
                        document.getElementById('notify_text').innerText = "Bạn không thích video này";
                        notify_box.classList.add("appear");
                        isDliked = "true";
                        disCount_text += 1;
                        isLiked = "false"; clearTimeout(g_timer); startTimer();
                        if (likeCount_text > 0) {
                            likeCount_text -= 1;
                            likeCount.innerText -= 1;
                        }
                    }
                    else {
                        dlike_btn.classList.remove('isLike');
                        document.getElementById('notify_text').innerText = "Đã xóa lượt không thích";
                        notify_box.classList.add("appear");
                        isDliked = "false";
                        disCount_text -= 1; clearTimeout(g_timer); startTimer();
                        disCount.innerText -= 1;
                    }
                    likeCount.innerText = likeCount_text;
                    disCount.innerText = disCount_text;

                }
            } else {
                if (!modal_like.classList.contains("modal_light")) {
                    modal_dislike.classList.toggle("modal_light");
                } else {
                    modal_like.classList.remove("modal_light");
                    modal_dislike.classList.add("modal_light");
                }
            }
        })
    }

    IsLike();
</script>

<script>
    var user = '<?php echo $session_value;?>';
    if (user) {
        $('.video-link').click(function (e) {

            e.preventDefault();
            var targetUrl = $(this).attr('rel');

            $.ajax({
                url: targetUrl,
                type: "GET",
                success: function () {
                },
                error: function () {

                    return false;
                }
            });


        });
    }

</script>