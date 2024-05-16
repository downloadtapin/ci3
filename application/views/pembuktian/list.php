<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pembuktian</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= site_url('pembuktian/add') ?>" class="btn btn-primary">Tambah Pembuktian</a>
            <table class="table">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor Evaluasi Penawaran</th>
                            <th>Nomor Pembuktian</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Tempat</th>
                            <th>Nama Penyedia</th>
                            <th>Alamat</th>
                            <th>Nama Hadir</th>
                            <th>Keterangan Lain</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pembuktians as $pembuktian) { ?>
                        <tr>
                            <td>
                                <?php 
                        foreach ($evaluasis as $evaluasi) {
                            if ($evaluasi->Id_evaluasi_penawaran == $pembuktian->Id_evaluasi_penawaran) {
                                echo $evaluasi->No_Evaluasi;
                                break;
                            }
                        }
                        ?>
                            </td>
                            <td><?= $pembuktian->No_Pembuktian ?></td>
                            <td><?= $pembuktian->Tanggal ?></td>
                            <td><?= $pembuktian->Waktu ?></td>
                            <td><?= $pembuktian->Tempat ?></td>
                            <td><?= $pembuktian->Nama_penyedia ?></td>
                            <td><?= $pembuktian->Alamat ?></td>
                            <td><?= $pembuktian->Nama_hadir ?></td>
                            <td><?= $pembuktian->Keterangan_lain ?></td>
                            <td>
                                <a href="<?= site_url('pembuktian/edit/'.$pembuktian->Id_pembuktian) ?>"
                                    class="btn btn-sm btn-warning"><i class="bi bi-pencil text-white"></i></a>
                                <a href="<?= site_url('pembuktian/delete/'.$pembuktian->Id_pembuktian) ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                        class="bi bi-trash icon-custom"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>