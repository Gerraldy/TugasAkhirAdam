<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3"  style="max-width:1000px; margin:auto; background-color:white">
  <div class="row">
    <div class="col-4" style="border: 2px solid black">
        <img src="<?= base_url('public/uploads/gambar_produk/'.$produk['Url_Gambar']) ?>" class="img-fluid" style="max-width:100%; max-height:100%">
    </div>
    <div class="col-8">
      <h2><?= $produk['Nama_Produk'] ?></h2><br>
      <?= $produk['Deskripsi'] ?><br>
      <?php if ($produk['LinkToped'] != "" && $produk['LinkShopee'] != ""): ?>
        <a target="_blank" href="<?=$produk['LinkToped'] ?>"><img src="<?=base_url('Public/Gambar/tokopedia.png') ?>" alt="" style="max-width:30%; max-height:30%"></a>
        <a target="_blank" href="<?=$produk['LinkShopee'] ?>"> <img src="<?=base_url('Public/Gambar/shopee.png') ?>" alt="" style="max-width:100%; max-height:100%"></a>
      <?php elseif ($produk['LinkToped'] != "" && $produk['LinkShopee'] == ""): ?>
        <a target="_blank" href="<?=$produk['LinkToped'] ?>"><img src="<?=base_url('Public/Gambar/tokopedia.png') ?>" alt="" style="max-width:30%; max-height:30%"></a><br>
      <?php elseif ($produk['LinkToped'] == "" && $produk['LinkShopee'] != ""): ?>
        <a target="_blank" href="<?=$produk['LinkShopee'] ?>"><img src="<?=base_url('Public/Gambar/shopee.png') ?>" alt="" style="max-width:30%; max-height:30%"></a><br>
        <?php else: ?>
          <div class="">

          </div>
      <?php endif; ?>
      <div class="pb-2" style="position: absolute;bottom:0">
        <a href="<?= base_url('public/Pages/UbahProduk?idproduk='.$produk['ID_Produk']) ?>"> <input type="submit" style="" class="k-button" value="Ubah" id="btnUpdate" ></a>
        <input type="submit" style="" class="k-button" value="Kembali" id="btnBack" onclick="history.back()">
      </div>

    </div>

  </div>
</div>


<?= $this->endSection();  ?>
