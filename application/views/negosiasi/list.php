<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Negosiasi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= site_url('negosiasi/add') ?>" class="btn btn-primary mb-3">Tambah Data Negosiasi</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Evaluasi</th>
                            <th>Nomor Negosiasi</th>
                            <th>Tanggal</th>
                            <th>Harga Penawaran</th>
                            <th>Harga Terkoreksi</th>
                            <th>Hasil Evaluasi</th>
                            <th>Keterangan Lain</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; foreach ($negosiasis as $negosiasi): ?>
                        <tr>
                        <td><?= $counter ?></td>
                            <td>
                                <?php 
                                
                        foreach ($evaluasis as $evaluasi) {
                            if ($evaluasi->Id_evaluasi_penawaran == $negosiasi->Id_evaluasi_penawaran) {
                                echo $evaluasi->No_Evaluasi;
                                break;
                            }
                        }
                        ?>
                            </td>
                            
                            <td><?= $negosiasi->No_Negosiasi ?></td>
                            <td><?= $negosiasi->Tanggal ?></td>
                            <td><?= $negosiasi->harga_penawaran ?></td>
                            <td><?= $negosiasi->harga_terkoreksi ?></td>
                            <td><?= $negosiasi->hasil_evaluasi ?></td>
                            <td><?= $negosiasi->Keterangan_lain ?></td>
                            <td>
                                <a href="<?= site_url('negosiasi/edit/'.$negosiasi->Id_negosiasi) ?>"
                                    class="btn btn-sm btn-info"><i class="bi bi-pencil text-white"></i></a>
                                <a href="<?= site_url('negosiasi/delete/'.$negosiasi->Id_negosiasi) ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item?')"><i
                                        class="bi bi-trash icon-custom"></i></a>
                            </td>
                        </tr>
                        <?php $counter++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>