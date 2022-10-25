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
  * {box-sizing: border-box}
  body { margin:0}
  .mySlides {display: none}
  img {vertical-align: middle;}

  /* Slideshow container */
  .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
  }

  /* Next & previous buttons */
  .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
  }

  /* Position the "next button" to the right */
  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

  /* On hover, add a black background color with a little bit see-through */
  .prev:hover, .next:hover {
    background-color: white;
  }

  /* Caption text */
  .textslide {
    color: #black;
    font-size: 30px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  /* The dots/bullets/indicators */
  .dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }

  .active, .dot:hover {
    background-color: #717171;
  }

  /* Fading animation */
  .fade {
    animation-name: fade;
    animation-duration: 1.5s;
  }

  @keyframes fade {
    from {opacity: .4}
    to {opacity: 1}
  }

  /* On smaller screens, decrease text size */
  @media only screen and (max-width: 300px) {
    .prev, .next, {font-size: 11px}
  }


</style>
<div class="container" style="max-width:900px; margin:auto">
  <div class="pb-3" style="background-color:">
    <div class="row">
      <div class="col-3">
        <a class="btn nav-link p-1 topik" href="<?= base_url('/public/Pages/Topik?ID_Topik='.$topik[0]['ID_Topik']) ?>" style="border:2px solid ; border-radius:50px;"><?=$topik[0]['Nama_Topik'] ?></a>
      </div>
      <div class="col-3">
        <a class="btn nav-link p-1 topik" href="<?= base_url('/public/Pages/Topik?ID_Topik='.$topik[1]['ID_Topik']) ?>" style="border:2px solid ; border-radius:50px;"><?=$topik[1]['Nama_Topik'] ?></a>
      </div>
      <div class="col-3">
        <a class="btn nav-link p-1 topik" href="<?= base_url('/public/Pages/Topik?ID_Topik='.$topik[2]['ID_Topik']) ?>" style="border:2px solid ; border-radius:50px;"><?=$topik[2]['Nama_Topik'] ?></a>
      </div>
      <div class="col-3">
        <a class="btn nav-link p-1 topik" href="<?= base_url('/public/Pages/Topik?ID_Topik='.$topik[3]['ID_Topik']) ?>" style="border:2px solid ; border-radius:50px;"><?=$topik[3]['Nama_Topik'] ?></a>
      </div>
    </div>
  </div>


  <!-- <div class="slideshow-container" style="max-width:70%">

  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <div class="row">
      <div class="col-2">
      </div>
      <div class="col-8">
        <a href="<?= base_url('public/Pages/Komentar?slug='.$postingan[1]['Slug'])?>"><img class="img-fluid" src="<?= base_url('public/uploads/gambar_post/'.$postingan[1]['Nama_Gambar']) ?>" style=""></a>
      </div>
      <div class="col-2">
      </div>
    </div>

  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <div class="row">
      <div class="col-2">
      </div>
      <div class="col-8">
        <a href="<?= base_url('public/Pages/Komentar?slug='.$postingan[2]['Slug'])?>"><img class="img-fluid" src="<?= base_url('public/uploads/gambar_post/'.$postingan[2]['Nama_Gambar']) ?>" style=""></a>
      </div>
      <div class="col-2">
      </div>
    </div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <div class="row">
      <div class="col-2">
      </div>
      <div class="col-8">
        <a href="<?= base_url('public/Pages/Komentar?slug='.$postingan[3]['Slug'])?>"><img class="img-fluid" src="<?= base_url('public/uploads/gambar_post/'.$postingan[3]['Nama_Gambar']) ?>" style=""></a>
      </div>
      <div class="col-2">
      </div>
    </div>
  </div>

  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  </div> -->

  <!-- <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div> -->

  <?php foreach($postingan as $p) : ?>

      <div class="row">
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
                  <a href="<?= base_url('/public/Pages/Profile?name='.$p['Nama']) ?>" class="" style="text-decoration:none"><?=$p['Username'] ?></a>
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
<script>
$(document).ready(function () {
  //$("#option1").kendoDropDownList();
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
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}




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
