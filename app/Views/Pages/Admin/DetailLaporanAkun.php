<?= $this->extend('Layout/TemplateAdmin'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Akun</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Postingan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor Laporan</th>
                            <th>ID Pelapor</th>
                            <th>ID Postingan</th>
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

                          <tr>
                            <td><?=$detailakun['ID_Memers'] ?></td>
                            <td><?=$detailakun['Email'] ?></td>
                            <td><?=$detailakun['Username'] ?></td>
                            <td><?=$detailakun['url_foto'] ?></td>
                              <td>
                                <form class="" action="<?=base_url('public/Admin/HapusAkun?idakun='.$detailakun['ID_Memers']) ?>" method="post">
                                  <?= csrf_field(); ?>
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button class="btn btn-danger btn-circle"> <i class="fas fa-exclamation-triangle"></i></button>
                                </form>
                              </td>
                          </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection();  ?>
