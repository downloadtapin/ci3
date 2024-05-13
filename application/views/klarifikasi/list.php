<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Klarifikasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>List Klarifikasi</h2>
        <a href="<?= site_url('klarifikasi/add') ?>" class="btn btn-primary mb-3">Add New</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Klarifikasi</th>
                    <th>ID Pembuktian</th>
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
                        <td><?= $klarifikasi->Id_klarifikasi ?></td>
                        <td><?= $klarifikasi->Id_pembuktian ?></td>
                        <td><?= $klarifikasi->No_Klarifikasi ?></td>
                        <td><?= $klarifikasi->Peralatan ?></td>
                        <td><?= $klarifikasi->Tenaga_ahli ?></td>
                        <td><?= $klarifikasi->Keterangan_lain ?></td>
                        <td>
                            <a href="<?= site_url('klarifikasi/edit/'.$klarifikasi->Id_klarifikasi) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= site_url('klarifikasi/delete/'.$klarifikasi->Id_klarifikasi) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
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
