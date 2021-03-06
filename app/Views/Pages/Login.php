<style media="screen">
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
box-sizing: border-box;
}

body {
background: #232222;
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
font-family: 'Montserrat', sans-serif;
height: 100vh;
margin: -20px 0 50px;
}

h1 {
font-weight: bold;
margin: 0;
}

h2 {
text-align: center;
}

p {
font-size: 14px;
font-weight: 100;
line-height: 20px;
letter-spacing: 0.5px;
margin: 20px 0 30px;
}

span {
font-size: 12px;
}

a {
color: #333;
font-size: 14px;
text-decoration: none;
margin: 15px 0;
}

button {
border-radius: 20px;
border: 3px solid #FF4B2B;
background-color: #232222;
color: #FFFFFF;
font-size: 12px;
font-weight: bold;
padding: 12px 45px;
letter-spacing: 1px;
text-transform: uppercase;
transition: transform 80ms ease-in;
}

button:active {
transform: scale(0.95);
}

button:focus {
outline: none;
}

button.ghost {
background-color: transparent;
border-color: #FFFFFF;
}

form {
background-color: #FFFFFF;
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
padding: 0 50px;
height: 100%;
text-align: center;
}

input {
background-color: #eee;
border: none;
padding: 12px 15px;
margin: 8px 0;
width: 100%;
}

.container {
background-color: #fff;
border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25),
    0 10px 10px rgba(0,0,0,0.22);
position: relative;
overflow: hidden;
width: 768px;
max-width: 100%;
min-height: 480px;
}

.form-container {
position: absolute;
top: 0;
height: 100%;
transition: all 0.6s ease-in-out;
}

.sign-in-container {
left: 0;
width: 50%;
z-index: 2;
}

.container.right-panel-active .sign-in-container {
transform: translateX(100%);
}

.sign-up-container {
left: 0;
width: 50%;
opacity: 0;
z-index: 1;
}

.container.right-panel-active .sign-up-container {
transform: translateX(100%);
opacity: 1;
z-index: 5;
animation: show 0.6s;
}

@keyframes show {
0%, 49.99% {
  opacity: 0;
  z-index: 1;
}

50%, 100% {
  opacity: 1;
  z-index: 5;
}
}

.overlay-container {
position: absolute;
top: 0;
left: 50%;
width: 50%;
height: 100%;
overflow: hidden;
transition: transform 0.6s ease-in-out;
z-index: 100;
}

.container.right-panel-active .overlay-container{
transform: translateX(-100%);
}

.overlay {
background-color: #232222;
background-repeat: no-repeat;
background-size: cover;
background-position: 0 0;
color: #FFFFFF;
position: relative;
left: -100%;
height: 100%;
width: 200%;
  transform: translateX(0);
transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  transform: translateX(50%);
}

.overlay-panel {
position: absolute;
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
padding: 0 40px;
text-align: center;
top: 0;
height: 100%;
width: 50%;
transform: translateX(0);
transition: transform 0.6s ease-in-out;
}

.overlay-left {
transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
transform: translateX(0);
}

.overlay-right {
right: 0;
transform: translateX(0);
}

.container.right-panel-active .overlay-right {
transform: translateX(20%);
}

.social-container {
margin: 20px 0;
}

.social-container a {
border: 1px solid #DDDDDD;
border-radius: 50%;
display: inline-flex;
justify-content: center;
align-items: center;
margin: 0 5px;
height: 40px;
width: 40px;
}


</style>
<link rel="stylesheet" href="<?= base_url('public/kendoStyle/kendo.common.min.css'); ?>" >
<link rel="stylesheet" href="<?= base_url('public/kendoStyle/kendo.default.min.css'); ?>" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<script src="https://kendo.cdn.telerik.com/2021.1.119/js/kendo.all.min.js"></script>
<script>
    if (typeof kendo == "undefined") {
        document.write(decodeURIComponent('%3Clink rel="stylesheet" href="/path/to/local/kendo.common.min.css" %3C/%3E'));
        document.write(decodeURIComponent('%3Clink rel="stylesheet" href="/path/to/local/kendo.blueopal.min.css" %3C/%3E'));
        document.write(decodeURIComponent('%3Cscript src="/path/to/local/kendo.all.min.js" %3E%3C/script%3E'));

    }
  </script>

  <a class="navbar-nav" href="<?= base_url('/public') ?>">
    <img src="<?= base_url('/public/gambar/Logo.png') ?>" alt="Avatar" class="avatar" style="width: 150px; border-radius: 10%;">
  </a>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="<?=base_url('public/Auth/register') ?>">
			<h1>Create Account</h1>
      <?= csrf_field(); ?>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-google"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="email" name="Email" placeholder="Email" />
      <input type="text" name="Username" placeholder="Username" />
      <input type="text" name="Nama" placeholder="Nama" />
			<input type="password" name="Password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="<?= base_url('public/Auth/Masuk') ?>">
      <?= csrf_field(); ?>
			<h1>login</h1>
			<div class="social-container">
        <a href="#" class="social"><i class="fab fa-google"></i></a>
			</div>
			<span>or use your account</span>
			<input class="email" type="text" name="email" placeholder="Email" />
			<input class="password" type="password" name="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right" style="background-image:">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
