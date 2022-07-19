<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>
<style media="screen">
#meme-bg-target {
	background:#FFF;
	border:#CCC 1px solid;
	margin:20px 0px;
	display:inline-block;
	position:relative;
}
#img-meme-bg {
	width:100%;
}
#meme-preview {
	width:100%;
	height:100%;
	background:#FFF;
	border:#CCC 1px solid;
	margin:0px;
	position:relative;
}
.meme-txt-area {
	border:#FFF 1px dotted;
	position:absolute;
	top:0;
	left:0;
	padding:10px;
	min-width:200px;
	color:#black;
	text-align:left;
	cursor:move;
    font-size:24px;
}
.meme-txt-area:focus {
	outline: none;
}
div#meme-canvas-container {
    display:inline-block;
    position:relative;
    max-width: 550px;
    max-height: 340px;
    width:100%;
    height:100%;
}

.btn-add {
    padding: 10px 50px;
    margin-left: 15px;
    background: #F0F0F0;
    border: #dedddd 1px solid;
    border-radius: 2px;
}

.btn-save {
    padding: 10px 50px;
    margin-bottom: 25px;
    background: #09F;
    border: #09F 1px solid;
    border-radius: 2px;
    color:#FFF;
    font-size: 16px;
}

.choose-file {
    padding: 8px;
    border: #F0F0F0 1px solid;
    border-radius: 2px;
}

.label-preview {
    color:#333;
    margin: 20px 0px 10px;
}
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
        <button id="addgambar" class="addgambar k-button" style="position: relative; left:200px">Tambah Gambar</button>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-7">
      <div id="meme-bg-target">
          <img src="<?= base_url('public/gambar/memepolos/drakepolos.png') ?>" id="img-meme-bg" class="img-meme-bg" />
      </div>
      <div class="" style="">
        <canvas id="myCanvas" style="">

        </canvas>
        <!-- <div id="draggable" class="ui-widget-content" style="width: 150px; height: 150px; padding: 0.5px;">
          <p>Drag me around</p>
        </div> -->
      </div>
    </div>
    <div class="col-5">
      <div class="">
        <button id="subscribe" class="subscribe k-button w-100">SUBSCRIBE</button>
        <input type="file" name="meme_bg" value="Upload MEME Image" class="choose-file" onChange="showPreview(this);" />
        <!-- <button id="upload" type="file" accept="image/*" class="upload k-button w-100 mt-2" >Upload Meme</button> -->
        <input type="button" name="add_text" value="Add Text" class="btn-add" onClick="createTextArea()" />
        <div class="mt-2">
           <div id="carousel">
            <div class="slide">
                <img src="<?= base_url('public/gambar/memepolos/drakepolos.png') ?>"/>
            </div>

            <div class="slide">
                <img src="<?= base_url('public/gambar/memepolos/drakepolos.png') ?>"/>
            </div>

            <div class="slide">
                <img src="<?= base_url('public/gambar/memepolos/drakepolos.png') ?>"/>
            </div>

            <div class="slide">
                <img src="<?= base_url('public/gambar/memepolos/drakepolos.png') ?>"/>
            </div>

            <div class="slide">
                <img src="<?= base_url('public/gambar/memepolos/drakepolos.png') ?>"/>
            </div>

            <div class="slide">
                <img src="<?= base_url('public/gambar/memepolos/drakepolos.png') ?>"/>
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
              <input id="kata2" class="kata" style="width: 70%;" />
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
            <input type="button" name="save-as-image" id="save-as-image" class="btn-save" value="Buat Meme" />
          </div>
          <div class="col-6">
            <button id="reset" class="k-button w-100">Reset</button>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="label-preview">Preview</div>
  <div id="meme-canvas-container">
      <canvas id="meme-preview"></canvas>
  </div>
</div>
<script>

function showPreview(objFileInput)
{
    if (objFileInput.files[0])
    {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $("#meme-bg-target img").attr('src', e.target.result);
        }
        fileReader.readAsDataURL(objFileInput.files[0]);
    }
}

$( function() {
  $( "#draggable" ).draggable();
  $( "#draggable" ).resizable();
} );
  function createTextArea()
    {
    	var txtAreaHTML = "<div contentEditable='true' class='meme-txt-area'></div>";
    	$("#meme-bg-target").append(txtAreaHTML);
    	$(".meme-txt-area").draggable();
    	$(".meme-txt-area").focus();
    }
  let imgInput = document.getElementById('upload');
  imgInput.addEventListener('change', function(e) {
    if(e.target.files) {
      let imageFile = e.target.files[0]; //here we get the image file
      var reader = new FileReader();
      reader.readAsDataURL(imageFile);
      reader.onloadend = function (e) {
        var myImage = new Image(); // Creates image object
        myImage.src = e.target.result; // Assigns converted image to image object
        myImage.onload = function(ev) {
          var myCanvas = document.getElementById("myCanvas"); // Creates a canvas object
          var myContext = myCanvas.getContext("2d"); // Creates a contect object
         // myImage.width = myCanvas.width; // Assigns image's width to canvas
          // myImage.height = myCanvas.height; // Assigns image's height to canvas

          if (myImage.width > 550) {
            myImage.width = 550;
          }
          myCanvas.height = myImage.height;
          myCanvas.width = myImage.width;


          // var scale = Math.min(myCanvas.width / myImage.width, myCanvas.height / myImage.height);
          // var x = (myCanvas.width / 2) - (myImage.width / 2) * scale;
          // var y = (myCanvas.height / 2) - (myImage.height / 2) * scale;

          myContext.drawImage(myImage, 0,0, myImage.width, myImage.height); // Draws the image on canvas
          let imgData = myCanvas.toDataURL("image/jpeg",1.0); // Assigns image base64 string in jpeg format to a variable
        }
      }
    }
  });
</script>
<?= $this->endSection();  ?>
