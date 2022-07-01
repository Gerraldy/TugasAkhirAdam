<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('public/kendoStyle/kendo.common.min.css'); ?>" >
    <link rel="stylesheet" href="<?= base_url('public/kendoStyle/kendo.default.min.css'); ?>" >
    <link rel="stylesheet" href="<?= base_url('public/css/magnific-popup.css'); ?>" >
    <link rel="stylesheet" href="<?= base_url('public/css/w3.css'); ?>">
    <link href="<?=base_url('public/css/jquery-ui.min.css')?>" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <link href="<?=base_url('public/navbar/css/styles.css') ?>" rel="stylesheet" />
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
              "ngakak",
              "game",
              "anime",
              "hewan",
              "sport",
              "jodoh",
              "art",
              "NSFW"
            ];
            $( "#search" ).autocomplete({
              source: tag
            });
          } );
    </script>
    <title><?=$title ?></title>
  </head>
  <body>
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
           <!-- Sidebar-->
           <!-- <div class="border-end bg-white" id="sidebar-wrapper" style="">
               <div class="sidebar-heading border-bottom bg-light">Kategori</div>
               <div class="list-group list-group-flush" style="">
                 <?php foreach ($kategori as $k): ?>
                   <a class="list-group-item list-group-item-action list-group-item-light p-1" href="<?=base_url('/public/Pages/getPostKategori/'.$k['ID_Kategori']) ?>"><img src="<?= base_url('public/gambar/'.$k['url_gambar']) ?>" style="height:20px;weight:20px;"> <?=$k['Nama_Kategori']?> </a>
                 <?php endforeach; ?>
               </div>
           </div> -->
           <!-- Page content wrapper-->
           <div id="page-content-wrapper">
               <!-- Top navigation-->
               <!-- <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom p-1" style="background-color:blue;">
                 <div class="container-fluid" style="">
                   <div class="navbar-collapse">
                     <a class="navbar-nav" href="<?= base_url('/public') ?>">
                       <img src="<?= base_url('/public/gambar/Logo.png') ?>" alt="Avatar" class="avatar" style="width: 150px; border-radius: 10%;"></a>
                   </div>
                    <div class="row">
                      <div class="collapse navbar-collapse navbar-nav" style="width:500px">
                        <a href="<?= base_url('/public/Pages/Toko') ?>" class="mx-2"><img src="<?= base_url('public/gambar/kantong.png') ?>" style="height:30px;weight:30px; background-color:white; border-radius:10%"></a>
                        <img src="<?= base_url('public/gambar/moon.png') ?>" class="mx-2" style="height:30px;weight:30px;padding-left:0px; background-color:white; border-radius:10%">
                        <img src="<?= base_url('public/gambar/notif.png') ?>" class="mx-2" style="height:30px;weight:30px;padding-left:0px; background-color:white; border-radius:10%">
                        <img src="<?= base_url('public/gambar/meme.png') ?>" class="mx-2" id="meme" style="height:30px;weight:30px;padding-left:0px; background-color:white; border-radius:10%">
                        <?php if (session()->get('user') != null): ?>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mx-2" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <img src="<?= base_url('public/gambar/profile.png') ?>" style="height:30px;weight:30px;padding-left:0px; background-color:white; border-radius:10%">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="<?= base_url('/public/Pages/MyProfile') ?>">Profil</a>
                              <a class="dropdown-item" href="#">Tokoku</a>
                              <a class="dropdown-item" id="setting" href="<?=base_url('/public/Pages/SettingProfile') ?>">Setting</a>
                              <a class="dropdown-item" href="<?= base_url('/public/Auth/Logout') ?>">Logout</a>
                            </div>
                          </li>
                        <?php else: ?>
                          <a href="<?= base_url('/public/Pages/Login') ?>" class="mx-2" style="text-decoration:none"><button id="gologin" class="k-button" style="padding: 3px 10px;;">Login</button></a>
                        <?php endif; ?>
                      </div>
                    </div>
                 </div>
               </nav> -->

               <nav class="navbar navbar-expand-lg navbar-dark fixed-top p-1" id="mainNav">
                   <div class="container">
                     <a class="navbar-nav" href="<?= base_url('/public') ?>">
                       <img src="<?= base_url('/public/gambar/Logo.png') ?>" alt="Avatar" class="avatar" style="width: 150px; border-radius: 10%;"></a>
                       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                           Menu
                           <i class="fas fa-bars ms-1"></i>
                       </button>
                       <div class="collapse navbar-collapse" id="navbarResponsive">
                           <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                               <li class="nav-item"><a href="<?= base_url('/public/Pages/Toko') ?>" class="nav-link">TOKO</a></li>
                               <li class="nav-item"><a class="nav-link" href="#" id="meme">BUAT MEME</a></li>
                               <?php if (session()->get('user') != null): ?>
                                 <li class="nav-item dropdown">
                                   <a class="nav-link dropdown-toggle mx-2" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     AKUN
                                   </a>
                                   <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                     <a class="dropdown-item" href="<?= base_url('/public/Pages/MyProfile') ?>">Profil</a>
                                     <a class="dropdown-item" href="#">Tokoku</a>
                                     <a class="dropdown-item" id="setting" href="<?=base_url('/public/Pages/SettingProfile') ?>">Setting</a>
                                     <a class="dropdown-item" href="<?= base_url('/public/Auth/Logout') ?>">Logout</a>
                                   </div>
                                 </li>
                               <?php else: ?>
                                 <a href="<?= base_url('/public/Pages/Login') ?>" class="mx-2" style="text-decoration:none"><button id="gologin" class="k-button" style="padding: 3px 10px;;">Login</button></a>
                               <?php endif; ?>
                           </ul>
                       </div>

                   </div>
               </nav>

               <!-- Page content-->
               <div class="container-fluid pt-5" style="margin:auto; background-color:grey">
                 <div class="row">
                   <div class="col-2">
                     <div class="" style="position:; width:auto">
                       <?php foreach ($kategori as $k): ?>
                         <a class="btn btn-outline-light" href="<?=base_url('/public/Pages/getPostKategori/'.$k['ID_Kategori']) ?>" style="margin:auto; background:transparent; border:none; width: 200px;height:100%"><img src="<?= base_url('public/gambar/'.$k['url_gambar']) ?>" style="height:20px;weight:20px;"> <?=$k['Nama_Kategori']?> </a> <hr>
                       <?php endforeach; ?>
                     </div>

                   </div>
                   <div class="col-8" style="">
                     <?= $this->renderSection('content'); ?>
                   </div>
                   <div class="col-2">
                         <h2>IKLAN</h2>

                   </div>
                 </div>
               </div>
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

                  $("#ngakak").kendoButton();
                  $("#game").kendoButton();
                  $("#anime").kendoButton();
                  $("#hewan").kendoButton();
                  $("#sport").kendoButton();
                  $("#jodoh").kendoButton();
                  $("#art").kendoButton();
                  $("#meme").click(function(){
                    $("#modal-create-meme").modal("show");
                  });

                  $("#tgl-lahir").kendoDatePicker();
                  var data = [
                            "ngakak",
                            "game",
                            "anime",
                            "hewan",
                            "sport",
                            "jodoh",
                            "art"
                        ];

                  // $("#search").kendoAutoComplete({
                  //   dataSource: data,
                  //   placeholder: "Cari Meme",
                  //   filter: "startswith",
                  //   separator: ", "
                  // });
                  $("#search").keypress(function(){
                    var keycode = (event.keyCode ? event.keyCode : event.which);
                      if(keycode == '13'){
                          $("#formSearch")[0].submit();
                          alert();
                      }
                  });
              });
          </script>
          <style >

          </style>
        </div>

      </body>
</html>
