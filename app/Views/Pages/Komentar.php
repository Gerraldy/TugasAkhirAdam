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
  <div class="row">
      <div class="col-10" style="">
        <text style="font-size:12px; color:grey"><?= $namaKategori['Nama_Kategori'] ?></text>
        <div class="col-12" style="">
          <h4><?=$slug['Judul'] ?></h4>
          <div class="" style="">
            <div class=" section-foto" style="position:relative;">
              <img src="<?= base_url('public/uploads/gambar_post/'.$slug['Nama_Gambar']) ?>" class="img-fluid">
            </div>
            <div class="" style="">
              <div class="container-button-like" style="display:inline-block">
                  <button class="btn-like btn btn-block" data-id=<?= $slug['ID_Postingan'] ?>>
                    <?php if (!isset($slug["Like"])): ?>
                      <img src="<?= base_url('public/gambar/likehitam.png') ?>" style="height:20px;weight:20px;">
                    <?php else: ?>
                      <img src="<?= base_url('public/gambar/sudahlike.png') ?>" style="height:20px;weight:20px;">
                    <?php endif; ?>
                    <text>
                      <?= $slug['Suka'] ?>
                    </text>
                  </button>
              </div>
              <div class="container-button-dislike" style="display:inline-block">
                  <button id="" class="btn btn-block btn-dislike" data-id=<?= $slug['ID_Postingan'] ?>>
                    <?php if (!isset($slug["Dislike"])): ?>
                      <img src="<?= base_url('public/gambar/dislikeputih.png') ?>" style="height:21px;weight:21px;">
                    <?php else: ?>
                      <img src="<?= base_url('public/gambar/sudahdislike.jpg') ?>" style="height:20px;weight:20px;">
                    <?php endif; ?>
                    <text>
                      <?= $slug['Tidak_Suka'] ?>
                    </text>
                    <a href="https://www.facebook.com/" target="_blank">
                      <img src="<?= base_url('public/gambar/facebook.png') ?>" style="width:30px; height:30px">
                    </a>
                  </button>
              </div>
              <div class="" style="height:100px; width:auto; ">
                <form id="" action="<?=base_url('public/LikeKomen/submitKomentar?id_post='.$slug["ID_Postingan"])?>" method="POST">
                  <textarea id="isikomen"  style="height:50px ;width: 100%;" required data-required-msg="Please enter a text." data-max-msg="Enter value between 1 and 200" name="Isi_Komentar"></textarea>
                  <div class="k-form-footer">
                      <!-- <div class="k-counter-container" style="position: relative; left: 500px;"><span class="k-counter-value">0</span>/200</div> -->
                      <a href="#" target=""><img src="<?= base_url('public/gambar/kamera.png') ?>" style="width:40px; height:40px"></a>
                      <br>
                      <button id="cancel" class="k-button k-primary" style="position: relative; right: auto;">Cancel</button>
                      <button id="komen" type="submit" class="k-button k-primary" style="position: relative; right: auto;">Send</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-2">
      <div class="pt-5" style="">
        <button class="k-button btn btn-block">Save</button>
        <button class="k-button btn btn-block">Lapor</button>
        <button class="k-button btn btn-block">Tidak Masuk Akal</button>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <?php foreach ($komen as $k): ?>
      <div class="col-1">
          <a href="<?= base_url('/public/Pages/Profile?name='.$k['Nama']) ?>" class="mx-2" style="text-decoration:none">
            <img src="<?= base_url('public/gambar/hewan.png') ?>" style="height:40px;weight:40px;">
          </a>
      </div>
      <div class="col-11">
        <kbd><?=$k['Nama'] ?></kbd>
        <br>
        <p class="font-weight-normal"><?= nl2br($k['Isi_Komentar']) ?></p>
      </div>
      <hr>
    <?php endforeach; ?>
  </div>
</div>
<script>
    $(document).ready(function () {
      $(".option").kendoButton();

      $("#cancel").click(function () {
        $("#isikomen").val("");
      });
      $("#isikomen").kendoTextArea({
               rows: 10,
               maxLength:200,
               placeholder: "Berkomentarlah dengan Bijak!"
      });
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
