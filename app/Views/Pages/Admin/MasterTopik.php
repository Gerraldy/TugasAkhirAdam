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
            <div class="col-10">
              <h6 class="m-0 font-weight-bold text-primary">Master Topik</h6>
            </div>
            <div class="col-2">
              <!--  -->
              <a href="<?= base_url('/public/Admin/MasterAddTopik') ?>" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                  <img src="<?= base_url('Public/gambar/plus.png') ?>" style="height:25px; width:25px">
                </span>
                <span class="text">Tambah Data</span>
                </a>
            </div>
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
                      <?php foreach ($topik as $t): ?>
                        <tr>
                            <td><?=$t['Nama_Topik'] ?></td>
                            <td><?=$t['Judul_Topik'] ?></td>
                            <td><?=$t['Url_Foto'] ?></td>
                            <!-- <td><img src=" base_url('public/uploads/gambar_profile/'.$t['url_foto']) ?>" class="img-fluid" style="height:100px;weight:100px; object-fit: cover;display: flex;justify-content: center;align-items: center;"></td> -->
                            <td><a href="<?php base_url('public/Admin/DetailTopik?idtopik='.$t['ID_Topik']) ?>"><button class="btn btn-warning btn-circle"> <i class="fas fa-exclamation-triangle"></i> </button> </a> </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection();  ?>
