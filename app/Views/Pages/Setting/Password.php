<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <div class="row p-1">
    <div class="col-4">
      <a href="<?=base_url('public/Pages/SettingProfile') ?>" style="text-decoration: none">
        <button class="k-button" type="button" name="button">Profile</button>
      </a>
    </div>
    <div class="col-4">
      <a href="<?=base_url('public/Pages/SettingAkun') ?>" style="text-decoration: none">
        <button class="k-button" type="button" name="button">Akun</button>
      </a>
    </div><div class="col-4">
      <a href="<?=base_url('public/Pages/SettingPassword') ?>" style="text-decoration: none">
        <button class="k-button" type="button" name="button">Password</button>
      </a>
    </div>
  </div>
  <br>

  <form action="<?=base_url('public/Pages/UpdatePassword') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
  <div class="row">
    <div class="col-2">
      <p style="color:white">Password Baru: :</p><br>
      <p style="color:white">Konfirmasi :</p>  <br>
        <input type="submit" class="k-button" style="margin-top:20px" value="Simpan" id="btnsave" >

    </div>
    <div class="col-10">
      <input id="Password" class="nama k-textbox" type="password" style="width:200px" name="Password" required><br><br>
      <input id="CPassword" class="nama k-textbox" type="password" style="width:200px" name="CPassword" required><br><br>
      <input type="checkbox" onclick="LihatPassword()"><text style="color:white"> Lihat Password </text>
    </div>
  </div>
  </form>
  <a href="<?= base_url('/public/Pages/MyProfile') ?>"> <input type="submit" class="k-button" style="margin-top:20px" value="Batal" id="btncancel" ></a>
</div>

<script>
function LihatPassword() {
  var x = document.getElementById("Password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<?= $this->endSection();  ?>
