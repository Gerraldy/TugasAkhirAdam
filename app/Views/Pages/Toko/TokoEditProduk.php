<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3"  style="max-width:1000px; margin:auto; background-color:white">
  <div class="row ">
    <div class="col-5" style="border: 2px solid black; text-align:center">
        <img src="<?= base_url('/public/gambar/'.$produk['Url_Gambar'])?>" href="<?= base_url('/public/gambar/'.$produk['Url_Gambar'])?>" data-upload="0" id="gambar-preview" alt="" style="width:75%; height:75%; object-fit: cover">
    </div>
    <div class="col-7 pt-2">
      <form class="" action="<?=base_url('public/Pages/EditProduk?idtoko='. $produk['ID_Toko'].'&idproduk='.$produk['ID_Produk']) ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="Url_Gambar" class="" id="Url_Gambar" onchange="readURL(this);"><br><br>
        <text>Nama Produk :</text><br>
        <input type="textbox" name="Nama_Produk" class="k-textbox" value="<?=$produk['Nama_Produk'] ?>" required><br>
        <text>Deskripsi Produk :</text><br>
        <textarea class="k-textarea" name="Deskripsi" rows="3" cols="80"required><?=$produk['Deskripsi'] ?></textarea><br>
        <text>Kategori Produk :</text><br>
        <select id="ID_Kategori" name="ID_Kategori_Produk">
          <?php foreach ($toko_kategori as $t): ?>
          <option value="<?=$t['ID_Kategori_Produk']?>"><?=$t['Nama_Kategori_Produk'] ?></option>
          <?php endforeach; ?>
        </select><br>
        <text>Link Tokopedia(jika tidak ada, kosongkan saja) :</text><br>
        <input type="textbox" name="Link_Toped" class="k-textbox" value="<?=$produk['LinkToped'] ?>"><br>
        <text>Link Shopee(jika tidak ada, kosongkan saja) :</text><br>
        <input type="textbox" name="Link_Shopee" class="k-textbox" value="<?=$produk['LinkShopee'] ?>"><br><br>
        <input type="submit" style="" class="k-button" value="Ubah" id="btnUpdate" >
        <input type="submit" style="" class="k-button" value="Kembali" id="btnBack" onclick="history.back()">
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

</script>

<?= $this->endSection();  ?>
