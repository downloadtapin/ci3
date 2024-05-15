<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Pembuktian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Edit Pembuktian</h2>
        <?php echo validation_errors(); ?>
        <form action="<?= site_url('pembuktian/edit/'.$pembuktian->Id_pembuktian) ?>" method="post">
            <div class="form-group">
                <label for="Id_evaluasi_penawaran">No evaluasi penawaran:</label>
                <select class="form-control" id="Id_evaluasi_penawaran" name="Id_evaluasi_penawaran" required>
                    <?php foreach($evaluasis as $evaluasi): ?>
                    <option value="<?= $evaluasi->Id_evaluasi_penawaran ?>"
                        <?= ($evaluasi->Id_evaluasi_penawaran == $pembuktian->Id_evaluasi_penawaran) ? 'selected' : '' ?>>
                        <?= $evaluasi->No_Evaluasi ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="No_Pembuktian">Nomor Pembuktian:</label>
                <input type="text" class="form-control" id="No_Pembuktian" name="No_Pembuktian"
                    value="<?= $pembuktian->No_Pembuktian ?>">
            </div>
            <div class="form-group">
                <label for="Tanggal">Tanggal:</label>
                <input type="date" class="form-control" id="Tanggal" name="Tanggal" value="<?= $pembuktian->Tanggal ?>">
            </div>
            <div class="form-group">
                <label for="Waktu">Waktu:</label>
                <input type="time" class="form-control" id="Waktu" name="Waktu" value="<?= substr($pembuktian->Waktu, 0, 5) ?>">
            </div>
            <div class="form-group">
                <label for="Tempat">Tempat:</label>
                <input type="text" class="form-control" id="Tempat" name="Tempat" value="<?= $pembuktian->Tempat ?>">
            </div>
            <div class="form-group">
                <label for="Nama_penyedia">Nama Penyedia:</label>
                <input type="text" class="form-control" id="Nama_penyedia" name="Nama_penyedia"
                    value="<?= $pembuktian->Nama_penyedia ?>">
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat:</label>
                <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?= $pembuktian->Alamat ?>">
            </div>
            <div class="form-group">
                <label for="Nama_hadir">Nama Hadir:</label>
                <input type="text" class="form-control" id="Nama_hadir" name="Nama_hadir"
                    value="<?= $pembuktian->Nama_hadir ?>">
            </div>
            <div class="form-group">
                <label for="Keterangan_lain">Keterangan Lain:</label>
                <textarea class="form-control" id="Keterangan_lain"
                    name="Keterangan_lain"><?= $pembuktian->Keterangan_lain ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('Waktu').addEventListener('change', function(e) {
            const timeValue = e.target.value;
            if (timeValue.length === 5) {
                e.target.value = timeValue + ':00';
            }
        });
    </script>
</body>

</html>
