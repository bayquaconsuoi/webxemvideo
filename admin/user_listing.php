<?php
include 'header.php';
?>

<?php
if (!empty($_SESSION['admin'])) {
    $limit = 6;
    $page  = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    if ($page <= 0) {
        $page = 1;
    }
    $firstIndex = ($page-1)*$limit;
    
    $sql = "SELECT * FROM account ORDER BY id asc".' limit '.$firstIndex.', '.$limit;;
    $account = executeResult($sql);
    
    $sql         = 'select count(id) as total from account where 1 ';
    $countResult = executeSingleResult($sql);
    $number      = 0;
    if ($countResult != null) {
        $count  = $countResult['total'];
        $number = ceil($count/$limit);
    }
    
    $index = 1;
}
?>

<div class="container-fluid" id="main_container">
    <div class="side_container col-xl-2">
        <div class="side_container_inner">
            <div class="side_title">Quản lý trang web</div>
                <div class="web_controls">
                    <div class="web_option_button">
                        <a href="user_listing.php">Quản lý người dùng</a>
                    </div>
                    <div class="web_option_button">
                        <a href="video_listing.php">Quản lý video người dùng</a>
                    </div>
                    <div class="web_option_button">
                        <a href="category_listing.php"> Quản lý danh mục</a>
                    </div>
                    <div class="web_option_button">
                        <a href="notify.php">Đăng thông báo</a>
                </div>
            </div>
            <div class="side_icon_page_container">
                <a href="../main/">
                    <div class="side_icon_container">
                        <img src="../img/icon_page/icon_page.png" class="icon_page" alt="">
                    </div>
                    <div class="side_icon_name_container">
                        Trung's YOUTUBE
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="main_container col-xl-10">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">STT</th>
            <th scope="col">Id</th>
            <th scope="col">Tên người dùng</th>
            <th scope="col">Avatar</th>
            <th scope="col">Email</th>
            <th scope="col">Điện thoại</th>
            <th scope="col">Ngày tham gia</th>
            <th scope="col">Ngày cập nhật</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 0;
                foreach ($account as $item) {  
                    $i++;             
                    $account = <<< EOD
                    <tr>
                    <th scope="row">$i</th>
                        <td>{$item['id']}</td>
                        <td>{$item['user_name']}</td>
                        <td><img src="../img/{$item['user_avatar']}" alt="" class="info_user_avatar"></td>
                        <td>{$item['email']}</td>
                        <td>{$item['phone']}</td>
                        <td>{$item['created_at']}</td>
                        <td>{$item['updated_at']}</td>
                        <td class="info_user_options">
                            <div class="btn_edit">
                                <button class="btn btn-primary">Sửa</button>
                            </div>
                            <div>
                                <button class="btn btn-danger">Xóa</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    EOD;
                    echo $account;
                }
            ?>
        </tbody>
    </table>
        <div>
            <button class="btn btn-success">Thêm người dùng</button>
            <?=paginarion($number, $page, '')?>
        </div>
    </div>
</div>


<?php
include './footer.php';
?>
