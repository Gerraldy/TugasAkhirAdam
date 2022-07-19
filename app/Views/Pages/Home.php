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
<div class="container" style="max-width:900px; margin:auto">
  <div class="m-2 p-3 " style="background-color:">
    <div class="row">
      <div class="col-4">
        <div class="">

        </div>
        <form class="" id="formSearch" action="<?= base_url('/public/Pages/Cari') ?>" method="get">
          <input id="search" name="cari" class="k-textbox nav-link" style="width:100%;height:40px;display:inline-block" placeholder="Cari Meme Disini!">
        </form>
      </div>
      <div class="col-2">
        <a class="btn nav-link" href="<?= base_url('/public/Pages/Topic1') ?>" style="border:2px solid white; border-radius:50px;color:white"><img src="<?= base_url('public/gambar/virus.png')?>" style="height:20px;weight:20px;">Covid19</a>
      </div>
      <div class="col-2">
        <a class="btn nav-link" href="<?= base_url('/public/Pages/Topic2') ?>" style="border:2px solid white; border-radius:50px;color:white; margin:auto"><img src="<?= base_url('public/gambar/pemerintah.png')?>" style="height:20px;weight:20px;">Chat</a>
      </div>
      <div class="col-2">
        <a class="btn nav-link" href="<?= base_url('/public/Pages/Topic3') ?>" style="border:2px solid white; border-radius:50px;color:white"><img src="<?= base_url('public/gambar/vaksin.png')?>" style="height:20px;weight:20px;">Vaksin</a>
      </div>
      <div class="col-2">
        <a class="btn nav-link" href="<?= base_url('/public/Pages/Topic4') ?>" style="border:2px solid white; border-radius:50px;color:white"><img src="<?= base_url('public/gambar/kopi.png')?>" style="height:20px;weight:20px;">Cafe</a>
      </div>
    </div>

  </div>
  <!-- <div class="w3-content w3-display-container" style="max-width:100%">
  <a href="<?= base_url('public/Pages/Komentar?slug='.$postingan[0]['Slug'])?>"><img class="mySlides w3-animate-fading img-fluid" src="<?= base_url('public/uploads/gambar_post/'.$postingan[0]['Nama_Gambar']) ?>" style=""></a>
  <a href="<?= base_url('public/Pages/Komentar?slug='.$postingan[1]['Slug'])?>"><img class="mySlides w3-animate-fading img-fluid" src="<?= base_url('public/uploads/gambar_post/'.$postingan[1]['Nama_Gambar']) ?>" style=""></a>
  <a href="<?= base_url('public/Pages/Komentar?slug='.$postingan[2]['Slug'])?>"><img class="mySlides w3-animate-fading img-fluid" src="<?= base_url('public/uploads/gambar_post/'.$postingan[2]['Nama_Gambar']) ?>" style=""></a>
  <a href="<?= base_url('public/Pages/Komentar?slug='.$postingan[3]['Slug'])?>"><img class="mySlides w3-animate-fading img-fluid" src="<?= base_url('public/uploads/gambar_post/'.$postingan[3]['Nama_Gambar']) ?>" style=""></a>
  <a href="<?= base_url('public/Pages/Komentar?slug='.$postingan[4]['Slug'])?>"><img class="mySlides w3-animate-fading img-fluid" src="<?= base_url('public/uploads/gambar_post/'.$postingan[4]['Nama_Gambar']) ?>" style=""></a>
  </div> -->
  <hr>
  <?php foreach($postingan as $p) : ?>
  <div class="row">
      <div class="col-1">
      </div>
      <div class="col-10" style="">
        <div class="row">

        <h4 style="color:white"><b><?= $p['Judul'] ?></b></h4>
        <div class="col-2" style="background-color: black">
        </div>
        <div class="col-8" style="background-color: black">

          <?php $tipefile = explode(".",$p['Nama_Gambar']) ?>
          <?php $tipefile_ext = end($tipefile)  ?>
          <?php if ($tipefile_ext == "mp4"): ?>
            <div id="example">
                <div class="demo-section wide" style="max-width: 644px;">
                    <div id="mediaplayer" style="height:360px"></div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#mediaplayer").kendoMediaPlayer({
                            autoPlay: true,
                            navigatable: true,
                            media: {
                                title: "<?= $p['Judul'] ?>",
                                source: "<?= base_url('public/uploads/gambar_post/'.$p['Nama_Gambar']) ?>"
                            }
                        });
                    });
                </script>
            </div>
          <?php else: ?>

            <div class="section-foto" style="position:relative;">
              <img src="<?= base_url('public/uploads/gambar_post/'.$p['Nama_Gambar']) ?>" class="img-fluid">
            </div>
          <?php endif; ?>
          <br>

        </div>
        <div class="col-2" style="background-color: black">
        </div>
        <a class="btn btn-outline-light" href="<?=base_url('/public/Pages/getPostKategori/'.$p['ID_Kategori']) ?>" style="background:grey; border:none; border-radius:10px ;width: 100px;height:100%; padding:1px">#<?=$p['Nama_Kategori'] ?></a>
        <div class="section-button-like" style="">
          <div class="container-button-like" style="display:inline-block">
              <button class="btn-like k-button" data-id=<?= $p['ID_Postingan'] ?> style="">
                <?php if (!isset($p["Like"])): ?>
                  <img src="<?= base_url('public/gambar/likehitam.png') ?>" style="height:20px;weight:20px;">
                <?php else: ?>
                  <img src="<?= base_url('public/gambar/sudahlike2.png') ?>" style="height:20px;weight:20px;">
                <?php endif; ?>
                <text>
                  <?= $p['Suka'] ?>
                </text>
              </button>
          </div>
          <div class="container-button-dislike" style="display:inline-block">
              <button id="" class="k-button btn-dislike" data-id=<?= $p['ID_Postingan'] ?>>
                <?php if (!isset($p["Dislike"])): ?>
                  <img src="<?= base_url('public/gambar/dislikeputih.png') ?>" style="height:21px;weight:21px;">
                <?php else: ?>
                  <img src="<?= base_url('public/gambar/sudahdislike2.png') ?>" style="height:20px;weight:20px;">
                <?php endif; ?>
                <text>
                  <?= $p['Tidak_Suka'] ?>
                </text>
              </button>
          </div>
          <div class="" style="display:inline-block">
            <a href="<?= base_url('public/Pages/Komentar?slug='.$p['Slug'])?>">
              <button class="comment k-button btn-block">
                <img src="<?= base_url('public/gambar/komentarhitam.png') ?>" style="height:20px;weight:20px;">
              </button>
            </a>
          </div>
        </div>
        </div>
      </div>
      <div class="col-1">
        <div class="pt-5" style="">
           <a href="<?= base_url('public/Pages/SavePost?slug='.$p['Slug']) ?>"><button class="btn btn-outline-light">Save</button></a>
          <a href="<?= base_url('public/Pages/LaporPost?slug='.$p['Slug']) ?>"><button class="btn btn-outline-light">Lapor</button></a>
          <button class="btn btn-outline-light">Tidak Masuk Akal</button>
        </div>
      </div>
    </div>
    <hr>
  <?php endforeach; ?>
  </div>
<script>
    $(document).ready(function () {

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
              t.children("img").attr("src","<?= base_url('public/gambar/sudahdislike2.png') ?>");
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
                t.children("img").attr("src","<?= base_url('public/gambar/sudahlike2.png') ?>");
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

    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}
      x[myIndex-1].style.display = "block";
      setTimeout(carousel, 7000); // Change image every 2 seconds
    }

    var data = [
              "ngakak",
              "game",
              "anime",
              "hewan",
              "sport",
              "jodoh",
              "art",
              "NSFW"
          ];
          $("#search").keypress(function(){
            var keycode = (event.keyCode ? event.keyCode : event.which);
              if(keycode == '13'){
                  $("#formSearch")[0].submit();

              }
          });
</script>

<?= $this->endSection();  ?>
