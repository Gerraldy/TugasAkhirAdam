<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button> -->
<div class="container" style="padding: 16px; max-width:800px; margin:auto">
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

</div>

<script>
  $(document).ready(function () {
    // kalau sukses Login
    // 1. pencet register
    // 2. diarahkan ke cicontroller
    // 3. dari controller kamu bikin flashdata dikembaliin ke halaman login lagi
    // 4. di halaman login lagi pengecekan kalau sudah selesai registrasi alert!

    $("#login").kendoButton();
    $("#create").kendoButton();
    $("#cancel").kendoButton();
    $("#comment").kendoButton();

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

<?= $this->endSection();  ?>
