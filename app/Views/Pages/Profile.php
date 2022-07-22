<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="margin:auto">

    <div class="row" >
      <div class="col-2">
        <?php if ($profile['url_foto'] == ""): ?>
          <img src="<?= base_url('/public/gambar/profile.png') ?>" id="fotoprofile" class="img-fluid" style="height:100px;weight:100px;border-radius:50%; object-fit: cover;display: flex;justify-content: center;align-items: center;">
          <?php else: ?>
            <img src="<?= base_url('public/uploads/gambar_profile/'. $profile['url_foto']) ?>" id="fotoprofile" class="img-fluid" style="height:100px;weight:100px;border-radius:50%; object-fit: cover;display: flex;justify-content: center;align-items: center;">
        <?php endif; ?>  
      </div>
      <div class="col-10">
        <p style="color:white ;position:relative; top:10px;font-size:20px"><?=$profile['Nama'] ?></p>
        <!-- <hr style="height:3px;border-width:0;color:black;background-color:black"> -->
        <p style="color:white ;position:relative;"><?=$profile['Email'] ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <p style="color:white ;"><?= $profile['Tentang'] ?> </p>
      </div>
    </div>
    <div class="row" style="position:relative; top:10px">
      <div class="col-1">
        <button class="k-button" id="showHome" name="button" style="width:70px">Home</button>
      </div>
      <div class="col-1">
        <button class="k-button" id="showPost" name="button" style="width:70px">Post</button>
      </div>
      <div class="col-10">
        <button class="k-button" id="showSave" name="button" style="width:70px">Save</button>
      </div>
    </div>


  <hr style="height:3px;color:black;background-color:black">
  <div class="row" id="home">
    <div class="col">
      <div class="" style="height:250px">
        <div class="container" style="max-width:800px; margin:auto">
          <?php foreach($postingan as $p) : ?>
          <div class="row">

                  <h4 style="color:white ;"><b><?= $p['Judul'] ?></b></h4>
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
                                          title: "ProgressNEXT 2019 Highlights",
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
                  </div>
                  <div class="col-2" style="background-color: black">
                  </div>

                  <br>
                  <a class="btn btn-outline-light" href="<?=base_url('/public/Pages/getPostKategori/'.$p['ID_Kategori']) ?>" style="background:grey; border:none; border-radius:10px ;width: 100px;height:100%; padding:1px">#<?=$p['Nama_Kategori'] ?></a>
                  <div class="section-button-like" style="">
                    <div class="container-button-like" style="display:inline-block">
                        <button class="btn-like btn k-button" data-id=<?= $p['ID_Postingan'] ?> style="">
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
                        <button id="" class="btn k-button btn-dislike" data-id=<?= $p['ID_Postingan'] ?>>
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
                        <button class="comment btn k-button btn-block">
                          <img src="<?= base_url('public/gambar/komentarhitam.png') ?>" style="height:20px;weight:20px;">
                        </button>
                      </a>
                    </div>
                  </div>

            </div>
            <hr>
            <?php endforeach; ?>
          </div>
      </div>
    </div>
  </div>

  <div class="row" id="postingan">
    <div class="col">
      <div class="" style="height:250px">
        <div class="container" style="max-width:800px; margin:auto">
          <?php foreach($mypostingan as $p) : ?>
          <div class="row">
            <div class="col-2" style="background-color: black">
            </div>
            <div class="col-8" style="background-color: black">

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
                                    title: "ProgressNEXT 2019 Highlights",
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
            </div>
            <div class="col-2" style="background-color: black">
            </div>

                  <br>
                  <a class="btn btn-outline-light" href="<?=base_url('/public/Pages/getPostKategori/'.$p['ID_Kategori']) ?>" style="background:grey; border:none; border-radius:10px ;width: 100px;height:100%; padding:1px">#<?=$p['Nama_Kategori'] ?></a>
                  <div class="section-button-like" style="">
                    <div class="container-button-like" style="display:inline-block">
                        <button class="btn-like btn btn-block" data-id=<?= $p['ID_Postingan'] ?>>
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
                        <button id="" class="btn btn-block btn-dislike" data-id=<?= $p['ID_Postingan'] ?>>
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
                      <a href="<?= base_url('public/Pages/Komentar?slug='.$p['Slug']."&id_kategori=".$p['ID_Kategori']."&id_postingan=".$p['ID_Postingan'])?>">
                        <button class="comment btn btn-block">
                          <img src="<?= base_url('public/gambar/komentarhitam.png') ?>" style="height:20px;weight:20px;">
                        </button>
                      </a>
                    </div>
                  </div>

            </div>
            <hr>
            <?php endforeach; ?>
          </div>
      </div>
    </div>
  </div>

  <div class="row" id="save">
    <div class="col">
      <div class="" style="height:250px">
        <div class="container" style="max-width:800px; margin:auto">
          <?php foreach($savepost as $p) : ?>
          <div class="row">
              <div class="col-12" style="">
                <text style="font-size:12px; color:grey"><?= $p['Nama_Kategori']?></text>
                <div class="col-12" style="">
                  <h4><b><?= $p['Judul'] ?></b></h4>
                  <div class="section-foto" style="position:relative;">
                    <img src="<?= base_url('public/uploads/gambar_post/'.$p['Nama_Gambar']) ?>" class="img-fluid">
                    <!-- <div class=" section-btn-dropdown" style="">
                      <button class="option btn btn-block">. . . </button>
                    </div> -->
                  </div>
                  <br>
                  <div class="section-button-like" style="">
                    <div class="container-button-like" style="display:inline-block">
                        <button class="btn-like btn btn-block" data-id=<?= $p['ID_Postingan'] ?>>
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
                        <button id="" class="btn btn-block btn-dislike" data-id=<?= $p['ID_Postingan'] ?>>
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
                      <a href="<?= base_url('public/Pages/Komentar?slug='.$p['Slug']."&id_kategori=".$p['ID_Kategori']."&id_postingan=".$p['ID_Postingan'])?>">
                        <button class="comment btn btn-block">
                          <img src="<?= base_url('public/gambar/komentarhitam.png') ?>" style="height:20px;weight:20px;">
                        </button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <?php endforeach; ?>
          </div>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function () {
      $('#save').css('display', 'none');
      $('#postingan').css('display', 'none');

      $("#showPost").click(function(){
        $("#home").hide();
        $("#postingan").show();
        $("#save").hide();
      });
      $("#showHome").click(function(){
        $("#home").show();
        $("#postingan").hide();
        $("#save").hide();
      });
      $("#showSave").click(function(){
        $("#home").hide();
        $("#postingan").hide();
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
