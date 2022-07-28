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
                            <th>ID Toko</th>
                            <th>Nama Toko</th>
                            <th>Kontak</th>
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
                              <td><?=$detailtoko['ID_Toko'] ?></td>
                              <td><?=$detailtoko['Nama_Toko'] ?></td>
                              <td><?=$detailtoko['Kontak'] ?></td>
                              <td>
                                <form class="" action="<?=base_url('public/Admin/HapusToko?idtoko='.$detailtoko['ID_Toko']) ?>" method="post">
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
