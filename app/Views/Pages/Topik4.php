<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>
<style media="screen">
  .section-btn-dropdown{
    height:25px; width:40px;
    line-height: 12px;
    font-size: 8pt;
    font-family: tahoma;
    margin-top: 1px;
    margin-right: 2px;
    position:absolute;
    top:0;
    right:0;
  }
</style>


<div class="container" style="max-width:800px; margin:auto">
  <div class="row">
      <div class="col-12" style="">
        <text style="font-size:12px; color:grey">Nongkrong Kuy!</text>
        <div class="col-12" style="">
          <h4>Share Cafe atau Tempat Nongkrong Kalian! </h4>
          <div class="" style="">
            <div class=" section-foto" style="position:relative;">
              <img src="<?= base_url('public/gambar/cafe.jpg')?>" class="img-fluid">
              <div class="section-btn-dropdown" style="">
                <button class="option btn btn-block">. . . </button>
              </div>
            </div>
            <div class="" style="">
              Suka :  Tidak Suka :
              <div class="" style="position: relative; left:0;height:25px; width:50px;">
                <button id="like"  class="btn btn-block"><img src="<?= base_url('public/gambar/likehitam.png') ?>" style="height:20px;weight:20px;"></button>
              </div>
              <div class="" style="position: relative; top: -25px;left:50px;height:25px; width:50px;">
                <button id="dislike" class="btn btn-block"><img src="<?= base_url('public/gambar/dislikeputih.png') ?>" style="height:21px;weight:21px;"></button>
              </div>
              <div class="" style="position: relative; top:-50px ;left:100px;height:25px; width:50px;">
                <a href="https://www.facebook.com/" target="_blank"><img src="<?= base_url('public/gambar/facebook.png') ?>" style="width:40px; height:40px"></a>
              </div>
              <div class="" style=" position: relative; bottom:20px ;height:100px; width:auto; ">
                <form id="invitationForm">
                  <textarea id="invitation" style="height:50px ;width: 100%;" required data-required-msg="Please enter a text." data-max-msg="Enter value between 1 and 200" ></textarea>
                  <div class="k-form-footer">
                      <!-- <div class="k-counter-container" style="position: relative; left: 500px;"><span class="k-counter-value">0</span>/200</div> -->
                      <br>
                      <button id="komen" class="k-button k-primary" style="position: relative; right: auto;">Send</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
    $(document).ready(function () {
      $(".option").kendoButton();
      $("#like").kendoButton();
      $("#dislike").kendoButton();
      $("#comment").kendoButton();
      $("#komen").kendoButton();

      $("#invitation").kendoTextArea({
               rows: 10,
               maxLength:200,
               placeholder: "Enter your text here."
           });

           $("#invitation").on('input', function (e) {
               $('.k-counter-container .k-counter-value').html($(e.target).val().length);
           });

           $("#invitationForm").kendoValidator();

           $("form").submit(function (event) {
               event.preventDefault();
           });
    });
</script>
<?= $this->endSection();  ?>
