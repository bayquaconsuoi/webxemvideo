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
        <div class="input-field">
          <i class="fas fa-envelope"></i>
          <div style="position: relative;">
            <input type="email" id="email" name="email" placeholder="Địa chỉ email" />
            <label for="email">Địa chỉ email</label>
            <div class="form__input-error-message"></div>
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
<button class="g-recaptcha btn btn-primary" data-sitekey="YOUR_SITE_KEY" data-callback="submitForm">Submit</button>


<script src="../../public/js/validate.js"></script>
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
