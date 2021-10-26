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
  <?php foreach($postingan as $p) : ?>
  <div class="row">
      <div class="col-10" style="">
        <text style="font-size:12px; color:grey"><?= $p['Nama_Kategori'] ?></text>
        <div class="col-12" style="">
          <h4><b><?= $p['Judul'] ?></b></h4>
          <div class="section-foto" style="position:relative;">
            <img src="<?= base_url('public/uploads/gambar_post/'.$p['Nama_Gambar']) ?>" class="img-fluid">
          </div>
          <br>
          <div class="section-button-like" style="">
            <div class="container-button-like" style="display:inline-block">
                <button class="btn-like btn btn-block" data-id=<?= $p['ID_Postingan'] ?>>
                  <?php if (!isset($p["Like"])): ?>
                    <img src="<?= base_url('public/gambar/likehitam.png') ?>" style="height:20px;weight:20px;">
                  <?php else: ?>
                    <img src="<?= base_url('public/gambar/sudahlike.png') ?>" style="height:20px;weight:20px;">
                  <?php endif; ?>
                  <text>
                    <?= $p['Suka'] ?>
                  </text>
                </button>
            </div>
            <div class="container-button-dislike" style="display:inline-block">
                <button id="" class="btn btn-block btn-dislike" data-id=<?= $p['ID_Postingan'] ?>>
                  <?php if (!isset($p["Dislike"])): ?>
                    <img src="<?= base_url('public/gambar/dislikeputih.png') ?>" style="height:21px;weight:21px;">
                  <?php else: ?>
                    <img src="<?= base_url('public/gambar/sudahdislike.jpg') ?>" style="height:20px;weight:20px;">
                  <?php endif; ?>
                  <text>
                    <?= $p['Tidak_Suka'] ?>
                  </text>
                </button>

            </div>
            <div class="" style="display:inline-block">
              <a href="<?= base_url('public/Pages/Komentar?slug='.$p['Slug'])?>">
                <button class="comment btn btn-block">
                  <img src="<?= base_url('public/gambar/komentarhitam.png') ?>" style="height:20px;weight:20px;">
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-2">
        <div class="pt-5" style="">
          <a href="<?= base_url('public/Pages/SavePost?slug='.$p['Slug']) ?>"><button class="k-button btn btn-block">Save</button></a>
          <button class="k-button btn btn-block">Lapor</button>
          <button class="k-button btn btn-block">Tidak Masuk Akal</button>
        </div>
      </div>
    </div>
    <hr>
  <?php endforeach; ?>
  </div>
<script>
    $(document).ready(function () {
      $(".like").kendoButton();
      $(".dislike").kendoButton();
      $(".comment").kendoButton();

      $(".btn-dislike").click(function(){
        let id_post = $(this).data("id");
        let t = $(this);
        $.ajax({
          type:"GET",
          url:"<?=base_url('public/LikeKomen/UnlikePost')?>",
          data:{id_post:id_post},
          dataType:"json",
          success:function(data){
            let jumlah_tidak_suka = data["count"].Tidak_Suka;
            if (data["sukses"]==1) {
              // BARU DISLIKE
              t.children("img").attr("src","<?= base_url('public/gambar/sudahdislike.jpg') ?>");
            }else if (data["sukses"]==0) {
              // HAPUS DISLIKE
              t.children("img").attr("src","<?= base_url('public/gambar/dislikeputih.png') ?>");
            }
            t.children("text").html(jumlah_tidak_suka);

            if (data["like"]=="1") {
              // ubah foto like\
              t.parent().siblings(".container-button-like").children(".btn-like").children("img").attr("src","<?= base_url('public/gambar/likehitam.png') ?>");
              t.parent().siblings(".container-button-like").children(".btn-like").children("text").html(data["jumlah_like"].Suka);
              // .children(".btn-like").children("img").attr("src","");
            }
          }
        });
      });

      $(".btn-like").click(function(){
        let id_post = $(this).data("id");
        let t = $(this);
        $.ajax({
          type:"GET",
          url:"<?= base_url('public/LikeKomen/LikePost') ?>",
          data:{id_post:id_post},
          dataType:"json",
          success:function(data){
            let jumlah_suka = data["count"].Suka;
            if (data["sukses"]== 1){
                t.children("img").attr("src","<?= base_url('public/gambar/sudahlike.png') ?>");
            }else if (data["sukses"]== 0){
                t.children("img").attr("src","<?= base_url('public/gambar/likehitam.png') ?>");
            }
            t.children("text").html(jumlah_suka);

            if (data["dislike"]=="1") {
              // ubah foto like\
              t.parent().siblings(".container-button-dislike").children(".btn-dislike").children("img").attr("src","<?= base_url('public/gambar/dislikeputih.png') ?>");
              t.parent().siblings(".container-button-dislike").children(".btn-dislike").children("text").html(data["jumlah_dislike"].Tidak_Suka);
              // .children(".btn-like").children("img").attr("src","");
            }
          }
        });
      });
    });
</script>

<?= $this->endSection();  ?>
