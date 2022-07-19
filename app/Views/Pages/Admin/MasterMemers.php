<?= $this->extend('Layout/TemplateAdmin'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Memers</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Master Memers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Url Foto</th>

                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($mastermemers as $m): ?>
                        <tr>
                            <td><?=$m['Nama'] ?></td>
                            <td><?=$m['Email'] ?></td>
                            <td><?=$m['Username'] ?></td>
                            <td><img src="<?= base_url('public/uploads/gambar_profile/'.$m['url_foto']) ?>" class="img-fluid" style="height:100px;weight:100px; object-fit: cover;display: flex;justify-content: center;align-items: center;"></td>
                            <!-- <td><a href="<?php//base_url('public/Admin/DetailLaporanAkun?idakun='.$m['ID_Pelanggar']) ?>"><button class="btn btn-danger btn-circle"> <i class="fas fa-exclamation-triangle"></i> </button> </a> </td> -->
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection();  ?>
