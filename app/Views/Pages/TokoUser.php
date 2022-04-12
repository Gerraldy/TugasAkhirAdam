<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container"  style="max-width:1000px; margin:auto">
  <div class="row p-2">
    <div class="col-10">
      <h3>Ucup Store</h1>
    </div>
    <div class="col-2">
      <a href="#" class="" style="text-decoration:none"><button id="" class="k-button" style="padding: 3px 10px;">Buka Toko</button></a>
    </div>
  </div>
  <div class="row">
    Tentang Toko!
    <textarea id="tentang" style="width: 100%;" required data-required-msg="!" name="tentang"></textarea>
  </div>
  <div class="row p-2">
    <div class="col-4">
      <div class="">
        <img src="<?= base_url('public/gambar/baju.png') ?>" style="height:200px;weight:100px;">
        <p> Nama Barang </p>
      </div>
    </div>
    <div class="col-4">
      <div class="">
        <img src="<?= base_url('public/gambar/celana.jpeg') ?>" style="height:200px;weight:100px;">
        <p> Nama Barang </p>
      </div>
    </div>
    <div class="col-4">
      <div class="">
        <img src="<?= base_url('public/gambar/hoodie.jpg') ?>" style="height:200px;weight:100px;">
        <p> Nama Barang </p>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection();  ?>
