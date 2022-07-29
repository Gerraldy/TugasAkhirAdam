<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container"  style="max-width:1000px; margin:auto">
    <div class="row mt-3">
      <?php if ($toko == null): ?>
        <div class="col" style="text-align: right;">
          <a href="<?=base_url('public/Pages/BuatToko')?>"><button type="button" class="k-button" name="button">Buka Toko</button></a>
        </div>
        <?php else: ?>
          <div class="col" style="text-align: right;">
            <a href="<?=base_url('public/Pages/TokoUser?idtoko='.$toko['ID_Toko'])?>"><button type="button" class="k-button" name="button">TokoKu</button></a>
          </div>
      <?php endif; ?>
    </div>

      <?php
        for ($i=0; $i < count($toko_user); $i++) {
          echo '<div class="row">';

          echo '<h3><a href="'.base_url('public/Pages/TokoUser?idtoko='. $toko_user[$i]['ID_Toko']) .'" style="color:black">'.$toko_user[$i]['Nama_Toko'] . '</a></h3><hr>';
          for ($j=0; $j < count($toko_produk); $j++) {
            if ($toko_produk[$j]['ID_Toko'] == $toko_user[$i]['ID_Toko']) {
              echo '<div class="col">';
              echo '<img src="'.base_url('public/uploads/gambar_produk/'.$toko_produk[$j]['Url_Gambar']).'"'. 'style="height:200px;weight:100px;"><br>';
              echo '<b><text style="color:white">'.$toko_produk[$j]['Nama_Produk'] . "</text></b>";
                echo '</div>';
            } else {
              echo "";
            }
          }

          echo'</div>';
        }

       ?>



  <!-- <div class="row">
    <div class="col-4">
      <h4><a href="<?= base_url('/public/Pages/Toko') ?>" style="color:black; text-decoration: none; font-family: 'Garamon', Times, serif;"><?=$toko_kategori[0]['Nama_Kategori_Produk']?></a></h4>
      <div class="">
        <img src="<?= base_url('public/gambar/baju.png') ?>" style="height:200px;weight:100px;">
        <p>  </p>
      </div>
    </div>
  </div> -->

  <?php //endforeach; ?>
  <div class="row">
    <h5><a href="<?= base_url('/public/Pages/Toko') ?>"><- kembali </a></h5> | | <h5><a href="<?= base_url('/public/Pages/TokoUser') ?>"> Tokoku -></a></h5>
  </div>
</div>

<?= $this->endSection();  ?>
