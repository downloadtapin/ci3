<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Negosiasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>List Negosiasi</h2>
        <a href="<?= site_url('negosiasi/add') ?>" class="btn btn-primary mb-3">Add Negosiasi</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Pembuktian</th>
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
                <?php foreach ($negosiasis as $negosiasi): ?>
                    <tr>
                        <td><?= $negosiasi->Id_negosiasi ?></td>
                        <td><?= $negosiasi->Id_pembuktian ?></td>
                        <td><?= $negosiasi->No_Negosiasi ?></td>
                        <td><?= $negosiasi->Tanggal ?></td>
                        <td><?= $negosiasi->harga_penawaran ?></td>
                        <td><?= $negosiasi->harga_terkoreksi ?></td>
                        <td><?= $negosiasi->hasil_evaluasi ?></td>
                        <td><?= $negosiasi->Keterangan_lain ?></td>
                        <td>
                            <a href="<?= site_url('negosiasi/edit/'.$negosiasi->Id_negosiasi) ?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="<?= site_url('negosiasi/delete/'.$negosiasi->Id_negosiasi) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
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
