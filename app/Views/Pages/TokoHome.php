<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container"  style="max-width:1000px; margin:auto">
    <?php foreach($toko_user as $t) : ?>
  <div class="row">
    <div class="col">
      <h3><a href="#" style="color:black"> <?=$t['Nama_Toko'] ?></a></h1>
    </div>
  </div>

  <!-- <div class="row">
    <div class="col-4">
      <h4><a href="<?= base_url('/public/Pages/Toko') ?>" style="color:black; text-decoration: none; font-family: 'Garamon', Times, serif;"><?=$toko_kategori[0]['Nama_Kategori_Produk']?></a></h4>
      <div class="">
        <img src="<?= base_url('public/gambar/baju.png') ?>" style="height:200px;weight:100px;">
        <p>  </p>
      </div>
    </div>
  </div> -->

  <hr>
  <?php endforeach; ?>
  <div class="row">
    <h5><a href="<?= base_url('/public/Pages/Toko') ?>"><- kembali </a></h5> | | <h5><a href="<?= base_url('/public/Pages/TokoUser') ?>"> Tokoku -></a></h5>
  </div>
</div>

<?= $this->endSection();  ?>
