<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Penjelasan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Data Penjelasan</h2>
        <a href="<?= site_url('penjelasan/add') ?>" class="btn btn-primary mb-3">Add Penjelasan</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Tender</th>
                    <th>No. Penjelasan</th>
                    <th>Tanggal</th>
                    <th>Nama Penyedia</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th>Keterangan Lain</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penjelasans as $penjelasan): ?>
                <tr>
                    <td>
                        <?php 
                        foreach ($pakets as $paket) {
                            if ($paket->Id_kode_tender == $penjelasan->Id_kode_tender) {
                                echo $paket->Nama_tender;
                                break;
                            }
                        }
                        ?>
                    </td>
                    <td><?= $penjelasan->No_Penjelasan ?></td>
                    <td><?= $penjelasan->Tanggal ?></td>
                    <td><?= $penjelasan->Nama_penyedia ?></td>
                    <td><?= $penjelasan->Pertanyaan ?></td>
                    <td><?= $penjelasan->Jawaban ?></td>
                    <td><?= $penjelasan->Keterangan_lain ?></td>
                    <td>
                        <a href="<?= site_url('penjelasan/edit/'.$penjelasan->Id_penjelasan) ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= site_url('penjelasan/delete/'.$penjelasan->Id_penjelasan) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this penjelasan?')">Delete</a>
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
