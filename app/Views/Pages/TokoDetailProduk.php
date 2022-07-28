<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container"  style="max-width:1000px; margin:auto; background-color:white">
  <div class="row">
    <div class="col-4" style="border: 2px solid black">
        <img src="<?= base_url('public/gambar/baju.png') ?>" class="img-fluid" style="max-width:100%; max-height:100%">
    </div>
    <div class="col-8">
      <h2><?= $produk['Nama_Produk'] ?></h2><br>
      <?= $produk['Deskripsi'] ?><br>
      <a target="_blank" href="<?=$produk['LinkToped'] ?>"><img src="<?=base_url('Public/Gambar/tokopedia.png') ?>" alt="" style="max-width:30%; max-height:30%"></a><br>
      <a target="_blank" href="<?=$produk['LinkShopee'] ?>"> <img src="<?=base_url('Public/Gambar/shopee.png') ?>" alt="" style="max-width:100%; max-height:100%"></a>
    </div>
  </div>
</div>


<?= $this->endSection();  ?>
