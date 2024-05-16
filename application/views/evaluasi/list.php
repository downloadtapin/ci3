<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Evaluasi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <a href="<?= site_url('evaluasi/add') ?>" class="btn btn-primary mb-3">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
        <table id="example" class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama Tender</th>
                    <th>Nomor Evaluasi</th>
                    <th>Tanggal</th>
                    <th>Metode Evaluasi</th>
                    <th>Nama Penyedia</th>
                    <th>Nilai Penawaran</th>
                    <th>Kualifikasi</th>
                    <th>Administrasi</th>
                    <th>Teknis</th>
                    <th>Harga</th>
                    <th>Keterangan Lain</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($evaluasis as $evaluasi): ?>
                <tr>
                    <td>
                        <?php 
                        foreach ($pakets as $paket) {
                            if ($paket->Id_kode_tender == $evaluasi->Id_kode_tender) {
                                echo $paket->Nama_tender;
                                break;
                            }
                        }
                        ?>
                    </td>
                    <td><?= $evaluasi->No_Evaluasi ?></td>
                    <td><?= $evaluasi->Tanggal ?></td>
                    <td><?= $evaluasi->Metode_evaluasi ?></td>
                    <td><?= $evaluasi->nama_Penyedia ?></td>
                    <td><?= $evaluasi->nilai_penawaran ?></td>
                    <td><?= ($evaluasi->kualifikasi == 1) ? '<i class="bi bi-check2"></i>' : '<i class="bi bi-x-lg"></i>' ?></td>
                    <td><?= ($evaluasi->administrasi == 1) ? '<i class="bi bi-check2"></i>' : '<i class="bi bi-x-lg"></i>' ?></td>
                    <td><?= ($evaluasi->teknis == 1) ? '<i class="bi bi-check2"></i>' : '<i class="bi bi-x-lg"></i>' ?></td>
                    <td><?= ($evaluasi->harga == 1) ? '<i class="bi bi-check2"></i>' : '<i class="bi bi-x-lg"></i>' ?></td>
                    <td><?= $evaluasi->Keterangan_lain ?></td>
                    <td>
                        <a href="<?= site_url('evaluasi/edit/'.$evaluasi->Id_evaluasi_penawaran) ?>"
                            class="btn btn-sm btn-primary"><i class="bi bi-pencil text-white"></i></a>
                        <a href="<?= site_url('evaluasi/delete/'.$evaluasi->Id_evaluasi_penawaran) ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this item?')"><i
                                class="bi bi-trash icon-custom"></i></a>
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