<?php 
include_once('./../common/utility.php');
require_once ('./../db/dbhelper.php');

if (!empty($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

?>


<section class="cards">

<?php
$limit = 8;
$page  = 1;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
if ($page <= 0) {
	$page = 1;
}
$firstIndex = ($page-1)*$limit;

$sql = "SELECT * FROM video WHERE !deleted_at ORDER BY created_at desc".' limit '.$firstIndex.', '.$limit;;
$video = executeResult($sql);

$sql         = 'select count(id) as total from video where 1 and !deleted_at';
$countResult = executeSingleResult($sql);
$number      = 0;
if ($countResult != null) {
	$count  = $countResult['total'];
	$number = ceil($count/$limit);
}

$index = 1;

foreach ($video as $item) {
    $video = <<<EOD
    <div class="card">
    <div class="card-thumbnail">
        <a href="./../common/main/watch_video.php?id={$item['id']}">
            <div style="overflow: hidden;">
                <img src="https://img.youtube.com/vi/{$item['video_id']}/mqdefault.jpg" class="card-img" style="margin: 0 0; width: 100%;" alt="">
            </div>
        </a>
    </div>

    <div class="card-content">
        <div class="card-avatar">
        <a href="./../common/channel_user/channel.php?id={$item['user_id']}">
                <img class="user-avatar circular_image" src="../img/{$item['user_avatar']}" loading="lazy" alt="">
            </a>
        </div>

        <div class="card-description">
            <div class="card-name-options">
                <div class="card-name">
                    <a href="./../common/main/watch_video.php?id={$item['id']}">
                        <h3 class="card-title">{$item['tenvideo']}</h3>
                    </a>
                </div>
 
EOD;
echo $video;
?>
<?php
if (!empty($_SESSION['user'])) {
    $user = $_SESSION['user'];
        $video_3 = <<<EOD
                    <div class="card-options">
                        <div class="dropbtn fea-dropdown">
                            <button class="fea-dropbtn"><i class="fas fa-ellipsis-v"></i></button>
                            <div class="dropdown-content fea-dropdown-content">
                                <ul class="fea-sidebar-options">
                                    <li class="fea-sidebar-options__item">
                                        <a href="./../common/main/progressLater.php?user_id=$user&video_id={$item['id']}&type=add" class="sidebar-options__link">
                                            <span class="sidebar-options__icon">
                                                <i class="fas fa-stream"></i>
                                            </span>
                                            <span class="sidebar-options__name" id="save_btn">Thêm vào Video xem sau</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
        EOD;
        echo $video_3;
} else{
        $video_4 =<<<EOD
                    <div class="card-options">
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
                                            <a href="./../common/account_manage/manage.php">Đăng nhập</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        EOD;
        echo $video_4;
}
?>                              
<?php $video_2 = <<<EOD
                    <div class="card-user">
                        <a href="./../common/channel_user/channel.php?id={$item['user_id']}"><span class="card-user__name">{$item['user_name']}</span></a>
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
echo $video_2;
}
?>
</section>

<section class="cards cards_pagination">
    <?=paginarion($number, $page, '')?>
</section>


<?php 
if (!empty($_SESSION['success'])) {
    $success = $_SESSION['success'];
  }

if (isset($_SESSION['success'])) {
    $success_notify = <<< EOD
    <div id="notification">
        <div class="notify_content">
            <div class="notify_text" id="notify_text">$success</div>
        </div>
    </div>
    EOD;
    echo $success_notify;
    unset($_SESSION['success']);
}

?>

<!-- <div id="notification">
    <div class="notify_content">
        <div class="notify_text" id="notify_text">some text</div>
    </div>
</div> -->

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
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
        var dots = document.getElementsByClassName('card-options');
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
    // var save_btn = document.getElementById("save_btn");
    // var notify = document.getElementById("notification");
    // save_btn.onclick = function() {
    //     notify.classList.add("appear");
    // }
    });

</script>

<script>
    window.onclick = function (event) {
        if(!event.target.matches('#user_avatar')){
            document.getElementById("avatar_dropdown_container").classList.remove("show");
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
            var x = document.getElementsByClassName('card-options');
            var i;
            for (i = 0; i < x.length; i++) {
                var removeDot = x[i];
                if (removeDot.classList.contains('noHover')) {
                    removeDot.classList.remove('noHover');
                }
            }

        }
        
        var advancedmodal = document.getElementById("advancedModal");
        if (event.target == modal) {
            advancedmodal.style.display = "none";
            $('#action option').prop('selected', function() {
                return this.defaultSelected;
            });
        }
    }
    setTimeout(function(){
        $('#notification').remove();
    }, 5000);
</script>

<!-- <script>
    var user = '<?php echo $user;?>';
    if (user) {
        $('.sidebar-options__link').click(function (e) {

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

</script> -->
