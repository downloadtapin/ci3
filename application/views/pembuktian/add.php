<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Pembuktian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add Pembuktian</h2>
        <?php echo validation_errors(); ?>
        <form action="<?= site_url('pembuktian/add') ?>" method="post">
            <div class="form-group">
                <label for="Id_evaluasi_penawaran">ID Evaluasi Penawaran:</label>
                <input type="text" class="form-control" id="Id_evaluasi_penawaran" name="Id_evaluasi_penawaran">
            </div>
            <div class="form-group">
                <label for="No_Pembuktian">Nomor Pembuktian:</label>
                <input type="text" class="form-control" id="No_Pembuktian" name="No_Pembuktian">
            </div>
            <div class="form-group">
                <label for="Tanggal">Tanggal:</label>
                <input type="date" class="form-control" id="Tanggal" name="Tanggal">
            </div>
            <div class="form-group">
                <label for="Waktu">Waktu:</label>
                <input type="time" class="form-control" id="Waktu" name="Waktu">
            </div>
            <div class="form-group">
                <label for="Tempat">Tempat:</label>
                <input type="text" class="form-control" id="Tempat" name="Tempat">
            </div>
            <div class="form-group">
                <label for="Nama_penyedia">Nama Penyedia:</label>
                <input type="text" class="form-control" id="Nama_penyedia" name="Nama_penyedia">
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat:</label>
                <input type="text" class="form-control" id="Alamat" name="Alamat">
            </div>
            <div class="form-group">
                <label for="Nama_hadir">Nama Hadir:</label>
                <input type="text" class="form-control" id="Nama_hadir" name="Nama_hadir">
            </div>
            <div class="form-group">
                <label for="Keterangan_lain">Keterangan Lain:</label>
                <textarea class="form-control" id="Keterangan_lain" name="Keterangan_lain"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
