<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3"  style="max-width:1000px; margin:auto; background-color:white">
  <div class="row ">
    <div class="col-4">
      <text>Nama Toko :</text>
      <h4><?=$toko['Nama_Toko'] ?></h4><br>
    </div>
    <div class="col-8">
      <form class="" action="<?=base_url('public/Pages/ReportToko?idtoko='. $toko['ID_Toko']) ?>" method="post" enctype="multipart/form-data">
        <text>Alasan :</text><br>
        <textarea class="k-textarea" name="Alasan" rows="3" cols="80"required></textarea><br>
        <input type="submit" style="" class="k-button" value="Lapor" id="btnReport" >
        <input type="submit" style="" class="k-button" value="Kembali" id="btnBack" onclick="history.back()">
      </form>
    </div>
  </div>
</div>
<script type="">
</script>

<?= $this->endSection();  ?>
