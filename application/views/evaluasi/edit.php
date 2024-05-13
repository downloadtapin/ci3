<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Evaluasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Evaluasi</h2>
        <form action="<?= site_url('evaluasi/edit/'.$evaluasi->Id_evaluasi_penawaran) ?>" method="post">
            <div class="form-group">
                <label for="Id_kode_tender">ID Kode Tender</label>
                <input type="text" class="form-control" id="Id_kode_tender" name="Id_kode_tender" value="<?= $evaluasi->Id_kode_tender ?>" required>
            </div>
            <div class="form-group">
                <label for="No_Evaluasi">Nomor Evaluasi</label>
                <input type="text" class="form-control" id="No_Evaluasi" name="No_Evaluasi" value="<?= $evaluasi->No_Evaluasi ?>" required>
            </div>
            <div class="form-group">
                <label for="Tanggal">Tanggal</label>
                <input type="date" class="form-control" id="Tanggal" name="Tanggal" value="<?= $evaluasi->Tanggal ?>" required>
            </div>
            <div class="form-group">
                <label for="Metode_evaluasi">Metode Evaluasi</label>
                <input type="text" class="form-control" id="Metode_evaluasi" name="Metode_evaluasi" value="<?= $evaluasi->Metode_evaluasi ?>" required>
            </div>
            <div class="form-group">
                <label for="nama_Penyedia">Nama Penyedia</label>
                <input type="text" class="form-control" id="nama_Penyedia" name="nama_Penyedia" value="<?= $evaluasi->nama_Penyedia ?>" required>
            </div>
            <div class="form-group">
                <label for="nilai_penawaran">Nilai Penawaran</label>
                <input type="number" class="form-control" id="nilai_penawaran" name="nilai_penawaran" value="<?= $evaluasi->nilai_penawaran ?>" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="kualifikasi" name="kualifikasi" <?= ($evaluasi->kualifikasi == 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="kualifikasi">Kualifikasi</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="administrasi" name="administrasi" <?= ($evaluasi->administrasi == 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="administrasi">Administrasi</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="teknis" name="teknis" <?= ($evaluasi->teknis == 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="teknis">Teknis</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="harga" name="harga" <?= ($evaluasi->harga == 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="harga">Harga</label>
            </div>
            <div class="form-group">
                <label for="Keterangan_lain">Keterangan Lain</label>
                <input type="text" class="form-control" id="Keterangan_lain" name="Keterangan_lain" value="<?= $evaluasi->Keterangan_lain ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
