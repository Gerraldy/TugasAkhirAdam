<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="row">
  <div class="col-8" style="">
    <div class="" style="">
      <h4><b><?= $postingan['Judul'] ?></b></h4>
      <div class="section-foto" style="position:relative;">
        <img src="<?= base_url('public/uploads/gambar_post/'.$postingan['Nama_Gambar']) ?>" class="img-fluid">
      </div>
    </div>


   </div>
   <div class="col-4" style="">
     <h4><b>Laporan Postingan</b></h4>
     <hr>
     <form action="<?=base_url('public/Pages/LaporanPostingan?slug='. $postingan['Slug']) ?>" method="post" enctype="multipart/form-data">
     <text style="font-size:12px; color:grey">Tuliskan Alasanmu!</text>
     <textarea id="Alasan" style="width: 100%;" required data-required-msg="Alasan" name="Alasan"></textarea>
     <hr>
     <button class="k-button btn btn-block">Laporkan!</button>
   </form>
   </div>
</div>


<?= $this->endSection();  ?>
