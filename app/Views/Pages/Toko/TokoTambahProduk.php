<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container"  style="max-width:1000px; margin:auto">
  <div class="row mt-5" style="background-color:white">
      <div class="col-4" style="text-align:center">
        <img src="<?= base_url('/public/gambar/profile.png')?>" href="<?= base_url('/public/gambar/profile.png')?>" data-upload="0" id="gambar-preview" alt="" style="width:75%; height:75%; object-fit: cover">
      </div>
      <div class="col-8 pt-2">
        <form action="<?=base_url('public/Pages/InsertProduk?idtoko='. $toko['ID_Toko']) ?>" method="post" enctype="multipart/form-data">
          <input type="file" name="Url_Gambar" class="" id="Url_Gambar" onchange="readURL(this);"><br><br>
          <text>Nama Produk :</text><br>
          <input type="textbox" name="Nama_Produk" class="k-textbox" value="" required><br>
          <text>Deskripsi Produk :</text><br>
          <input type="textbox" name="Deskripsi" class="k-textbox" value="" required><br>
          <text>Kategori Produk :</text><br>
          <select id="ID_Kategori" name="ID_Kategori_Produk">
            <?php foreach ($toko_kategori as $t): ?>
            <option value="<?=$t['ID_Kategori_Produk']?>"><?=$t['Nama_Kategori_Produk'] ?></option>
            <?php endforeach; ?>
          </select><br>
          <text>Link Tokopedia(jika tidak ada, kosongkan saja) :</text><br>
          <input type="textbox" name="Link_Toped" class="k-textbox" value=""><br>
          <text>Link Shopee(jika tidak ada, kosongkan saja) :</text><br>
          <input type="textbox" name="Link_Shopee" class="k-textbox" value=""><br><br>
          <input type="submit" style="" class="k-button" value="Tambah" id="btnAdd" >
          <input type="submit" style="" class="k-button" value="Kembali" id="btnBack" >
        </form>
      </div>
  </div>
</div>

<script type="">
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
        $('#btnAdd').click(function(e){
          if ($('#gambar-preview').data('upload') == "0") {
            alert('Upload Gambar Dulu!');
            e.preventDefault();
          }
        });
      });

</script>

<?= $this->endSection();  ?>
