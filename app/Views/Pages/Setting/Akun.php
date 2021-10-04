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
  <div class="row">
    <div class="col-12">
      Username :   <input class="nama k-textbox" type="text" style="width:200px" name="nama" required><br>
      Email :      <input class="nama k-textbox" type="text" style="width:200px" name="nama" required><br>

      <!-- <form action="<?=base_url('public/Upload/upload') ?>" method="post" enctype="multipart/form-data">

      </form> -->

      <input type="submit" class="k-button" style="margin-top:20px" value="Simpan" id="btnsave" >
      <input type="submit" class="k-button" style="margin-top:20px" value="Batal" id="btncancel" >
    </div>
  </div>
</div>

<?= $this->endSection();  ?>
