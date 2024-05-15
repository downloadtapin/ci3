<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Klarifikasi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= site_url('klarifikasi/add') ?>" class="btn btn-primary mb-3">Add New</a>
            <table class="table">
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <thead>
                    <tr>

                        <th>Id evaluasi penawaran</th>
                        <th>Nomor Klarifikasi</th>
                        <th>Peralatan</th>
                        <th>Tenaga Ahli</th>
                        <th>Keterangan Lain</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($klarifikasis as $klarifikasi): ?>
                    <tr>

                        <td>
                            <?php 
                        foreach ($evaluasis as $evaluasi) {
                            if ($evaluasi->Id_evaluasi_penawaran == $klarifikasi->Id_evaluasi_penawaran) {
                                echo $evaluasi->No_Evaluasi;
                                break;
                            }
                        }
                        ?>
                        </td>
                        <td><?= $klarifikasi->No_Klarifikasi ?></td>
                        <td><?= $klarifikasi->Peralatan ?></td>
                        <td><?= $klarifikasi->Tenaga_ahli ?></td>
                        <td><?= $klarifikasi->Keterangan_lain ?></td>
                        <td>
                            <a href="<?= site_url('klarifikasi/edit/'.$klarifikasi->Id_klarifikasi) ?>"
                                class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= site_url('klarifikasi/delete/'.$klarifikasi->Id_klarifikasi) ?>"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>