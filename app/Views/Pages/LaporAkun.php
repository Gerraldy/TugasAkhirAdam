<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>
<div class="container pt-3"  style="max-width:1000px; margin:auto">
  <div class="row">
    <div class="col-5" style="">
      <div class="" style="">
        <h4 style="color:white"><b>Detail Info</b></h4>
        <hr style="color:white">
        <div class="section-foto" style="position:relative;">
          <img src="<?= base_url('public/uploads/gambar_profile/'.$akun['url_foto']) ?>" class="img-fluid">
        </div>
      </div>
      <div class="pt-3">
        <text style="color:white">Username :</text>
        <text style="color:white; font-size:16px"><?= $akun['Username'] ?></text><br>
        <text style="color:white">Nama :</text>
        <text style="color:white; font-size:16px"><?= $akun['Nama'] ?></text>
      </div>
     </div>
     <div class="col-7" style="">
       <h4 style="color:white"><b>Laporan Akun</b></h4>
       <hr>
       <form action="<?=base_url('public/Pages/ReportAkun?idakun='.$akun['ID_Memers']) ?>" method="post" enctype="multipart/form-data">
       <text style="font-size:12px; color:grey">Tuliskan Alasanmu!</text>
       <textarea id="Alasan" style="width: 100%;" required data-required-msg="Alasan" name="Alasan"></textarea>
       <hr>
       <button class="k-button btn-outline-light">Laporkan!</button>
     </form>
     </div>
  </div>
</div>

<?= $this->endSection();  ?>
