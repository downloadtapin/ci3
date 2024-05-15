<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List Pemilihan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="ontainer">
        <h2>List Pemilihan</h2>
        <a href="<?= site_url('pemilihan/add') ?>" class="btn btn-primary mb-3">Add Pemilihan</a>
        <table class="table">
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
                            class="btn btn-sm btn-info">Edit</a>
                        <a href="<?= site_url('pemilihan/delete/'.$pemilihan->Id_pemilihan) ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>