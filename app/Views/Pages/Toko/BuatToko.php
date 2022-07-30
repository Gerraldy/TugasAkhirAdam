<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3"  style="max-width:1000px; margin:auto; background-color:white">
  <div class="row ">
    <div class="col">
      <form class="" action="<?=base_url('public/Pages/CreateToko') ?>" method="post" enctype="multipart/form-data">
        <text>Nama Toko :</text><br>
        <input type="textbox" name="Nama_Toko" class="k-textbox" value="" required><br>
        <text>Kontak :</text><br>
        <input type="textbox" name="Kontak" class="k-textbox" value="" required><br>
        <text>Tentang :</text><br>
        <textarea class="k-textarea" name="Tentang" rows="3" cols="80"required></textarea><br>
        <input type="submit" style="" class="k-button" value="Buka" id="btnUpdate" >
        <input type="submit" style="" class="k-button" value="Kembali" id="btnBack" onclick="history.back()">
      </form>
    </div>
  </div>
</div>
<script type="">
</script>

<?= $this->endSection();  ?>
