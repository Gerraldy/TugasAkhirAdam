<?= $this->extend('Layout/TemplateAdmin'); ?>

<?= $this->section('content'); ?>


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Memers Pro</h1>
    <?php
    $target = 2592000;
    $sekarang = time();
    $perbedaan = $target - $sekarang;
    $hari = floor($perbedaan / 86400);
    echo $sekarang;
    ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Master Memers Pro</h6>
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
                            <th>Berlaku Sampai</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($mastermemerspro as $m): ?>
                        <tr>
                            <td><?=$m['Nama'] ?></td>
                            <td><?=$m['Email'] ?></td>
                            <td><?=$m['Username'] ?></td>
                            <td><img src="<?= base_url('public/uploads/gambar_profile/'.$m['url_foto']) ?>" class="img-fluid" style="height:100px;weight:100px; object-fit: cover;display: flex;justify-content: center;align-items: center;"></td>
                            <td></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection();  ?>
