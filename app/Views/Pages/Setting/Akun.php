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
  <form action="<?=base_url('public/Pages/UpdateAkun') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
  <div class="row">
    <div class="col-2">
      <p style="color:white">Username :</p><br>
      <p style="color:white">Email :</p>  <br>
        <input type="submit" class="k-button" style="margin-top:20px" value="Simpan" id="btnsave" >
        <input type="submit" class="k-button" style="margin-top:20px" value="Batal" id="btncancel" >
    </div>
    <div class="col-10">
      <input class="nama k-textbox" type="text" style="width:200px" name="Username" value="" required><br><br>
      <input class="nama k-textbox" type="text" style="width:200px" name="Email" value="" required>
    </div>
  </div>
  </form>
</div>

<?= $this->endSection();  ?>
