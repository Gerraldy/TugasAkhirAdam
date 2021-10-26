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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
    <div class="d-flex" id="wrapper" style="">
           <!-- Sidebar-->
           <div class="border-end bg-white" id="sidebar-wrapper" style="">
               <div class="sidebar-heading border-bottom bg-light">Kategori</div>
               <div class="list-group list-group-flush" style="">
                 <?php foreach ($kategori as $k): ?>
                   <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url('/public/Pages/getPostKategori/'.$k['ID_Kategori']) ?>"><?=$k['Nama_Kategori']?> <img src="<?= base_url('public/gambar/'.$k['url_gambar']) ?>" style="height:20px;weight:20px;"></a>
                 <?php endforeach; ?>

                   <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a> -->
               </div>
           </div>
           <!-- Page content wrapper-->
           <div id="page-content-wrapper">
               <!-- Top navigation-->
               <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                 <div class="container-fluid">
                   <div class="navbar-collapse">
                     <button class="btn navbar-nav" style="margin-right:10px" id="sidebarToggle">=</button>
                     <a class="navbar-nav" href="<?= base_url('/public') ?>">
                       <img src="<?= base_url('/public/gambar/Logo.png') ?>" alt="Avatar" class="avatar" style="width: 125px; border-radius: 10%;"></a>
                     <div class="navbar-nav mx-4">
                       <a class="nav-link" href="<?= base_url('/public/Pages/Topic1') ?>">Covid19</a>
                       <a class="nav-link" href="<?= base_url('/public/Pages/Topic2') ?>">Pemerintah</a>
                       <a class="nav-link" href="<?= base_url('/public/Pages/Topic3') ?>">Vaksin</a>
                       <a class="nav-link" href="<?= base_url('/public/Pages/Topic4') ?>">Cafe</a>
                     </div>
                   </div>
                    <div class="row">
                      <div class="collapse navbar-collapse navbar-nav" style="width:500px">
                        <form class="" id="formSearch" action="index.html" method="get">
                          <input id="search" class="k-textbox nav-link" style="width:100%; display:inline-block" placeholder="Cari Meme Disini!">
                        </form>


                        <a href="<?= base_url('/public/Pages/Toko') ?>" class="mx-2"><img src="<?= base_url('public/gambar/kantong.png') ?>" style="height:30px;weight:30px;"></a>
                        <img src="<?= base_url('public/gambar/moon.png') ?>" class="mx-2" style="height:20px;weight:20px;padding-left:10px">
                        <img src="<?= base_url('public/gambar/notif.png') ?>" class="mx-2" style="height:25px;weight:25px;padding-left:10px">
                        <img src="<?= base_url('public/gambar/meme.png') ?>" id="meme" style="height:25px;weight:35px;padding-left:10px">
                        <?php if (session()->get('user') != null): ?>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <img src="<?= base_url('public/gambar/profile.png') ?>" style="height:25px;weight:25px;padding-left:10px">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="<?= base_url('/public/Pages/MyProfile') ?>">Profil</a>
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
               </nav>
               <!-- Page content-->
               <div class="container-fluid">
                 <div class="row">
                   <div class="col-10">
                     <?= $this->renderSection('content'); ?>
                   </div>
                   <div class="col-2">
                       <div class="" style="position: fixed; top: 55px; width: 150px;height: 320px; right: 0px;background-color:#555">
                         <h2>IKLAN</h2>
                       </div>
                   </div>
                 </div>
               </div>
           </div>
       </div>

 <!-- Modal Setting Profile -->
 <div class="modal fade" id="modal-setting-profile" role="dialog">
     <div class="modal-dialog modal-lg modal-dialog-centered">

       <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title">Perbaharui Akunmu!</h4>
         </div>
         <div class="modal-body">
           <div class="container">
             <div class="row">
               <div class="col-4" style="">
                   <img src="<?= base_url('public/gambar/meme.png') ?>" id="edit-akun" style="height:100px;weight:100px;">
                   <br>
                   Akun
               </div>
               <div class="col-4" style="border-left:1px solid black">
                   <img src="<?= base_url('public/gambar/meme.png') ?>" id="edit-profile" style="height:100px;weight:100px;">
                   <br>
                   Profile
               </div>
               <div class="col-4" style="border-left:1px solid black">
                   <img src="<?= base_url('public/gambar/meme.png') ?>" id="edit-password" style="height:100px;weight:100px;">
                   <br>
                   Password
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

   <!-- Modal Edit akun -->
   <div class="modal fade" id="modal-edit-akun" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Profilemu!</h4>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <form action="<?=base_url('public/Upload/upload') ?>" method="post" enctype="multipart/form-data">
                    <img src="<?= base_url('/public/gambar/profile.png')?>" href="<?= base_url('/public/gambar/profile.png')?>" data-upload="0" id="gambar-preview" alt="" style="width:80px; height:80px; object-fit: cover">
                    <input type="file" name="Nama_Gambar" class="" id="Nama_Gambar" onchange="readURL(this);">
                    <br>
                    <br>
                     Nama :   <input class="nama k-textbox" type="text" style="width:200p" name="nama" required><br>
                     Jenis Kelamin :
                                     <ul class="fieldlist">
                                       <li>
                                         <input type="radio" name="JKelamin" id="jk" class="k-radio">
                                         <label class="k-radio-label" for="JK">Laki-laki</label>
                                       </li>
                                       <li>
                                         <input type="radio" name="JKelamin" id="jk" class="k-radio">
                                         <label class="k-radio-label" for="JK">Perempuan</label>
                                       </li>
                                    </ul><br>
                                    Tgl Lahir :
                                    <input id="tgl-lahir" value="10/10/2011" title="datepicker" />
                    <br>
                    <br>
                    Tentang :
                    <textarea id="judul" style="width: 50%;" required data-required-msg="Deskripsikan Tentangmu!!" name="Judul"></textarea>
                    <br>
                    <input type="submit" class="k-button" style="margin-top:20px" value="Simpan" id="btnsave" >
                    <input type="submit" class="k-button" style="margin-top:20px" value="Batal" id="btncancel" >
                  </form>
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
