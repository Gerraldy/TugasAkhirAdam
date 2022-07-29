<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container"  style="max-width:1000px; margin:auto">
  <div class="row p-2">
    <?php if ($user == $toko['ID_Memers']): ?>
      <div class="col-10">
        <h3 style="color:white"><?= $toko['Nama_Toko'] ?></h3>
      </div>
        <?php if ($toko['status'] == 1): ?>
          <div class="col-2">
            <a href="<?=base_url('public/Pages/BukaTutupToko?status='.$toko['status'].'&idtoko='.$toko['ID_Toko']) ?>" class="" style="text-decoration:none"><button id="" class="k-button" style="padding: 3px 10px;">Tutup Toko</button></a>
          </div>
          <?php else: ?>
            <div class="col-2">
              <a href="<?=base_url('public/Pages/BukaTutupToko?status='.$toko['status'].'&idtoko='.$toko['ID_Toko']) ?>" class="" style="text-decoration:none"><button id="" class="k-button" style="padding: 3px 10px;">Buka Toko</button></a>
            </div>
        <?php endif; ?>
      <?php else: ?>
        <div class="col-12">
          <h3 style="color:white"><?= $toko['Nama_Toko'] ?></h3>
        </div>
    <?php endif; ?>
  </div>
  <div class="row">
    <p style="color:white"><?=$toko['Tentang'] ?></p><br>
    <text style="color:white">Kontak : <?=$toko['Kontak'] ?> </text>
  </div>
  <div class="row p-2">
    <?php foreach ($toko_produk as $tp ): ?>
        <div class="col">
          <a href="<?=base_url('public/Pages/DetailProduk?idproduk='.$tp['ID_Produk']) ?>">
            <img src="<?= base_url('public/gambar/baju.png') ?>" class="img-fluid" style="max-width:50%; max-height:50%"><br>
            <text style="color:white"><?=$tp['Nama_Produk'] ?> </text>
          </a>
        </div>
    <?php endforeach; ?>
    <div class="row">
      <div class="col" style="text-align: left;">
        <a href="<?=base_url('public/Pages/TambahProduk')?>" >
          <img src="<?= base_url('public/gambar/plus.png') ?>" class="img-fluid" style="max-width:50%; max-height:50%"><br>
        </a>
      </div>

    </div>
  </div>
  </div>

<?= $this->endSection();  ?>
