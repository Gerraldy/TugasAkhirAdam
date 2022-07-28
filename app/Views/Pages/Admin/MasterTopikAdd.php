<?= $this->extend('Layout/TemplateAdmin'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Topik</h1>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
              <h6 class="m-0 font-weight-bold text-primary">Add Topik</h6>
          </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Topik</th>
                            <th>Judul</th>
                            <th>Url Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <form action="<?=base_url('public/Admin/AddTopik') ?>" method="post" enctype="multipart/form-data">
                            <td> <input type="text" class="" name="Nama_Topik" value=""></td>
                            <td> <input type="text" class="" name="Judul_Topik" value=""></td>
                            <td><img src="<?= base_url('/public/gambar/profile.png')?>" href="<?= base_url('/public/gambar/profile.png')?>" data-upload="0" id="gambar-preview" alt="" style="width:80px; height:80px; object-fit: cover">
                            <input type="file" name="Url_Foto" id="Url_Foto" onchange="readURL(this);"></td>
                            <!-- <td><img src=" base_url('public/uploads/gambar_profile/'.$t['url_foto']) ?>" class="img-fluid" style="height:100px;weight:100px; object-fit: cover;display: flex;justify-content: center;align-items: center;"></td> -->
                            <td> <button class="btn btn-success btn-circle"> <i class="fas fa-check"></i> </button></td>
                          </form>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
function readURL(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#gambar-preview')
            .attr('src', e.target.result);
        $('#gambar-preview')
            .attr('href', e.target.result).data("upload","1");

            $('#gambar-preview').magnificPopup({
               type: 'image'
               // other options
             });
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>

<?= $this->endSection();  ?>
