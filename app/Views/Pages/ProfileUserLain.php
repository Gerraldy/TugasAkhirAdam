<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container"  style="margin:auto">
  <div class="row">
    <div class="col-1">
      <img src="<?= base_url('public/gambar/profile.png') ?>" style="height:75px;weight:50px;">
    </div>
    <div class="col-11">
      <p style="position:relative; top:10px;font-size:20px"><?=$profile['Nama'] ?></p>
      <!-- <hr style="height:3px;border-width:0;color:black;background-color:black"> -->
      <p style="position:relative;"><?=$profile['Email'] ?></p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <p><?= $profile['Tentang'] ?> </p>
    </div>
  </div>
  <div class="row" style="position:relative; top:10px">
    <div class="col-1">
      <button class="k-button" id="home" name="button" style="width:70px">Home</button>
    </div>
    <div class="col-1">
      <button class="k-button" id="post" name="button" style="width:70px">Post</button>
    </div>
    <div class="col-10">
      <button class="k-button" id="save" name="button" style="width:70px">Save</button>
    </div>
  </div>
  <hr style="height:3px;color:black;background-color:black">
  <div class="row">
    <div class="col">
      <div class="" style="height:250px">
        <div class="container" style="max-width:800px; margin:auto">
          <?php foreach($postingan as $p) : ?>
          <div class="row">
              <div class="col-12" style="">
                <text style="font-size:12px; color:grey"><?= $p['Nama_Kategori']?></text>
                <div class="col-12" style="">
                  <h4><b><?= $p['Judul'] ?></b></h4>
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

    });
</script>
<?= $this->endSection();  ?>
