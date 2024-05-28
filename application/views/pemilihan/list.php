<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pemilihan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= site_url('pemilihan/add') ?>" class="btn btn-primary mb-3">Tambah Pemilihan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <h2>List Pemilihan</h2>

                <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Paket</th>
                            <th>No Penjelasan</th>
                            <th>No Evaluasi Penawaran</th>
                            <th>No Pembuktian</th>
                            <th>No Klarifikasi</th>
                            <th>No Negosiasi</th>
                            <th>Nomor Pemilihan</th>
                            <th>Pertanyaan Sanggah</th>
                            <th>Jawaban Sanggah</th>
                            <th>Tanggal</th>
                            <th>Cek List</th>
                            <th>Keterangan Lain</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pemilihans as $pemilihan): ?>
                        <tr>
                            <td>
                                <?php 
                        foreach ($pakets as $paket) {
                            if ($paket->Id_kode_tender == $pemilihan->Id_paket) {
                                echo $paket->Nama_tender;
                                break;
                            }
                        }
                        ?>
                            </td>
                            <td>
                                <?php 
                        foreach ($penjelasans as $penjelasan) {
                            if ($penjelasan->Id_penjelasan == $pemilihan->Id_penjelasan) {
                                echo $penjelasan->No_Penjelasan;
                                break;
                            }
                        }
                        ?>
                            </td>
                            <td>
                                <?php 
                        foreach ($evaluasis as $evaluasi) {
                            if ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) {
                                echo $evaluasi->No_Evaluasi;
                                break;
                            }
                        }
                        ?>
                            </td>
                            <td>
                                <?php 
                        foreach ($pembuktians as $pembuktian) {
                            if ($pembuktian->Id_pembuktian == $pemilihan->Id_pembuktian) {
                                echo $pembuktian->No_Pembuktian;
                                break;
                            }
                        }
                        ?>
                            </td>
                            <td>
                                <?php 
                        foreach ($klarifikasis as $klarifikasi) {
                            if ($klarifikasi->Id_klarifikasi == $pemilihan->Id_klarifikasi) {
                                echo $klarifikasi->No_Klarifikasi;
                                break;
                            }
                        }
                        ?>
                            </td>
                            <td>
                                <?php 
                        foreach ($negosiasis as $negosiasi) {
                            if ($negosiasi->Id_negosiasi == $pemilihan->Id_negosiasi) {
                                echo $negosiasi->No_Negosiasi;
                                break;
                            }
                        }
                        ?>
                            </td>
                            <td><?= $pemilihan->No_Pemilihan ?></td>
                            <td><?= $pemilihan->Pertanyaan_sanggah ?></td>
                            <td><?= $pemilihan->Jawaban_sanggah ?></td>
                            <td><?= $pemilihan->Tanggal ?></td>
                            <td><?= $pemilihan->Cek_list ?></td>
                            <td><?= $pemilihan->Keterangan_lain ?></td>
                            <td>
                                <a href="<?= site_url('pemilihan/edit/'.$pemilihan->Id_pemilihan) ?>"
                                    class="btn btn-sm btn-info"><i class="bi bi-pencil text-white"></i></a>
                                <a href="<?= site_url('pemilihan/delete/'.$pemilihan->Id_pemilihan) ?>"
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