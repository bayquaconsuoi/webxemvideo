<link rel="stylesheet" href="../../public/css/manage.css">
<head>
<title>Manage</title>
<link rel="icon"
        href="https://64.media.tumblr.com/6c894cfef11f03c37c2688cedd03c508/tumblr_on8i9klcVA1uti1rro7_400.png">
</head>
<?php 
session_start();
if (!empty($_SESSION['message'])) {
  $message = $_SESSION['message'];
}
if (!empty($_SESSION['fail'])) {
  $fail = $_SESSION['fail'];
}
?>
<div class="container ">
  <div class="forms-container">
    <div class="signin-signup">
      <form class="sign-in-form" id="login" name="login" method="POST" action="progressLogin.php" >
        
        <h2 class="title">Đăng Nhập</h2>
        <?php 
          if (isset($_SESSION['message'])) {
            $success = <<< EOD
              <div class="success"> $message </div>
            EOD;
            echo $success;
            unset($_SESSION['message']);
          }
          if (isset($_SESSION['fail'])) {
            $fail = <<< EOD
              <div class="alert"> $fail </div>
            EOD;
            echo $fail;
            unset($_SESSION['fail']);
          }
        ?>
        <div class="input-field">
          <i class="fas fa-user"></i>
          <div style="position: relative;">
            <input type="text" id="emailLogin" name="emailLogin" placeholder="Email đăng nhập" />
            <label for="emailLogin">Email đăng nhập</label>
            <div class="form__input-error-message"></div>
          </div>
        </div>
        <div class="input-field">
          <i class="fas fa-lock"></i>
          <div style="position: relative;">
            <input type="password" id="passwordLogin" name="passwordLogin" placeholder="Mật khẩu" />
            <label for="passwordLogin">Mật khẩu</label>
            <div class="form__input-error-message"></div>
          </div>
        </div>
        <input type="submit" value="ĐĂNG NHẬP" class="btn solid" />

      </form>
      <form class="sign-up-form" id="createAccount" method="POST" action="progressRegister.php">
        <h2 class="title">Đăng Ký</h2>
        <div class="input-field">
          <i class="fas fa-user"></i>
          <div style="position: relative;">
            <input type="text" id="username" name="username" placeholder="Tên tài khoản" />
            <label for="username">Tên tài khoản</label>
            <div class="form__input-error-message"></div>
          </div>
        </div>
        <div class="input-field">
          <i class="fas fa-lock"></i>
          <div style="position: relative;">
            <input type="password" id="password" name="password" placeholder="Mật khẩu" />
            <label for="password">Mật khẩu</label>
            <div class="form__input-error-message"></div>
          </div>
        </div>
        <div class="input-field">
          <i class="fas fa-lock"></i>
          <div style="position: relative;">
            <input type="password" id="password-confirm" placeholder="Nhập lại mật khẩu" />
            <label for="password-confirm">Nhập lại mật khẩu</label>
            <div class="form__input-error-message"></div>
          </div>
        </div>
        <div class="input-field">
          <i class="fas fa-mobile-alt"></i>
          <div style="position: relative;">
            <input type="text" id="phone" name="phone" placeholder="Số điện thoại" />
            <label for="phone">Số điện thoại</label>
            <div class="form__input-error-message"></div>
          </div>
        </div>
        <div class="input-field" id="email_error">
          <i class="fas fa-envelope"></i>
          <div style="position: relative;">
            <input type="email" id="email" name="email" placeholder="Địa chỉ email" />
            <label for="email">Địa chỉ email</label>
            <div class="form__input-error-message" id="form__input-error-message_email"></div>
          </div>
        </div>

        <input type="submit" class="btn" value="ĐĂNG KÝ" />
      </form>
    </div>
  </div>

  <div class="panels-container">
    <div class="panel left-panel">
      <div class="content">
        <h3>Bạn chưa có tài khoản?</h3>
        <button class="btn transparent" id="sign-up-btn">
          ĐĂNG KÝ NGAY
        </button>
      </div>
    </div>
    <div class="panel right-panel">
      <div class="content">
        <h3>Bạn đã có tài khoản?</h3>
        <button class="btn transparent" id="sign-in-btn">
          ĐĂNG NHẬP NGAY
        </button>
      </div>
    </div>
  </div>
</div>

<script src="../../public/js/validate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  Validator({
    form: '#createAccount',
    formGroupSelector: '.input-field',
    errorSelector: '.form__input-error-message',
    rules: [
      Validator.isRequired('#username'),
      Validator.minLength('#username', 5),
      Validator.isRequired('#email'),
      Validator.isEmail('#email'),
      Validator.minLength('#phone', 9),
      Validator.isRequired('#phone'),
      Validator.Isphonenumber('#phone'),
      Validator.isRequired('#password'),
      Validator.testPass('#password'),
      Validator.minLength('#password', 8),
      Validator.isRequired('#password-confirm'),
      Validator.isConfirmed('#password-confirm', function () {
        return document.querySelector('#createAccount #password').value;
      }, 'Mật khẩu không trùng khớp')
    ],

  });
  Validator({
    form: '#login',
    formGroupSelector: '.input-field',
    errorSelector: '.form__input-error-message',
    rules: [
      Validator.isRequired('#emailLogin'),
      Validator.isEmail('#emailLogin'),
      Validator.isRequired('#passwordLogin'),
      Validator.minLength('#passwordLogin', 8),
    ],

  });
</script>
<!-- Check Email -->
<script type="text/javascript">
  $(document).ready(function(){
      $("#email").blur(function(){
        var email = $("#email").val();
      if (email !== "") {
            $.ajax({
              url : "checkEmail.php",
              type : "POST",
              cache:false,
              data : {email:email},
              success:function(result){
                if (result == 1) {
                  $("#email_error").addClass('invalid');
                  $("#form__input-error-message_email").text('Email này đã được sử dụng!');
                }
              }
            });

      }
      });
      $("#createAccount").on("submit",function(e){
        var email = $("#email").val();
      if (email !== "") {
            $.ajax({
              url : "checkEmail.php",
              type : "POST",
              cache:false,
              data : {email:email},
              success:function(result){
                if (result == 1) {
                  $("#email_error").addClass('invalid');
                  $("#form__input-error-message_email").text('Email này đã được sử dụng!');
                }
              }
            });

      }
      });
  });
</script>
<!-- Check Email  -->

<script>
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
</script>

<script>

