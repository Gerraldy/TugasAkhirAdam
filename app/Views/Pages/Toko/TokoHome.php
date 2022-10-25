<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container"  style="max-width:1000px; margin:auto">
    <div class="row p-3">
      <?php if ($toko == null): ?>
        <div class="col pt3" style="text-align: right;">
          <a href="<?=base_url('public/Pages/BuatToko')?>"><button type="button" class="k-button" name="button">Buka Toko</button></a>
        </div>
        <?php else: ?>
          <div class="col p-3" style="text-align: right;">
            <a href="<?=base_url('public/Pages/TokoUser?idtoko='.$toko['ID_Toko'])?>" class=""><button type="button" class="k-button" name="button">TokoKu</button></a>
          </div>
      <?php endif; ?>
    </div>

      <?php
        for ($i=0; $i < count($toko_user); $i++) {
          echo '<div class="row pt-4">';
          echo '<h3><a href="'.base_url('public/Pages/TokoUser?idtoko='. $toko_user[$i]['ID_Toko']) .'" style="color:">'.$toko_user[$i]['Nama_Toko'] . '</a></h3><hr>';
          for ($j=0; $j < count($toko_produk); $j++) {
            if ($toko_produk[$j]['ID_Toko'] == $toko_user[$i]['ID_Toko']) {
              echo '<div class="col">';
              echo '<a href="'. base_url('public/Pages/DetailProduk?idproduk='.$toko_produk[$j]['ID_Produk'].'&idtoko='.$toko_produk[$j]['ID_Toko']).'"><img src="'.base_url('public/uploads/gambar_produk/'.$toko_produk[$j]['Url_Gambar']).'"'. 'style="height:200px;weight:100px;"></a><br>';
              echo '<b><text style="color:">'.$toko_produk[$j]['Nama_Produk'] . "</text></b>";
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
</div>

<?= $this->endSection();  ?>
