<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container"  style="max-width:1000px; margin:auto">
  <div class="row">
    <div class="col">
      <h3>TOKO MEME PERTAMA DI DAERAH SAYA!</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <h4><a href="<?= base_url('/public/Pages/Toko') ?>" style="color:black; text-decoration: none; font-family: 'Garamon', Times, serif;"><?=$toko_kategori[0]['Nama_Kategori_Produk']?></a></h4>
      <div class="">
        <img src="<?= base_url('public/gambar/baju.png') ?>" style="height:200px;weight:100px;">

      </div>
    </div>
    <div class="col-4">
      <h4><a href="<?= base_url('/public/Pages/Toko') ?>" style="color:black;text-decoration: none;font-family: 'Garamon', Times, serif;"><?=$toko_kategori[3]['Nama_Kategori_Produk']?></a></h4>
      <div class="">
        <img src="<?= base_url('public/gambar/celana.jpeg') ?>" style="height:200px;weight:100px;">

      </div>
    </div>
    <div class="col-4">
      <h4><a href="<?= base_url('/public/Pages/Toko') ?>" style="color:black; text-decoration: none;font-family: 'Garamon', Times, serif;"><?=$toko_kategori[1]['Nama_Kategori_Produk']?></a></h4>
      <div class="">
        <img src="<?= base_url('public/gambar/hoodie.jpg') ?>" style="height:200px;weight:100px;">

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <h4><a href="<?= base_url('/public/Pages/Toko') ?>" style="color:black; text-decoration: none; font-family: 'Garamon', Times, serif;"><?=$toko_kategori[2]['Nama_Kategori_Produk']?></a></h4>
      <div class="">
        <img src="<?= base_url('public/gambar/baju.png') ?>" style="height:200px;weight:100px;">

      </div>
    </div>
    <div class="col-6">
      <h4><a href="<?= base_url('/public/Pages/Toko') ?>" style="color:black;text-decoration: none;font-family: 'Garamon', Times, serif;"><?=$toko_kategori[4]['Nama_Kategori_Produk']?></a></h4>
      <div class="">
        <img src="<?= base_url('public/gambar/celana.jpeg') ?>" style="height:200px;weight:100px;">

      </div>
    </div>
  </div>
  <div class="row">
    <h5><a href="<?= base_url('/public/Pages/TokoHome') ?>">Lihat Toko Yang Lain...</a></h5>
  </div>
</div>
<?= $this->endSection();  ?>
