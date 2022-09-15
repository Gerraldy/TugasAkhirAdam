<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url('public/cssbaru/bootstrap.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('public/cssbaru/font-awesome.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('public/cssbaru/elegant-icons.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('public/cssbaru/nice-select.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('public/cssbaru/jquery-ui.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('public/cssbaru/owl.carousel.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('public/cssbaru/slicknav.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('public/cssbaru/style.css'); ?>" type="text/css">

    <!-- Js Plugins -->
    <script src="<?= base_url('public/jsbaru/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?= base_url('public/jsbaru/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('public/jsbaru/jquery.nice-select.min.js'); ?>"></script>
    <script src="<?= base_url('public/jsbaru/jquery-ui.min.js'); ?>"></script>
    <script src="<?= base_url('public/jsbaru/jquery.slicknav.js'); ?>"></script>
    <script src="<?= base_url('public/jsbaru/mixitup.min.js'); ?>"></script>
    <script src="<?= base_url('public/jsbaru/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('public/jsbaru/main.js'); ?>"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('public/kendoStyle/kendo.common.min.css'); ?>" >
    <link rel="stylesheet" href="<?= base_url('public/kendoStyle/kendo.default.min.css'); ?>" >
    <link rel="stylesheet" href="<?= base_url('public/css/magnific-popup.css'); ?>" >
    <link rel="stylesheet" href="<?= base_url('public/css/w3.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/cssdropdown.css'); ?>">
    <link href="<?=base_url('public/css/jquery-ui.min.css')?>" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <!-- <link href="<?=base_url('public/navbar/css/styles.css') ?>" rel="stylesheet" /> -->
    <script src="<?=base_url('public/navbar/js/scripts.js') ?>"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script src="<?= base_url('public/js/bootstrap.min.js') ?>"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link href="<?=base_url('public/css/styles.css')?>" rel="stylesheet" />
    <script src="<?= base_url('public/js/jquery.magnific-popup.js') ?>"></script>
    <script src="<?= base_url('public/js/scripts.js') ?>"></script>

    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <!-- <script src="https://kendo.cdn.telerik.com/2021.1.119/js/jquery.min.js"></script> -->
    <script src="https://kendo.cdn.telerik.com/2021.1.119/js/kendo.all.min.js"></script>
    <script>
        if (typeof kendo == "undefined") {
            document.write(decodeURIComponent('%3Clink rel="stylesheet" href="/path/to/local/kendo.common.min.css" %3C/%3E'));
            document.write(decodeURIComponent('%3Clink rel="stylesheet" href="/path/to/local/kendo.blueopal.min.css" %3C/%3E'));
            document.write(decodeURIComponent('%3Cscript src="/path/to/local/kendo.all.min.js" %3E%3C/script%3E'));
        }

        $( function() {
            var tag = [
              "Ngakak",
              "Permainan",
              "Anime",
              "Hewan",
              "Olahraga",
              "Jodoh",
              "Seni",
              "Meme",
              "Mobil",
              "Random",
              "Film",
              "Wallpapper"
            ];
            $( "#search" ).autocomplete({
              source: tag
            });
          } );
    </script>

    <title><?=$title ?></title>
  </head>
  <body style="height: 100%;">
    <style media="screen">
      .mfp-bg{
        z-index: 1090 !important;
      }

      .fieldlist {
            margin: 0 0 -1em;
            padding: 0;
        }

        .fieldlist li {
            list-style: none;
            padding-bottom: 1em;
        }
    </style>
    <!-- d-flex -->
    <div class="" id="wrapper" style="">
      <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                              <?php if (session()->get('user') != null): ?>
                                <div class="header__top__right__language">
                                    <div>Akun</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a  href="<?= base_url('/public/Pages/MyProfile') ?>"> Profil</a></li>
                                        <li><a  id="setting" href="<?=base_url('/public/Pages/SettingProfile') ?>">Setting</a></li>
                                        <li><a  href="<?= base_url('/public/Auth/Logout') ?>">Logout</a></li>
                                    </ul>
                                </div>
                              <?php else: ?>
                                <div class="header__top__right__auth">
                                  <a href="<?= base_url('/public/Pages/Login') ?>" class="fa fa-user" style=""> Login</a>
                                </div>
                              <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                      <a class="navbar-nav" href="<?= base_url('/public') ?>">
                        <img src="<?= base_url('/public/gambar/Logo.png') ?>" alt="Avatar" class="avatar" style="width: 80%;">
                      </a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="header__menu">
                        <ul>
                            <li class=""><a href="<?= base_url('/public') ?>">Home</a></li>
                            <li class="nav-item"><a href="<?= base_url('/public/Pages/Toko') ?>">TOKO</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                             <li class=""><a class="" href="#" id="meme">BUAT MEME</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3" >
                    <div class="hero__categories" style="">
                        <ul>
                          <?php foreach ($kategori as $k): ?>
                                <li><a class="btn-outline-light" href="<?=base_url('/public/Pages/getPostKategori/'.$k['ID_Kategori']) ?>" style=""><img src="<?= base_url('public/gambar/'.$k['url_gambar']) ?>" style="height:20px;weight:20px;"><?=$k['Nama_Kategori']?> </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form class="" id="formSearch" action="<?= base_url('/public/Pages/Cari') ?>" method="get">
                                <input type="text" id="search" name="cari" placeholder="Cari Meme?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>

                    </div>
                    <div class="hero__item set-bg" data-setbg="<?=base_url('/public/gambar/memekumpulan.jpg') ?>">
                        <div class="hero__text" style="z-index:100; position: relative;position: relative; background-color:white">
                            <span>Langganan</span>
                            <h2>Tanpa Iklan <br />100% Real</h2>
                            <!-- <p>Free Pickup and Delivery Available</p> -->
                            <a href="<?= base_url('/public/Pages/LanggananPro') ?>" class="primary-btn">Langganan Sekarang</a>
                        </div>
                        <div class="backgrouniklan" style="z-index:-100; position: absolute;">
                          <img src="<?=base_url('/public/gambar/memekumpulan.jpg') ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
               <!-- <nav class="navbar navbar-expand-lg navbar-dark fixed-top p-1" id="mainNav">
                   <div class="container">
                     <a class="navbar-nav" href="<?= base_url('/public') ?>">
                       <img src="<?= base_url('/public/gambar/Logo.png') ?>" alt="Avatar" class="avatar" style="width: 150px; border-radius: 10%;">
                     </a>
                       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                           Menu
                           <i class="fas fa-bars ms-1"></i>
                       </button>
                       <div class="collapse navbar-collapse" id="navbarResponsive">
                           <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                               <li class="nav-item"><a href="<?= base_url('/public/Payment/index') ?>" class="nav-link">SUBSCRIBE</a></li>
                               <li class="nav-item"><a href="<?= base_url('/public/Pages/Toko') ?>" class="nav-link">TOKO</a></li>
                               <li class="nav-item"><a class="nav-link" href="#" id="meme">BUAT MEME</a></li>
                               <?php if (session()->get('user') != null): ?>
                                 <li class="nav-item dropdown">
                                   <a class="nav-link dropdown-toggle mx-2" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     AKUN
                                   </a>
                                   <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                     <a class="dropdown-item" href="<?= base_url('/public/Pages/MyProfile') ?>">Profil</a>
                                     <a class="dropdown-item" id="setting" href="<?=base_url('/public/Pages/SettingProfile') ?>">Setting</a>
                                     <a class="dropdown-item" href="<?= base_url('/public/Auth/Logout') ?>">Logout</a>
                                   </div>
                                 </li>
                               <?php else: ?>
                                 <a href="<?= base_url('/public/Pages/Login') ?>" class="mx-2" style="text-decoration:none"><button id="gologin" class="k-button btn-outline-light" style="padding: 3px 10px;;">Login</button></a>
                               <?php endif; ?>
                           </ul>
                       </div>

                   </div>
                   <hr>
               </nav> -->

               <!-- Page content-->
              <section class="featured spad">
               <div class="container" style="">
                 <div class="row">
                   <div class="col-10 " style="height: 100%;">
                     <?= $this->renderSection('content'); ?>
                   </div>
                   <div class="col-2">
                     <h2>IKLAN</h2>
                   </div>
                 </div>
               </div>
              </section>
           </div>
       </div>


<!-- Modal Upload MEME -->
<div class="modal fade" id="modal-create-meme" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Upload Gambarmu Disini!</h4>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-6">
                <form action="<?=base_url('public/Upload/upload') ?>" method="post" enctype="multipart/form-data">
                  <img src="<?= base_url('/public/gambar/profile.png')?>" href="<?= base_url('/public/gambar/profile.png')?>" data-upload="0" id="gambar-preview" alt="" style="width:80px; height:80px; object-fit: cover">
                  Pilih Gambar:
                  <input type="file" name="Nama_Gambar" class="" id="Nama_Gambar" onchange="readURL(this);">
                  <br>
                  <br>
                  <textarea id="judul" style="width: 100%;" required data-required-msg="Deskripsikan Gambarmu!" name="Judul"></textarea>
                  <br>
                  Kategori : <select id="ID_Kategori" name="ID_Kategori" style="width: 70%; margin-top:20px" >
                  <?php foreach ($kategori as $kat): ?>
                    <option value="<?=$kat['ID_Kategori']?>"><?=$kat['Nama_Kategori'] ?></option>
                  <?php endforeach; ?>
                  </select>
                  <br>
                  <div style="margin-top:20px">
                    <input type="checkbox" id="NSFW" name="NSFW" class="k-checkbox">
                    <label class="k-checkbox-label" for="NSFW">NSFW(Not Safe For Work)</label>
                  </div>
                  <input type="submit" style="margin-top:20px" value="Upload Image" id="btnUpload" >
                </form>
              </div>
              <div class="col-6" style="border-left:1px solid black">
                  <a href="<?= base_url('/public/Pages/BuatMeme') ?>"><img src="<?= base_url('public/gambar/meme.png') ?>" style="height:100px;weight:100px;"></a>
                  <br>
                  Buat Meme Mu Sendiri!
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <text>Sentuh bagian luar Modal Untuk Batal</text>
        </div>
      </div>

    </div>
  </div>
          <script>
            function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#gambar-preview')
                        .attr('src', e.target.result);
                    $('#gambar-preview')
                        .attr('href', e.target.result).data("upload","1");

                        $('#gambar-preview').magnificPopup({
                           type: 'image'
                           // other options
                         });
                };

                reader.readAsDataURL(input.files[0]);
              }
            }
              $(document).ready(function () {
                $('#btnUpload').click(function(e){
                  if ($('#gambar-preview').data('upload') == "0") {
                    alert('Upload Gambar Dulu!');
                    e.preventDefault();
                  }
                });

                $("#judul").kendoTextArea({
                  rows: 3,
                  maxLength:200,
                  placeholder: "Deskripsikan Gambarmu!"
                });

                  // Get the modal
                  var modal = document.getElementById('id01');

                  // When the user clicks anywhere outside of the modal, close it
                  window.onclick = function(event) {
                      if (event.target == modal) {
                          modal.style.display = "none";
                      }
                  }



                  $("#meme").click(function(){
                    $("#modal-create-meme").modal("show");
                  });

                  $("#search").keypress(function(){
                    var keycode = (event.keyCode ? event.keyCode : event.which);
                      if(keycode == '13'){
                          $("#formSearch")[0].submit();

                      }
                  });
              });
          </script>
      </body>
</html>
