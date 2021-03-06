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
      <form action="<?=base_url('public/Pages/UpdateProfile') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <img src="<?= base_url('/public/gambar/profile.png')?>" href="<?= base_url('/public/gambar/profile.png')?>" data-upload="0" id="gambar-preview" alt="" style="width:80px; height:80px; object-fit: cover">
        <input type="file" name="url_foto" class="" id="url_foto" onchange="readURL(this);">
        <br>
        <br>
        <div class="row">
          <div class="col-2">
            <p style="color:white">Nama :</p><br>
            <p style="color:white">Tanggal Lahir :</p>  <br>
            <p style="color:white">Tentang :</p>  <br>
              <input type="submit" class="k-button" style="margin-top:20px" value="Simpan" id="btnsave" >

          </div>
          <div class="col-10">
            <input id="Nama" class="nama k-textbox" type="text" style="width:200p" name="Nama" value="<?=$user['Nama'] ?>" required><br><br>
            <input id="tgl-lahir" type="k-datepicker" value="<?=$user['Tgl_Lahir'] ?>" title="datepicker" name="Tgl_Lahir"><br><br><br>
            <textarea id="Tentang" class="k-textarea"  style="width: 50%;" required data-required-msg="Deskripsikan Tentangmu!!" name="Tentang"><?=$user['Tentang'] ?></textarea>
          </div>
        </div>
      </form>
      <a href="<?= base_url('/public/Pages/MyProfile') ?>"> <input type="submit" class="k-button" style="margin-top:20px" value="Batal" id="btncancel" ></a>
    </div>
  </div>
</div>

<script>
$("#tgl-lahir").kendoDatePicker();
function readURL(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#gambar-preview')
            .attr('src', e.target.result);
        $('#gambar-preview')
            .attr('href', e.target.result).data("upload","1");

            $('#gambar-preview').magnificPopup({
               type: 'image'
               // other options
             });
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>

<?= $this->endSection();  ?>
