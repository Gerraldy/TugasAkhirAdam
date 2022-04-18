<?= $this->extend('Layout/TemplateAdmin'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Toko</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Toko</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor Laporan</th>
                            <th>ID Pelapor</th>
                            <th>ID Toko</th>
                            <th>Alasan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                          <th>Nomor Laporan</th>
                          <th>ID Pelapor</th>
                          <th>ID Postingan</th>
                          <th>Alasan</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
                      <?php foreach ($laporantoko as $l): ?>
                        <tr>
                            <td><?=$l['ID_Laporan_Toko'] ?></td>
                            <td><?=$l['ID_Memers'] ?></td>
                            <td><?=$l['ID_Toko'] ?></td>
                            <td><?=$l['Alasan'] ?></td>
                            <td><a href="#"><button class="btn btn-danger btn-circle"> <i class="fas fa-exclamation-triangle"></i> </button> </a? </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection();  ?>
