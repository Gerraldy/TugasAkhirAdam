
<link rel="stylesheet" href="<?= base_url('public/css/csslogin.css'); ?>" >
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
			<input type="email" name="email" placeholder="Email" />
      <input type="text" name="username" placeholder="Username" />
      <input type="text" name="nama" placeholder="Nama" />
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
