<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>
<style media="screen">
#carousel {
  max-width:100%;

  background-color: black;

  overflow-x: scroll;
  overflow-y: hidden;
  white-space:nowrap;
}

#carousel .slide {
  display: inline-block;
  background-color:white;
}
.slide img{
  height:50px;
  object-fit: cover;
  width:50px;
}
</style>
<div class="container"  style="background-color:#777">
  <div class="row pt-3">
    <div class="col-6">

        <button id="stiker" class="stiker k-button " style="position: relative; left:150px">Stiker</button>
        <button id="addgambar" class="addgambar k-button " style="position: relative; left:200px">Tambah Gambar</button>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-6">
      <div class="">
        <canvas id="canvas" style="border:1px solid #000000; min-height: 400px;width:100%"></canvas>
      </div>
    </div>
    <div class="col-6">
      <div class="">
        <button id="subscribe" class="subscribe k-button w-100">SUBSCRIBE</button>

        <button id="upload" class="upload k-button w-100 mt-2" >Upload Meme</button>

        <div class="mt-2">
           <div id="carousel">
            <div class="slide">
                <img src="<?=base_url('/public/Gambar/memepolos/drake.jpg') ?>"/>
            </div>

            <div class="slide">
                <img src="<?=base_url('/public/Gambar/memepolos/drake.jpg') ?>"/>
            </div>

            <div class="slide">
                <img src="<?=base_url('/public/Gambar/memepolos/drake.jpg') ?>"/>
            </div>

            <div class="slide">
                <img src="<?=base_url('/public/Gambar/memepolos/drake.jpg') ?>"/>
            </div>

            <div class="slide">
                <img src="<?=base_url('/public/Gambar/memepolos/drake.jpg') ?>"/>
            </div>

            <div class="slide">
                <img src="<?=base_url('/public/Gambar/memepolos/drake.jpg') ?>"/>
            </div>

            <div class="slide">
                <img src="<?=base_url('/public/Gambar/memepolos/drake.jpg') ?>"/>
            </div>

            <div class="slide">
                <img src="<?=base_url('/public/Gambar/memepolos/drake.jpg') ?>"/>
            </div>

            <div class="slide">
                <img src="<?=base_url('/public/Gambar/memepolos/drake.jpg') ?>"/>
            </div>
            
            <div class="slide">
                <img src="<?=base_url('/public/Gambar/memepolos/drake.jpg') ?>"/>
            </div>
        </div>
        </div>
        <br>
        <div class="box-col">
          <div class="row">
            <div class="col-12">
              <input id="kata1" class="kata" style="width: 70%;" />
              <input type="color" id="palette-picker1" style="width:10%" value="#cc2222" data-role="colorpicker" data-palette="basic">
              <img src="<?= base_url('public/gambar/gearhitam.png') ?>" class="img-fluid" style="width:10%">
            </div>
            <div class="col-12">
              <input id="kata1" class="kata" style="width: 70%;" />
              <input type="color" id="palette-picker2" style="width:10%" value="#cc2222" data-role="colorpicker" data-palette="basic">
              <img src="<?= base_url('public/gambar/gearhitam.png') ?>" class="img-fluid" style="width:10%">
            </div>
          </div>
        </div>

        <div>
          <input type="checkbox" id="eq2" class="k-checkbox" disabled="disabled">
          <label class="k-checkbox-label" for="eq2">Hapus Watermark</label>
          <br>
          <p>Edit Watermark </p>
          <input id="watermark" style="width: 80%;" />
          <img src="<?= base_url('public/gambar/gearhitam.png') ?>" class="img-fluid" style="width:40px">
        </div>
        <div class="mt-5 pb-3 row">
          <div class="col-6">
            <button id="buatmeme" class="k-button w-100" >Buat Meme</button>
          </div>
          <div class="col-6">
            <button id="reset" class="k-button w-100">Reset</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function () {

    });
</script>
<?= $this->endSection();  ?>
