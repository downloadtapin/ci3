<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Pembuktian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>List Pembuktian</h2>
        <a href="<?= site_url('pembuktian/add') ?>" class="btn btn-primary">Tambah Pembuktian</a>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Evaluasi Penawaran</th>
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
                    <td><?= $pembuktian->Id_evaluasi_penawaran ?></td>
                    <td><?= $pembuktian->No_Pembuktian ?></td>
                    <td><?= $pembuktian->Tanggal ?></td>
                    <td><?= $pembuktian->Waktu ?></td>
                    <td><?= $pembuktian->Tempat ?></td>
                    <td><?= $pembuktian->Nama_penyedia ?></td>
                    <td><?= $pembuktian->Alamat ?></td>
                    <td><?= $pembuktian->Nama_hadir ?></td>
                    <td><?= $pembuktian->Keterangan_lain ?></td>
                    <td>
                        <a href="<?= site_url('pembuktian/edit/'.$pembuktian->Id_pembuktian) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= site_url('pembuktian/delete/'.$pembuktian->Id_pembuktian) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
