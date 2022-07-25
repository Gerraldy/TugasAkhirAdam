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
<div class="container" style="max-width:; margin:auto">
  <div class="row">
      <div class="col-1">
      </div>
        <div class="col-10" style="">
          <h4 style="color:white"><?=$topik['Judul_Topik'] ?></h4>
          <div class="" style="">
            <div class=" section-foto" style="position:relative;">
              <img src="<?= base_url('public/gambar/covid19.png')?>" class="img-fluid">
            </div>
            <br>
            <div class="row" style="">
              <div id="fb-root"></div>
              <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v14.0" nonce="hsYaH8oe"></script>
              <div class="fb-share-button" data-href="https://9gag.com/u/adambejo4040/comments" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8080%2Fcodeigniter4%2Fpublic%2FPages%2FKomentar%3Fslug%3Dhon&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Bagikan</a></div>
              <br><br>
              <div class="" style="bottom:20px ;height:100%; width:100%; ">
                <form id="invitationForm">
                  <textarea id="invitation" style="height:50px ;width: 100%;" required data-required-msg="Please enter a text." data-max-msg="Enter value between 1 and 200" ></textarea>
                  <div class="k-form-footer">
                      <!-- <div class="k-counter-container" style="position: relative; left: 500px;"><span class="k-counter-value">0</span>/200</div> -->
                      <br>
                      <button id="komen" class="k-button" style="position: relative; right: auto;">Send</button>
                  </div>
                </form>
                <br>
                <div class="row" style="border-radius:10px ;background-color:black">
                  <?php foreach ($komentar as $k): ?>
                    <div class="col-1">
                        <a href="<?= base_url('/public/Pages/Profile?name='.$k['Nama']) ?>" class="mx-2" style="text-decoration:none">
                          <img src="<?= base_url('public/uploads/gambar_profile/'. $k['url_foto']) ?>" style="border-radius:50% ;height:40px;weight:40px;">
                        </a>
                    </div>
                    <div class="col-11">
                      <kbd><?=$k['Nama'] ?></kbd>
                      <br>
                      <p class="font-weight-normal" style="color: white"><?= nl2br($k['Isi_KomentarTopik']) ?></p>
                    </div>
                  <?php endforeach; ?>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-1">
      </div>
      <br>

  </div>
<script>
    $(document).ready(function () {


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
