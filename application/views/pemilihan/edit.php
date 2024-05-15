<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Pemilihan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Edit Pemilihan</h2>
        <?php echo validation_errors(); ?>
        <form action="<?= site_url('pemilihan/edit/'.$pemilihan->Id_pemilihan) ?>" method="post">
            <div class="form-group">
                <label for="Id_paket">Nama Tender:</label>
                <select class="form-control" id="Id_paket" name="Id_paket" required>
                    <?php foreach($pakets as $paket): ?>
                    <option value="<?= $paket->Id_kode_tender ?>" <?= ($paket->Id_kode_tender == $pemilihan->Id_paket) ? 'selected' : '' ?>><?= $paket->Nama_tender ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Id_penjelasan">Nomor Penjelasan:</label>
                <select class="form-control" id="Id_penjelasan" name="Id_penjelasan" required>
                    <?php foreach($penjelasans as $penjelasan): ?>
                    <option value="<?= $penjelasan->Id_penjelasan ?>" <?= ($penjelasan->Id_penjelasan == $pemilihan->Id_penjelasan) ? 'selected' : '' ?>><?= $penjelasan->No_Penjelasan ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Id_evaluasi_Penawaran">Id_evaluasi_penawaran:</label>
                <select class="form-control" id="Id_evaluasi_Penawaran" name="Id_evaluasi_Penawaran" required>
                    <?php foreach($evaluasis as $evaluasi): ?>
                    <option value="<?= $evaluasi->Id_evaluasi_penawaran ?>" <?= ($evaluasi->Id_evaluasi_penawaran == $pemilihan->Id_evaluasi_Penawaran) ? 'selected' : '' ?>><?= $evaluasi->No_Evaluasi ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Id_pembuktian">Id_pembuktian:</label>
                <select class="form-control" id="Id_pembuktian" name="Id_pembuktian" required>
                    <?php foreach($pembuktians as $pembuktian): ?>
                    <option value="<?= $pembuktian->Id_pembuktian ?>" <?= ($pembuktian->Id_pembuktian == $pemilihan->Id_pembuktian) ? 'selected' : '' ?>><?= $pembuktian->No_Pembuktian ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Id_klarifikasi">Id_klarifikasi:</label>
                <select class="form-control" id="Id_klarifikasi" name="Id_klarifikasi" required>
                    <?php foreach($klarifikasis as $klarifikasi): ?>
                    <option value="<?= $klarifikasi->Id_klarifikasi ?>" <?= ($klarifikasi->Id_klarifikasi == $pemilihan->Id_klarifikasi) ? 'selected' : '' ?>><?= $klarifikasi->No_Klarifikasi ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Id_negosiasi">Id_negosiasi:</label>
                <select class="form-control" id="Id_negosiasi" name="Id_negosiasi" required>
                    <?php foreach($negosiasis as $negosiasi): ?>
                    <option value="<?= $negosiasi->Id_negosiasi ?>" <?= ($negosiasi->Id_negosiasi == $pemilihan->Id_negosiasi) ? 'selected' : '' ?>><?= $negosiasi->No_Negosiasi ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="No_Pemilihan">Nomor Pemilihan:</label>
                <input type="text" class="form-control" id="No_Pemilihan" name="No_Pemilihan" value="<?= $pemilihan->No_Pemilihan ?>" required>
            </div>
            <div class="form-group">
                <label for="Pertanyaan_sanggah">Pertanyaan Sanggah:</label>
                <textarea class="form-control" id="Pertanyaan_sanggah" name="Pertanyaan_sanggah" required><?= $pemilihan->Pertanyaan_sanggah ?></textarea>
            </div>
            <div class="form-group">
                <label for="Jawaban_sanggah">Jawaban Sanggah:</label>
                <textarea class="form-control" id="Jawaban_sanggah" name="Jawaban_sanggah" required><?= $pemilihan->Jawaban_sanggah ?></textarea>
            </div>
            <div class="form-group">
                <label for="Tanggal">Tanggal:</label>
                <input type="date" class="form-control" id="Tanggal" name="Tanggal" value="<?= $pemilihan->Tanggal ?>" required>
            </div>
            <div class="form-group">
                <label for="Cek_list">Cek List:</label>
                <input type="text" class="form-control" id="Cek_list" name="Cek_list" value="<?= $pemilihan->Cek_list ?>" required>
            </div>
            <div class="form-group">
                <label for="Keterangan_lain">Keterangan Lain:</label>
                <textarea class="form-control" id="Keterangan_lain" name="Keterangan_lain"><?= $pemilihan->Keterangan_lain ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
