<?= $this->extend('Layout/TemplateAdmin'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Postingan</h1>

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
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>ID</th>
                            <th>Username</th>
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
                              <td><img src="<?= base_url('public/uploads/gambar_post/'.$detailpost['Nama_Gambar']) ?>" class="img-fluid" style="width:30%; height:30%"></td>
                              <td><?=$detailpost['Judul'] ?></td>
                              <td><?=$detailpost['ID_Memers'] ?></td>
                              <td><?=$detailpost['Username'] ?></td>
                              <td>
                                <form class="" action="<?=base_url('public/Admin/HapusPostingan?idpost='.$detailpost['ID_Postingan']) ?>" method="post">
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
