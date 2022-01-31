<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>
<style media="screen">
  .section-btn-dropdown{
    height:25px; width:40px;
    line-height: 12px;
    font-size: 8pt;
    font-family: tahoma;
    margin-top: 1px;
    margin-right: 2px;
    position:absolute;
    top:0;
    right:0;
  }
</style>
<div class="container" style="max-width:800px; margin:auto">
  <?php foreach($postinganKategori as $p) : ?>
  <div class="row">
      <div class="col-12" style="">
        <text style="font-size:12px; color:grey"></text>
        <div class="col-12" style="">
          <h4><b><?= $p['Judul'] ?></b></h4>
          <div class="section-foto" style="position:relative;">
            <img src="<?= base_url('public/uploads/gambar_post/'.$p['Nama_Gambar']) ?>" class="img-fluid">
            <div class=" section-btn-dropdown" style="">
              <button class="option btn btn-block">. . . </button>
            </div>
          </div>
          <div class="section-button-like" style="">
            <div class="">
              Like : <?= $p['Suka'] ?> komen : <?= $p['Tidak_Suka'] ?>
            </div>
            <div class="" style="display:inline-block">
              <button class="like btn btn-block" ><img src="<?= base_url('public/gambar/likehitam.png') ?>" style="height:20px;weight:20px;"></button>
            </div>
            <div class="" style="display:inline-block">
              <button class="dislike btn btn-block"><img src="<?= base_url('public/gambar/dislikeputih.png') ?>" style="height:21px;weight:21px;"></button>
            </div>
            <div class="" style="display:inline-block">
            <a href="<?= base_url('public/Pages/Komentar/'.$p['Slug'].'/'.$p['ID_Kategori']) ?>"><button class="comment btn btn-block"><img src="<?= base_url('public/gambar/komentarhitam.png') ?>" style="height:20px;weight:20px;"></button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
  <?php endforeach; ?>
  </div>
<script>
    $(document).ready(function () {
      $(".option").kendoButton();
      $(".like").kendoButton();
      $(".dislike").kendoButton();
      $(".comment").kendoButton();

    });
</script>

<?= $this->endSection();  ?>
