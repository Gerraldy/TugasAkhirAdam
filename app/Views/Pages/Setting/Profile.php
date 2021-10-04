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
      <form action="<?=base_url('public/Upload/upload') ?>" method="post" enctype="multipart/form-data">
        <img src="<?= base_url('/public/gambar/profile.png')?>" href="<?= base_url('/public/gambar/profile.png')?>" data-upload="0" id="gambar-preview" alt="" style="width:80px; height:80px; object-fit: cover">
        <input type="file" name="Nama_Gambar" class="" id="Nama_Gambar" onchange="readURL(this);">
        <br>
        <br>
         Nama :   <input class="nama k-textbox" type="text" style="width:200p" name="nama" required><br>
         Jenis Kelamin :
                         <ul class="fieldlist">
                           <li>
                             <input type="radio" name="JKelamin" id="jk" class="k-radio">
                             <label class="k-radio-label" for="JK">Laki-laki</label>
                           </li>
                           <li>
                             <input type="radio" name="JKelamin" id="jk" class="k-radio">
                             <label class="k-radio-label" for="JK">Perempuan</label>
                           </li>
                        </ul><br>
                        Tgl Lahir :
                        <input id="tgl-lahir" value="10/10/2011" title="datepicker" />
        <br>
        <br>
        Tentang :
        <textarea id="judul" style="width: 50%;" required data-required-msg="Deskripsikan Tentangmu!!" name="Judul"></textarea>
        <br>
        <input type="submit" class="k-button" style="margin-top:20px" value="Simpan" id="btnsave" >
        <input type="submit" class="k-button" style="margin-top:20px" value="Batal" id="btncancel" >
      </form>
    </div>
  </div>
</div>

<?= $this->endSection();  ?>
