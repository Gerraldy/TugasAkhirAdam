<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container pt-3" style="margin:auto">

    <div class="row" >
      <div class="col-2">
        <?php if ($profile['url_foto'] == ""): ?>
          <img src="<?= base_url('/public/gambar/profile.png') ?>" id="fotoprofile" class="img-fluid" style="height:100px;weight:100px;border-radius:50%; object-fit: cover;display: flex;justify-content: center;align-items: center;">
          <?php else: ?>
            <img src="<?= base_url('public/uploads/gambar_profile/'. $profile['url_foto']) ?>" id="fotoprofile" class="img-fluid" style="height:100px;weight:100px;border-radius:50%; object-fit: cover;display: flex;justify-content: center;align-items: center;">
        <?php endif; ?>
      </div>
      <div class="col-10 ">
        <text style="color: ;position:relative; top:10px;font-size:20px"><?=$profile['Username'] ?></text><br><br>
        <!-- <hr style="height:3px;border-width:0;color:black;background-color:black"> -->
        <text style="color:; top:10px;font-size:13px">Follower : <?=$follower ?></text> ||
        <text style="color:;font-size:13px">Following : <?=$following?></text>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <text style="color: ;"><?= $profile['Tentang'] ?> </text>
      </div>
    </div>
    <div class="row" style="position:relative; top:10px">
      <div class="col-1">
        <button class="k-button btn-outline-dark" id="showPost" name="button" style="width:70px">Postingan</button>
      </div>
      <div class="col-1">
        <button class="k-button btn-outline-dark" id="showLike" name="button" style="width:70px">Disukai</button>
      </div>
      <div class="col-10">
        <button class="k-button btn-outline-dark" id="showSave" name="button" style="width:70px">Simpan</button>
      </div>
    </div>
  <hr style="height:3px;color:black;background-color:white">
  <div class="row" id="post">
    <?php foreach($mypostingan as $p) : ?>
      <div class="row" >
        <div class="col-lg-11" style="">
            <div class="row">
            <div class="col-lg-10 border" style="border: 2px solid ;border-radius: 20px;">
              <?php $tipefile = explode(".",$p['Nama_Gambar']) ?>
              <?php $tipefile_ext = end($tipefile)  ?>
              <?php if ($tipefile_ext == "mp4"): ?>
                <div class="pt-3">
                  <a href="#"style="color:"><?=$p['Username'] ?></a>
                </div>
                <div id="vidio">
                    <div class="demo-section wide" style="max-width: 644px;">
                        <div id="mediaplayer<?=$p['ID_Postingan'] ?>" style="height:360px"></div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#mediaplayer<?=$p['ID_Postingan'] ?>").kendoMediaPlayer({
                                autoPlay: false,
                                navigatable: false,
                                media: {
                                    title: "  ",
                                    source: "<?= base_url('public/uploads/gambar_post/'.$p['Nama_Gambar']) ?>"
                                }
                            });
                        });
                    </script>
                </div>
              <?php else: ?>

                <div class="pt-3">
                  <a href="#"style="color:"><?=$p['Username'] ?></a>
                </div>

                <div class="section-foto" style="display: flex;justify-content: center;">

                  <img src="<?= base_url('public/uploads/gambar_post/'.$p['Nama_Gambar']) ?>" class="img-fluid">
                </div>
              <?php endif; ?>
              <br>

            </div>
            <div class="col-lg-2" style="background-color:">
              <h4 style="color:"><b><?= $p['Judul'] ?></b></h4>
              <a class="btn btn-outline-light m-1" href="<?=base_url('/public/Pages/getPostKategori/'.$p['ID_Kategori']) ?>" style="background:grey; border:none; border-radius:10px; padding:1px">#<?=$p['Nama_Kategori'] ?></a>
              <div class="section-button-like pt-2" style="">
                <div class="container-button-like" style="display:inline-block">
                    <button class="btn-like k-button btn btn-outline-dark" data-id=<?= $p['ID_Postingan'] ?> style="padding: 5px 13px;border: 2px solid ;border-radius: 20px;background-color: ;">
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

                <div class="container-button-dislike pt-2" style="display:inline-block">
                    <button id="" class="btn-dislike k-button btn-outline-dark" style="padding: 5px 13px;border: 2px solid ;border-radius: 20px;background-color:;" data-id=<?= $p['ID_Postingan'] ?>>
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
                <br>
                <div class="pt-2" style="display:inline-block">
                  <a href="<?= base_url('public/Pages/Komentar?slug='.$p['Slug'])?>">
                    <button class="comment k-button btn-outline-dark btn-block" style="padding: 5px 13px;border: 2px solid ;border-radius: 20px;background-color: ;">
                      <img src="<?= base_url('public/gambar/komentarhitam.png') ?>" style="height:20px;weight:20px;">
                    </button>
                  </a>
               </div>
              </div>
             </div>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="" style="">
              <div class="dropdown">
                <button class="dropbtn">!</button>
                <div class="dropdown-content">
                  <a href="<?= base_url('public/Pages/SavePost?slug='.$p['Slug']) ?>" style="color:; text-decoration: none; ">Save</a>
                  <a href="<?= base_url('public/Pages/LaporPost?slug='.$p['Slug']) ?>" style="color:; text-decoration: none;">Lapor</a>
                  <a href="<?= base_url('public/Pages/TidakMasukAkal?slug='.$p['Slug']) ?>" style="color:; text-decoration: none; ">Tidak Masuk Akal</a>
                </div>
              </div>
            </div>
          </div>
        </div>
       <br>
    <?php endforeach; ?>
  </div>

</div>

</div>
<script>
    $(document).ready(function () {
      $('#save').css('display', 'none');
      $('#Like').css('display', 'none');

      $("#showLike").click(function(){
        $("#post").hide();
        $("#like").show();
        $("#save").hide();
      });
      $("#showPost").click(function(){
        $("#post").show();
        $("#like").hide();
        $("#save").hide();
      });
      $("#showSave").click(function(){
        $("#post").hide();
        $("#like").hide();
        $("#save").show();
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
        //alert("suka");
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
</script>
<?= $this->endSection();  ?>