container.classList.remove("right-panel-active");
});
</script>





<!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button> -->
<!-- <div class="container" style="padding: 16px; max-width:800px; margin:auto">
  <div class="imgcontainer" style="text-align: center; margin: 24px 0 12px 0; position: relative;">
    <img src="<?= base_url('/public/gambar/Logo.png') ?>" alt="Avatar" class="avatar" style="width: 40%; border-radius: 20%;">
  </div>
  <div class="row">
    <div class="col-6" style="position: relative">
      <div class="" >
        <h4>LOGIN! </h4>
        <form class="" action="<?= base_url('public/Auth/Masuk') ?>" method="post">
          <input class="email" type="text" style="width:200p" name="email" required>
          <br>
          <input class="password" type="password" style="width:200p" name="password" required>
          <br>
          <div style="position: relative; top:113px">
            <button id="login" type="submit" style="padding: 7px 20px; margin: 8px 0;">Masuk!</button>
            <label style="position: relative; left:20px">
                <input type="checkbox" checked="checked" name="remember" > Remember me
            </label>
          </div>
        </form>


      </div>
    </div>

    <div class="col-6" style="">
      <form action="<?=base_url('public/Auth/register') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="" style="position: relative;">
          <h4>BUAT AKUN! </h4>
          <input class="email" type="text" style="width:200p" name="Email" required>
          <br>
          <input class="username" type="text" style="width:200p" name="Username" required>
          <br>
          <input class="nama" type="text" style="width:200p" name="Nama" required>
          <br>
          <input class="password" type="password" style="width:200p" name="Password" required>
          <br>
          <button id="create" type="submit" style="padding: 7px 20px; margin: 8px 0;">Bergabung</button>
        </div>
      </form>
    </div>
  </div>
  <div id="appendto" class="demo-section k-content"></div>
  <div class="container" style="background-color:grey; max-width:auto; height: 60px">
    <button type="button" id="cancel" style="position: relative; top: 7px;width: auto; padding: 10px 18px; background-color: red; ">Cancel</button>
    <span class="psw" style="float: right; padding-top: 16px;">Forgot <a href="#">password?</a></span>
  </div>

  <span id="staticNotification"></span>

</div> -->

<script>



  $(document).ready(function () {
    // kalau sukses Login
    // 1. pencet register
    // 2. diarahkan ke cicontroller
    // 3. dari controller kamu bikin flashdata dikembaliin ke halaman login lagi
    // 4. di halaman login lagi pengecekan kalau sudah selesai registrasi alert!

    $(".email").kendoTextBox({
      placeholder: "Email",
        label: {
          content: "Email",
          floating: true
        }
      });
    $(".nama").kendoTextBox({
      placeholder: "Nama Kamu",
        label: {
          content: "Nama Kamu",
          floating: true
        }
      });
    $(".username").kendoTextBox({
      placeholder: "Username",
        label: {
          content: "Username",
          floating: true
        }
      });
    $(".password").kendoTextBox({
      placeholder: "Password",
        label: {
          content: "Password",
          floating: true
        }
      });
    var staticNotification = $("#staticNotification").kendoNotification({
      appendTo: "#appendto"
    }).data("kendoNotification");
    $("#login").click(function(){
    });
    <?php if (session()->getFlashdata('sukses-registrasi')) :?>
      staticNotification.show("Berhasil Registrasi" ,"success");
    <?php endif; ?>

    <?php if (session()->getFlashdata('gagal-registrasi')) :?>
      staticNotification.show("Email Atau Username Sudah Terdaftar" ,"error");
    <?php endif; ?>



  });

</script>
