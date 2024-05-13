<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Negosiasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add Negosiasi</h2>
        <form method="post" action="<?= site_url('negosiasi/add') ?>">
            <div class="form-group">
                <label for="Id_pembuktian">ID Pembuktian:</label>
                <input type="text" class="form-control" id="Id_pembuktian" name="Id_pembuktian" required>
            </div>
            <div class="form-group">
                <label for="No_Negosiasi">Nomor Negosiasi:</label>
                <input type="text" class="form-control" id="No_Negosiasi" name="No_Negosiasi" required>
            </div>
            <div class="form-group">
                <label for="Tanggal">Tanggal:</label>
                <input type="date" class="form-control" id="Tanggal" name="Tanggal" required>
            </div>
            <div class="form-group">
                <label for="harga_penawaran">Harga Penawaran:</label>
                <input type="text" class="form-control" id="harga_penawaran" name="harga_penawaran" required>
            </div>
            <div class="form-group">
                <label for="harga_terkoreksi">Harga Terkoreksi:</label>
                <input type="text" class="form-control" id="harga_terkoreksi" name="harga_terkoreksi" required>
            </div>
            <div class="form-group">
                <label for="hasil_evaluasi">Hasil Evaluasi:</label>
                <input type="text" class="form-control" id="hasil_evaluasi" name="hasil_evaluasi" required>
            </div>
            <div class="form-group">
                <label for="Keterangan_lain">Keterangan Lain:</label>
                <textarea class="form-control" id="Keterangan_lain" name="Keterangan_lain"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
 