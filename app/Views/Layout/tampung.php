<!-- Modal Edit Profile -->
<div class="modal fade" id="modal-edit-profile" role="dialog">
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
                 Pilih Gambar:
                 <input type="file" name="Nama_Gambar" class="" id="Nama_Gambar" onchange="readURL(this);">
                 <br>
                  Namamu :   <input class="nama k-textbox" type="text" style="width:200p" name="nama" required>
                 <br>
                 <textarea id="judul" style="width: 100%;" required data-required-msg="Deskripsikan Gambarmu!" name="Judul"></textarea>
                 <br>
                 <div style="margin-top:20px">
                   <input type="checkbox" id="NSFW" name="NSFW" class="k-checkbox">
                   <label class="k-checkbox-label" for="NSFW">NSFW(Not Safe For Work)</label>
                 </div>
                 <input type="submit" style="margin-top:20px" value="Upload Image" id="btnUpload" >
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
