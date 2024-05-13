<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Evaluasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>List Evaluasi</h2>
        <a href="<?= site_url('evaluasi/add') ?>" class="btn btn-primary mb-3">Add New</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Evaluasi Penawaran</th>
                    <th>ID Kode Tender</th>
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
                        <td><?= $evaluasi->Id_evaluasi_penawaran ?></td>
                        <td><?= $evaluasi->Id_kode_tender ?></td>
                        <td><?= $evaluasi->No_Evaluasi ?></td>
                        <td><?= $evaluasi->Tanggal ?></td>
                        <td><?= $evaluasi->Metode_evaluasi ?></td>
                        <td><?= $evaluasi->nama_Penyedia ?></td>
                        <td><?= $evaluasi->nilai_penawaran ?></td>
                        <td><?= ($evaluasi->kualifikasi == 1) ? 'Yes' : 'No' ?></td>
                        <td><?= ($evaluasi->administrasi == 1) ? 'Yes' : 'No' ?></td>
                        <td><?= ($evaluasi->teknis == 1) ? 'Yes' : 'No' ?></td>
                        <td><?= ($evaluasi->harga == 1) ? 'Yes' : 'No' ?></td>
                        <td><?= $evaluasi->Keterangan_lain ?></td>
                        <td>
                            <a href="<?= site_url('evaluasi/edit/'.$evaluasi->Id_evaluasi_penawaran) ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?= site_url('evaluasi/delete/'.$evaluasi->Id_evaluasi_penawaran) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
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
