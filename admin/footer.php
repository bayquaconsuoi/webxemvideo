<?php if (!empty($_SESSION['admin'])) { ?>
    <div class="clear-both"></div>
    </div>
    </div>
    <div id="footer">
        <div class="container">
            <div class="left-panel">
                © Copyright 2021 - Trung's YOUTUBE
            </div>
            <div class="right-panel">
                <a target="_blank" href="https://www.facebook.com/profile.php?id=100012888401855" title="Facebook Nguyễn Trung"><img height="48" src="images/facebook.png" /></a>
                
            </div>
            <div class="clear-both"></div>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="box-content">
            Bạn chưa đăng nhập. Mời bạn quay lại đăng nhập quản trị <a href="index.php">tại đây</a>
        </div>
    </div>
<?php } ?>
</body>
</html>